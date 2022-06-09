<?php

if(!defined('BASEPATH')) {
    http_response_code(404) && die();
}

class Base_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->page_controller = $this->router->fetch_class();
        $this->page_method = $this->router->fetch_method();
        $this->load->library('form_validation', 'session');

    }

}


class Cron_Controller extends CI_Controller
{
    public $CI;

    function __construct()
    {
        parent::__construct();
        $this->CI = & get_instance();
    }
}
