<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_template {

	protected $CI;

  public function activation_email($email_data)
  {
   $this->CI=& get_instance();

   $arr_email_template = $this->CI->master_model->getRecords(EMAIL_TEMPLATE_TABLE , array('id' => 33));

   if($arr_email_template)
   {
    $reminder = $email_data['reset_link'];
    $content = $arr_email_template[0]['template_html'];
    $content = str_replace("##FIRST_NAME##",$email_data['name'],$content);
    $content = str_replace("##USER_EMAIL##", $email_data['email'], $content);
    $content = str_replace("##REMINDER_URL##", $reminder, $content);
    $email_data = array(
     'to' => $email_data['email'],
     'subject' => $arr_email_template[0]['template_subject'],
     'content' => $content
     );
    $issent = $this->send_email_template($email_data);
  }  
  return $issent;  
}

public function account_activation($email_data)
{
  $this->CI=& get_instance();

  $arr_email_template = $this->CI->master_model->getRecords(EMAIL_TEMPLATE_TABLE , array('id' => 6));

  if($arr_email_template)
  {
    $reminder = $email_data['reset_link'];
    $content = $arr_email_template[0]['template_html'];
    $content = str_replace("##FIRST_NAME##",$email_data['name'],$content);
    $content = str_replace("##USER_EMAIL##", $email_data['email'], $content);
    $content = str_replace("##REMINDER_URL##", $reminder, $content);

    //$content = html_entity_decode($content);
    $email_data = array(
      'to' => $email_data['email'],
      'subject' => $arr_email_template[0]['template_subject'],
      'content' => $content
      );

    $issent = $this->send_email_template($email_data);
  }  

  return $issent;  
}

public function forget_password($email_data)
{
  $this->CI=& get_instance();

  $arr_email_template = $this->CI->master_model->getRecords(EMAIL_TEMPLATE_TABLE , array('id' => '7'));

  if($arr_email_template)
  {
    $reminder = $email_data['reset_link'];
    $content = $arr_email_template[0]['template_html'];
    $content = str_replace("##FIRST_NAME##",$email_data['name'],$content);
    $content = str_replace("##EMAIL##", $email_data['email'], $content);
    $content = str_replace("##REMINDER_URL##", $reminder, $content);
    $email_data = array(
      'to' => $email_data['email'],
      'subject' => $arr_email_template[0]['template_subject'],
      'content' => $content
      );

    $issent = $this->send_email_template($email_data);
  }  

  return $issent;  
}

public function intrested($email_data)
{
  $this->CI=& get_instance();

  $arr_email_template = $this->CI->master_model->getRecords(EMAIL_TEMPLATE_TABLE , array('id' => '37'));

  if($arr_email_template)
  {
    $content = $arr_email_template[0]['template_html'];
    $content = str_replace("##PET_OWNER##",$email_data['name'],$content);
    $content = str_replace("##USER_NAME##",$email_data['intrested_user_name'],$content);
    $content = str_replace("##USER_EMAIL##", $email_data['intrested_user_email'], $content);
    $content = str_replace("##PET_NAME##", $email_data['pet_name'], $content);
    $email_data = array(
      'to' => $email_data['email'],
      'subject' => $arr_email_template[0]['template_subject'],
      'content' => $content
      );

    $issent = $this->send_email_template($email_data);
  }  

  return $issent;  
}

public function enquiry($email_data)
{
  $this->CI=& get_instance();

  $arr_email_template = $this->CI->master_model->getRecords(EMAIL_TEMPLATE_TABLE , array('id' => '38'));

  if($arr_email_template)
  {
    $content = $arr_email_template[0]['template_html'];
    $content = str_replace("##PET_OWNER##",$email_data['name'],$content);
    $content = str_replace("##USER_NAME##",$email_data['enquiry_user_name'],$content);
    $content = str_replace("##USER_EMAIL##", $email_data['enquiry_user_email'], $content);
    $content = str_replace("##USER_PHONE##", $email_data['enquiry_user_phone'], $content);
    $content = str_replace("##USER_MESSAGE##", $email_data['enquiry_user_message'], $content);
    $content = str_replace("##PET_NAME##", $email_data['pet_name'], $content);
    $email_data = array(
      'to' => $email_data['email'],
      'subject' => $arr_email_template[0]['template_subject'],
      'content' => $content
      );

    $issent = $this->send_email_template($email_data);
  }  

  return $issent;  
}

public function successfull_activation($email_data)
{
  $this->CI=& get_instance();

  $arr_email_template = $this->CI->master_model->getRecords(EMAIL_TEMPLATE_TABLE , array('id' => 35));

  if($arr_email_template)
  {
    $content = $arr_email_template[0]['template_html'];
    $content = str_replace("##USER_NAME##",$email_data['name'],$content);
    //$content = html_entity_decode($content);
    $email_data = array(
      'to'      => $email_data['email'],
      'subject' => $arr_email_template[0]['template_subject'],
      'content' => $content
      );

    $issent = $this->send_email_template($email_data);
  }  

  return $issent;  
}

public function send_email_template($email_data)
{
 $this->CI=& get_instance();
 $config['protocol']     = 'smtp';
 $config['smtp_host']    = 'ssl://smtp.gmail.com';
 $config['smtp_port']    = '465';
 $config['smtp_timeout'] = '7';
 $config['smtp_user']    = 'yanikluis5@gmail.com';
 $config['smtp_pass']    = 'webwing@webwing';
 $config['charset']      = 'utf-8';
 $config['newline']      = "\r\n";
 $config['mailtype']     = 'html'; // or html
 $config['validation']   = TRUE; // bool whether to validate email or not  
 $this->CI->load->library('email', $config);
 $this->CI->email->initialize($config);
 $this->CI->email->from('yanikluis5@gmail.com','webwing@webwing');
 $this->CI->email->to($email_data['to']); 
 $this->CI->email->set_mailtype("html");
 $this->CI->email->subject($email_data['subject']);
 $this->CI->email->message($this->CI->load->view("email/email_template", array('content' => $email_data['content'],'email'=>$email_data['to']), true));
 if($this->CI->email->send()) 
 {
   return true;
 }
}


}
