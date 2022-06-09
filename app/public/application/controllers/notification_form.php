<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_form extends Base_Controller {
  function __construct()
  {
      parent::__construct();
      $this->load->model('supervisor_model');
  }

	public function index()
	{
    $data['success'] = '0';
    $data['supervisors'] = $this->supervisor_model->get_supervisors();
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

    $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[1]|max_length[100]');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[1]|max_length[100]');
    $this->form_validation->set_rules('supervisor_id', 'Supervisor', 'required|numeric');
    if ($this->form_validation->run() == FALSE){
      $this->load->view('notification_form', $data);
    }else{
      $data['success'] = '1';
      $this->load->view('notification_form', $data);
    }
	}

	public function test()
	{
    $data['supervisors'] = $this->supervisor_model->get_supervisors();
		$this->load->view('notification_form', $data);
	}


}
