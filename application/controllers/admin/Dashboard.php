<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_check();
    }

    public function index()
    {

        $data['page_title'] = "Dashboard";
        $data['content']    = "admin/dashboard";
        $this->load->view('admin/template', $data);

    }

}
