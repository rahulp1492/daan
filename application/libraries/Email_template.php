<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_template {

	protected $CI;


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

public function zala_send($email_data)
{
  $this->CI=& get_instance();

 $config['protocol']     = 'smtp';
 $config['smtp_host']    = 'ssl://kodwell.co.uk';
 $config['smtp_port']    = '465';
 $config['smtp_timeout'] = '7';
 $config['smtp_user']    = 'testing@kodwell.co.uk';
 $config['smtp_pass']    = 'Welcome@100';
 $config['charset']      = 'utf-8';
 $config['newline']      = "\r\n";
 $config['mailtype']     = 'html'; // or html
 $config['validation']   = TRUE; // bool whether to validate email or not  
 $this->CI->load->library('email', $config);
 $this->CI->email->initialize($config);
 $this->CI->email->from('shkasd1992@gmail.com','SwaDaan');
 $this->CI->email->to($email_data['to']); 
 $this->CI->email->set_mailtype("html");
 $this->CI->email->subject($email_data['subject']);
 $this->CI->email->message($this->CI->load->view("welcome_message", array(), true));
 if($this->CI->email->send()) 
 {
   print_r('zalana bho sent');
 }
}

public function send_email_template($email_data)
{
 $this->CI=& get_instance();
 $config['protocol']     = 'smtp';
 $config['smtp_host']    = 'ssl://smtp.gmail.com';
 $config['smtp_port']    = '465';
 $config['smtp_timeout'] = '7';
 $config['smtp_user']    = 'shkasd1992@gmail.com';
 $config['smtp_pass']    = 'Rahul@525752';
 $config['charset']      = 'utf-8';
 $config['newline']      = "\r\n";
 $config['mailtype']     = 'html'; // or html
 $config['validation']   = TRUE; // bool whether to validate email or not  
 $this->CI->load->library('email', $config);
 $this->CI->email->initialize($config);
 $this->CI->email->from('shkasd1992@gmail.com','SwaDaan');
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
