<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function register($value='')
	{
		$data['page_name'] = "Register";		
		$data['content']   = 'front/register';
		$this->load->view('front/layout/template',$data);
	}

	public function login($value='')
	{
		$data['page_name'] = "Register";		
		$data['content']   = 'front/login';
		$this->load->view('front/layout/template',$data);
	}

	public function mail_kela($value='')
	{
		$this->load->library('email_template');
		$this->email_template->zala_send(array('to'=> 'singharyan015@gmail.com', 'subject'=>'Your account activation'));
	}
}
