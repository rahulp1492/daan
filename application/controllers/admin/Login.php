<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

  public function __construct(){
        parent::__construct();
        $this->load->library(array('bcrypt','ion_auth'));        
  }
  
    // log the user out
    public function logout()
    {
        // log the user out
        $logout = $this->ion_auth->logout();
        // redirect them to the login page
        $this->session->set_flashdata('success', $this->ion_auth->messages());
        redirect(base_url() . ADMIN_VIEW . '/login', 'refresh');
    }

  // log the user in
  public function index()
  {
    session_check_login();
    $data = array();

    if (isset($_POST['submit'])) 
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
            redirect(base_url().ADMIN_VIEW.'/dashboard');
        }
        else
        {
        // if the login was un-successful
        // redirect them back to the login page
          $this->session->set_flashdata('danger', $this->ion_auth->errors());
        redirect(base_url().ADMIN_VIEW.'/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
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

  $data['page_name'] = "Login";   
  $data['content']   = 'admin/login_view';
  $this->load->view($data['content']);
}

  public function recover_password()
  {
    if(isset($_POST['email']))
    {
      $this->form_validation->set_rules('email','Email ID','required|valid_email');

      if($this->form_validation->run()){

        $email      = $this->input->post('email');
        $condition  = array('admin_email' => $email);
        $email_addr = $this->master_model->getRecords(USERS_TABLE , $condition);

        if(empty($email_addr))
        {
          echo "E-mail address was not found. Try  again";
        exit;
        }
         $this->load->helper('string');
         $new_password    = random_string('alnum', 8);
         $data            = array('admin_password'=>$new_password);
         $whr             = array('admin_email'=> "'".$email_addr[0]['admin_email']."'");
         $update_password = $this->master_model->updateRecord(USERS_TABLE, $data, $whr);

         if($update_password)
         {
          $email_data=array(
            'reset_link' => $this->getResetlink($email_addr[0]['admin_id']),
            'email'      => $email_addr[0]['admin_email'],
            'name'       => $email_addr[0]['admin_username']
            );
          $issent = $this->account_details->send_email($email_addr[0]['admin_email'], 'Reset Your Password', $email_data, 'email/reset_password');
        }
      }else{
        echo form_error('email');
      }
    }
  }
  public function getResetlink($userId='')
  {
    /*
    Reset function sets encrypted confirmation code and verification status will reset to "0"
    */
    $where = array("admin_id" => $userId);
    $set   = array(
      'confirmation_code'   => md5($userId),
      'verification_status' => "0"
    );
    $edit_record =$this->master_model->updateRecord(USERS_TABLE, $set, $where);
    return base_url().'admin/login/reset/'.$set['confirmation_code'];
  }

  public function reset($encrypted_userid='')
  {
    /*
      if doctor verified then not allow to reset the password, for that he needs to forget password again
      forget password set the confirmation code and set verification status to the "0"
    */
  $data['success'] = $data['error']='';
  $getRecords      = $this->master_model->getRecordCount(USERS_TABLE, array("confirmation_code"=>$encrypted_userid, "verification_status"=>'0'));
  if($getRecords == 1){
    if(isset($_POST['reset'])){
      $this->form_validation->set_rules('new_password','New Password','trim|required|min_length[6]|max_length[20]|matches[cnf_password]');
      $this->form_validation->set_rules('cnf_password','Confirm Password','trim|required|min_length[6]|max_length[20]');

      if($this->form_validation->run() == TRUE)
      {
        $array_data                        = $where= array();
        $array_data['admin_password']      = hash('sha256', $this->input->post('new_password'));
        $array_data['verification_status'] = "1";
        $where["confirmation_code"]        = "'".$encrypted_userid."'";
        $edit_record                       = $this->master_model->updateRecord(USERS_TABLE,$array_data, $where);
        if($edit_record == TRUE)
          {
            $this->session->set_flashdata('success','Password Changed Successfully!');
            redirect(base_url().ADMIN_CTRL);
          }
          else
          {
            $this->session->set_flashdata('error','Error while changing password');
            redirect(base_url().'admin/login/reset/'.$where['user_password']);
          }
      }
    }
      $arrayData['data'] = $encrypted_userid;
      $this->load->view('admin/reset_password', $arrayData);
    }else{

      $this->session->set_flashdata('error','You have already verified');
      redirect(base_url().ADMIN_CTRL);
    }
  }
}