<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('index_model');
	}

	public function index($value='')
	{
		$data['do_donation']=$this->index_model->getCards('donation',array('status'=>1),'donation.slug,transaction.qty,donation_type.image,users.pro_img,users.first_name,users.last_name,donation.qty as goal_qty,donation.name as donation_title,donation_type.name as donation_name,donation.id as donation_id',array('donation.datetime'=>'ASC'),false,8);
		$data['reqst_donation']=$this->index_model->getCards('donation',array('status'=>0),'donation.slug,transaction.qty,donation_type.image,users.pro_img,users.first_name,users.last_name,donation.qty as goal_qty,donation.name as donation_title,donation_type.name as donation_name,donation.id as donation_id',array('donation.datetime'=>'ASC'),false,4);
		$data['angles_donar']=$this->index_model->getDonars('transaction',false,'users.first_name,users.last_name,users.pro_img,count(user_request.uid) as usr_cnt',array('usr_cnt'=>'DSC'),false,12);
		$data['page_name'] = "Home";		
		$data['content']   = 'front/index';
		$this->load->view('front/layout/template',$data);
	}

	public function donate_description($slug){
		$data = $this->session->flashdata('data');
		$data['desc_card']=$this->index_model->getDescCard('donation',array('slug' =>$slug),'*,donation_type.name as donation_name,donation.datetime as donation_date,donation.name as donation_title, donation.message as donation_message');
		$data['angles_donar']=$this->index_model->getDonars('transaction',false,'users.first_name,users.last_name,users.pro_img,count(user_request.uid) as usr_cnt',array('usr_cnt'=>'DSC'),false,12);
		$data['req_list']=$this->index_model->getReqList('user_request',array('slug' =>$slug),'donation.slug,user_request.datetime,user_request.message,users.first_name,users.last_name,users.pro_img',false,false,20);
		//print_r($data);
		$data['page_name'] = "Donation Descrition";		
		$data['content']   = 'front/donation_desc';
		$this->load->view('front/layout/template',$data);	
	}

	function newsletter($value=''){

				$this->form_validation->set_rules('user_email','Email','required|valid_email', array('valid_email' =>"Email should be Valid.", 'required' =>"Email should not be empty."));

				if($this->form_validation->run()){

				$data['email'] 		= $this->input->post('user_email');
				$getRecordCount = $this->master_model->getRecordCount("news_letter", $data);

				if($getRecordCount!=1&&$getRecordCount<2){
				$response = $this->master_model->insertRecord("news_letter", $data);
					if($response)
					$response = "<span style='color:green;'>Subscribed successfully</span>";
					else
					$response = "Unknown Error Try Again.";
				}else{
					$response = "Subscribed already.";
				}
				}else{
					$response = "<span style='color:red !important;'>".form_error('user_email')."</span>";
				}
				echo $response;
	}

	function make_donaton_reqst($redirect){
		//print_r($_POST);
		//redirect(base_url().$this->uri->uri_string(), 'refresh');
		//echo $this->uri->uri_string();
		$this->form_validation->set_rules("message","message","required|max_length[150]");
		$this->form_validation->set_rules("donate_qty","Quantity","required|numeric|less_than_equal_to[10]");
		if($this->form_validation->run()){
			print_r($_POST);
		}else{
			//$this->session->set_flashdata('danger',validation_errors());
			//redirect(base_url().$this->uri->uri_string(), 'refresh');
			echo validation_errors();
		}
		
	}
}	
