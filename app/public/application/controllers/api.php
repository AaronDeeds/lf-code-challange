<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends Base_Controller {

  function __construct()
  {
      parent::__construct();
      $this->load->model('supervisor_model');
  }
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function supervisors()
	{
    $supervisors      = $this->supervisor_model->get_supervisors();
    $supervisors_json = $this->supervisor_model->create_json($supervisors);
    die($supervisors_json);

	}

	public function submit()
	{
		$first_name    = $this->input->post('first_name');
		$last_name     = $this->input->post('last_name');
		$email         = $this->input->post('email');
		$phone         = $this->input->post('phone');
		$supervisor_id = $this->input->post('supervisor_id');
    if($first_name == "" || $last_name == '' || $supervisor_id == ''){
      die('First Name, Last Name and Supervisor is requied');
    }
    $post_data = $this->input->post();
    echo "<pre>"; print_r($post_data); echo "</pre>";
	}

  public function test()
  {
    $data = $this->supervisor_model->supervisor_select_data();
    echo "<pre>"; print_r($data);echo "</pre>";
  }

}
