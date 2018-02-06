<?php
/**
 * Dashboard Attack, command manager
 * product_order_model.php
 * Coded with Codeigniter 3
 * @author Geenens Quentin <geenensq@gmail.com>
 * @version 1.0
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

    Class product_order_model extends CI_Model
    {

// =======================================================================//
// !                  Declaration of my attributes                       //
// ======================================================================//
    private $quantity_product;
    private $id_product;
    private $id_order; 	
    protected $table = "product_order";
// =======================================================================//
// !                     Start methods getters                           //
// ======================================================================//
    public function getQuantityProduct()
    {
        return $this->quantity_product;
    }

    public function getIdProduct()
    {
        return $this->id_product;
    }

    public function getIdOrder()
    {
        return $this->id_order;
    }
    
// =======================================================================//
// !                     Start methods setters                           //
// ======================================================================//
    public function setQuantityProduct($quantity_product)
    {
        $this->quantity_product = $quantity_product;

        return $this;
    }

    public function setIdProduct($id_product)
    {
        $this->id_product = $id_product;

        return $this;
    }

    public function setIdOrder($id_order)
    {
        $this->id_order = $id_order;

        return $this;
    }

// =======================================================================//
// !                     Start CRUD methods                              //
// ======================================================================//

// =======================================================================//
// !                     INSERT ONE PRODUCT ORDER                        //
// ======================================================================//
    public function inserOneProductOrder($model)
    {
        $id_product = $model->getIdProduct();
        $qte_product = $model->getQuantityProduct();
        $id_order = $model->getIdOrder();
        $this->db->set('id_product', $id_product)
                 ->set('quantity_product', $qte_product)
                 ->set('id_order' ,$id_order )
                 ->insert($this->table);
    }



}
?>