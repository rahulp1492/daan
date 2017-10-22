<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	public function login($value='')
	{
		$data = $this->session->flashdata('data');
		$data['page_name'] = "Login";		
		$data['content']   = 'front/login';
		$this->load->view('front/layout/template', $data);
	}

	// log the user in
	public function login_process()
	{
		$data = array();

		if (isset($_POST['btn_login'])) 
		{
			//validate form input
			$this->form_validation->set_rules('email','email', 'required|valid_email');
			$this->form_validation->set_rules('password','password', 'required');

			if ($this->form_validation->run() == true)
			{
			// check to see if the user is logging in
			// check for "remember me"
				$remember = (bool) $this->input->post('remember');

				if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
				{
				//if the login is successful
				//redirect them back to the home page
					//$this->session->set_flashdata('success', $this->ion_auth->messages());
					redirect('user/profile', 'refresh');
				}
				else
				{
				// if the login was un-successful
				// redirect them back to the login page
					$this->session->set_flashdata('danger', $this->ion_auth->errors());
				redirect('login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
					// the user is not logging in so display the login page
				// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? $this->session->set_flashdata('danger', validation_errors()) : '';

			$data['email'] = array('name' => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);
		}
	}
	$this->session->set_flashdata('data', $data);
	redirect(base_url().'login');
}

	// log the user in
public function registration_process()
{
	$data = array();

	if (isset($_POST['btn_register'])) 
	{
			//validate form input
		$tables = $this->config->item('tables','ion_auth');
		$identity_column = $this->config->item('identity','ion_auth');
        //$data['identity_column'] = $identity_column;

		$this->form_validation->set_rules('first_name',	'first_name', 'required');
		$this->form_validation->set_rules('last_name',	'last_name', 'required');
		$this->form_validation->set_rules('email',		'email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('address',	'address', 'required|max_length[250]');
		$this->form_validation->set_rules('phone',		'phone', 'required|trim|numeric|exact_length[10]');
		$this->form_validation->set_rules('pincode',	'pincode', 'required|numeric|exact_length[6]');
		$this->form_validation->set_rules('state',		'state', 'required|numeric');
		$this->form_validation->set_rules('city',		'city', 'required|numeric');
		$this->form_validation->set_rules('password',	'password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[confirm]');
		$this->form_validation->set_rules('confirm',	'confirm password', 'required');

		if ($this->form_validation->run() == true)
		{
			$email    = strtolower($this->input->post('email'));
			$identity = $email;
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'address'    => $this->input->post('address'),
				'pincode'    => $this->input->post('pincode'),
				'state'    	 => $this->input->post('state'),
				'city'    	=> $this->input->post('city'),				
				'phone'      => $this->input->post('phone'),
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
            // check to see if we are creating the user
            // redirect them back to the admin page
			$this->session->set_flashdata('success', $this->ion_auth->messages());
			redirect("register", 'refresh');
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? $this->session->set_flashdata('danger', validation_errors()) : '';
		}
	}
	$this->session->set_flashdata('data', $data);
	redirect(base_url().'register');
}

public function register($value='')
{
	$data = $this->session->flashdata('data');
	$data['page_name'] = "Register";		
	$data['content']   = 'front/register';
	$this->load->view('front/layout/template',$data);
}

	// activate the user
public function activate($id, $code=false)
{
	if ($code !== false)
	{
		$activation = $this->ion_auth->activate($id, $code);
	}
	else if ($this->ion_auth->is_admin())
	{
		$activation = $this->ion_auth->activate($id);
	}

	if ($activation)
	{
		// redirect them to the auth page
		$this->session->set_flashdata('success', $this->ion_auth->messages());
		redirect("login", 'refresh');
	}
	else
	{
		// redirect them to the forgot password page
		$this->session->set_flashdata('danger', $this->ion_auth->errors());
		redirect("forgot-password", 'refresh');
	}
}
	// forgot password
public function forgot_password()
{
		// setting validation rules by checking whether identity is username or email
	if($this->config->item('identity', 'ion_auth') != 'email')
	{
		$this->form_validation->set_rules('identity', 'email', 'required');
	}
	else
	{
		$this->form_validation->set_rules('identity', 'email', 'required|valid_email');
	}

	if ($this->form_validation->run() == false)
	{
		$this->data['type'] = $this->config->item('identity','ion_auth');
			// setup the input
		$this->data['identity'] = array('name' => 'identity',
			'id' => 'identity',
		);

			// set any errors and display the form
		$data['message'] = (validation_errors()) ? $this->session->set_flashdata('danger', validation_errors()) : '';

		$this->data['page_name'] = "Forgot Password";
		$this->data['content']   = 'front/forgot_password';
		$this->_render_page('front/layout/template', $this->data);
	}
	else
	{
		$identity_column = $this->config->item('identity','ion_auth');
		$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

		if(empty($identity)) {

			if($this->config->item('identity', 'ion_auth') != 'email')
			{
				$this->ion_auth->set_error('forgot_password_identity_not_found');
			}
			else
			{
				$this->ion_auth->set_error('forgot_password_email_not_found');
			}

			$this->session->set_flashdata('danger', $this->ion_auth->errors());
			redirect("forgot-password", 'refresh');
		}

			// run the forgotten password method to email an activation code to the user
		$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

		if ($forgotten)
		{
				// if there were no errors
			$this->session->set_flashdata('success', $this->ion_auth->messages());
				redirect("login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('danger', $this->ion_auth->errors());
				redirect("forgot-password", 'refresh');
			}
		}
	}

	// reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				// display the form

				// set the flash data error message if there is one
				$data['message'] = (validation_errors()) ? $this->session->set_flashdata('danger', validation_errors()) : '';

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
					'type' => 'password',
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
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				$this->data['page_name'] = "Reset Password";
				$this->data['content']   = 'front/reset_password';
				$this->_render_page('front/layout/template', $this->data);			
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('success', $this->ion_auth->messages());
						redirect("login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('danger', $this->ion_auth->errors());
						redirect('reset-password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('danger', $this->ion_auth->errors());
			redirect("forgot-password", 'refresh');
		}
	}

	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce()
	{
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
}
