<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->library(array('ion_auth'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}

	// log the user out
	public function logout()
	{
		$this->data['title'] = "Logout";

			// log the user out
		$logout = $this->ion_auth->logout();

			// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('login', 'refresh');
	}

	// change password
	public function change_password()
	{
		$this->form_validation->set_rules('old', 'old password', 'required');
		$this->form_validation->set_rules('new', 'new password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm','confirm new password', 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			// display the form
			// set the flash data error message if there is one
			//$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['message'] = (validation_errors()) ? $this->session->set_flashdata('danger', validation_errors()) : '';


			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name'    => 'new',
				'id'      => 'new',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name'    => 'new_confirm',
				'id'      => 'new_confirm',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);


			// render
			$this->data['page_name'] = "Change Password";		
			$this->data['content']   = 'front/change_password';
			$this->_render_page('front/layout/template', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('success', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('danger', $this->ion_auth->errors());
				redirect('user/change_password', 'refresh');
			}
		}
	}

	public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
}