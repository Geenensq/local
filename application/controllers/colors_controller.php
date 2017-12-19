<?php
/**
 * Dashboard Attack, command manager
 * colors_controller.php
 * Coded with Codeigniter 3
 * @author Geenens Quentin <geenensq@gmail.com>
 * @version 1.0
 */

Class Colors_controller extends CI_Controller
{

	private $name_color;
	private $code_color;
	private $name_group_colors;

// =======================================================================//
// !                  Constructor of my Class                            //
// ======================================================================//

	public function __construct()
	{
		parent::__construct();
		$this->load->model('colors_model', 'modelColors');
        $this->load->model('groups_colors_model', 'modelGroupsColors');
	}



// =======================================================================//
// !                         Default method                              //
// ======================================================================//
	public function index()
	{
        $data = $this->modelGroupsColors->selectAll();
        //---------------------------------------------------------//
        $array = [];
        $array['groups'] = $data;
		$this->load->view('dashboard/colors.html' , $array);

	}


// =======================================================================//
// !                   Method for add colors                             //
// ======================================================================//
	public function addColors()
	{
		$this->form_validation->set_rules('name_color', '"name_color"', 'required');
		$this->form_validation->set_rules('code_color', '"code_color"', 'required');
		$this->form_validation->set_rules('name_group_for_color', '"name_group_for_color"', 'required');

		$callBack = array();
        if ($this->form_validation->run()){

        	/*Retrieving my POST values ​​to store them in my attributes*/
	        $this->name_group_colors = $this->input->post('name_group_for_color');
			$this->name_color = $this->input->post('name_color');
			$this->code_color = $this->input->post('code_color');

			/* ----------------------------Create my object----------------------------------*/
			 $this->modelColors->setIdGroupColor($this->name_group_colors);
			 $this->modelColors->setName($this->name_color);
			 $this->modelColors->setColorCode($this->code_color);

			  $modelColors = $this->modelColors;
			  $this->modelColors->insertOneColor($modelColors);

			  $callBack["confirm"] = "success";
        } else {

        	$callBack["confirm"] = "error";
        }

        echo json_encode($callBack);

	}



// =======================================================================//
// !                   Method for add groups colors                      //
// ======================================================================//

	public function addGroupColors()
	{
		$this->form_validation->set_rules('name_group_colors', '"name_group_colors"', 'required');
		$callBack = array();
        if ($this->form_validation->run()){


        }

	}










}

?>