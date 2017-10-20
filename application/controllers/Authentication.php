<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}	

	// log the user in
	public function login()
	{
		if(empty($_POST))
		{
			$data['page_name'] = "Login";		
			$data['content']   = 'front/login';
			$this->load->view('front/layout/template',$data);
		}
		$this->data['title'] = $this->lang->line('login_heading');

		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('success', $this->ion_auth->messages());
				redirect('user/profile', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('danger', $this->ion_auth->errors());
				redirect('authentication/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);

			$this->load->view('front/layout/alert', $this->data);
			// $this->_render_page('authentication/login', $this->data);
		}
	}

	// log the user out
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('authentication/login', 'refresh');
	}

	// public function register($value='')
	// {
	// 	$data['page_name'] = "Register";		
	// 	$data['content']   = 'front/register';
	// 	$this->load->view('front/layout/template',$data);
	// }

	// public function loginview($value='')
	// {
	// 	$data['page_name'] = "Register";		
	// 	$data['content']   = 'front/login';
	// 	$this->load->view('front/layout/template',$data);
	// }

	// public function forgot_password($value='')
	// {
	// 	$data['page_name'] = "Register";		
	// 	$data['content']   = 'front/login';
	// 	$this->load->view('front/layout/template',$data);
	// }
}
