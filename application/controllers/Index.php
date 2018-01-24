<?php defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('index_model');
    }

    /**
     * Callback function for file uploads and validation checking
     * @return boolean
     */
    public function upload_file()
    {
        $config['upload_path']   = './uploads/donation_banner/';
        $config['max_size']      = 1024 * 300;
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['encrypt_name']  = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (isset($_FILES['timeline_file']) && !empty($_FILES['timeline_file']['name'])) {
            if ($this->upload->do_upload('timeline_file')) {
                $upload_data            = $this->upload->data();
                $_POST['timeline_file'] = $upload_data['file_name'];
                return true;
            } else {
                $this->form_validation->set_message('upload_file', $this->upload->display_errors());
                return false;
            }
        } else {
            $this->form_validation->set_message('upload_file', 'Please select file.');
            $_POST['timeline_file'] = null;
            return false;
        }
    }

    public function get_slug($string = '')
    {
        $slug = preg_replace('/[^\pL\pN;]+/', '_', $string);

        $count = $this->master_model->getRecordCount('donation', ['slug' => $slug]);
        $slug  = ($count > 0) ? $slug . "_" . hash("sha256", time()) : $slug;
        return strtolower($slug);
    }

    /**
     * Post the do request form
     */
    public function do_request($value = '')
    {
        if (!empty($this->session->userdata('user_id')) && $this->session->userdata('user_id') != '') {

            $id = $this->session->userdata('user_id');

            $this->form_validation->set_rules('timeline_file', 'File', 'callback_upload_file');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('donation_type', 'Last Name', 'required|numeric');
            $this->form_validation->set_rules('state', 'State', 'required|numeric');
            $this->form_validation->set_rules('city', 'City', 'required|numeric');
            $this->form_validation->set_rules('pincode', 'Pin Code', 'required|numeric');
            $this->form_validation->set_rules('quantity', 'Quantity', '');
            $this->form_validation->set_rules('message', 'Message', 'max_length[500]');
            $this->form_validation->set_rules('address', 'Address', 'max_length[500]');

            if ($this->form_validation->run() == true) {

                $array_data            = array();
                $array_data['name']    = $this->input->post('title');
                $array_data['type']    = $this->input->post('donation_type');
                $array_data['state']   = $this->input->post('state');
                $array_data['city']    = $this->input->post('city');
                $array_data['pincode'] = $this->input->post('pincode');
                $array_data['qty']     = $this->input->post('quantity');
                $array_data['message'] = $this->input->post('message');
                $array_data['address'] = $this->input->post('address');
                $array_data['banner']  = $this->input->post('timeline_file');
                $array_data['slug']    = $this->get_slug($this->input->post('title'));
                $array_data['status']  = '1';
                $array_data['uid']     = $id;

                $insert_record = $this->master_model->insertRecord('donation', $array_data);

                if ($insert_record == true) {
                    $this->session->set_flashdata('success', 'Request Posted Successfully');
                } else {
                    $this->session->set_flashdata('danger', 'Error while posting request.');
                }
            }

            redirect(base_url());
        } else {
            $this->session->set_flashdata('danger', 'Please login first');
            redirect(base_url('login'));
        }
    }

    /**
     * Post donation form
     */
    public function do_donation($value = '')
    {
        if (!empty($this->session->userdata('user_id')) && $this->session->userdata('user_id') != '') {

            $id = $this->session->userdata('user_id');

            $this->form_validation->set_rules('timeline_file', 'File', 'callback_upload_file');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('donation_type', 'Last Name', 'required|numeric');
            $this->form_validation->set_rules('state', 'State', 'required|numeric');
            $this->form_validation->set_rules('city', 'City', 'required|numeric');
            $this->form_validation->set_rules('pincode', 'Pin Code', 'required|numeric');
            $this->form_validation->set_rules('quantity', 'Quantity', '');
            $this->form_validation->set_rules('message', 'Message', 'max_length[500]');
            $this->form_validation->set_rules('address', 'Address', 'max_length[500]');

            if ($this->form_validation->run() == true) {

                $array_data            = array();
                $array_data['name']    = $this->input->post('title');
                $array_data['type']    = $this->input->post('donation_type');
                $array_data['state']   = $this->input->post('state');
                $array_data['city']    = $this->input->post('city');
                $array_data['pincode'] = $this->input->post('pincode');
                $array_data['qty']     = $this->input->post('quantity');
                $array_data['message'] = $this->input->post('message');
                $array_data['address'] = $this->input->post('address');
                $array_data['banner']  = $this->input->post('timeline_file');
                $array_data['slug']    = $this->get_slug($this->input->post('title'));
                $array_data['status']  = '0';
                $array_data['uid']     = $id;

                $insert_record = $this->master_model->insertRecord('donation', $array_data);

                if ($insert_record == true) {
                    $this->session->set_flashdata('success', 'Donation Posted Successfully');
                } else {
                    $this->session->set_flashdata('danger', 'Error while posting donation.');
                }
            }
            redirect(base_url());
        } else {
            $this->session->set_flashdata('danger', 'Please login first');
            redirect(base_url('login'));
        }
    }

    public function index($value = '')
    {
        $data['banner'] = $this->master_model->getRecords('account_setting');
        $data['banner'] = isset($data['banner'][0])? $data['banner'][0]:array();

        if (file_exists('./uploads/admin/banner/'.$data['banner']['banner_image'])) {
        	$data['banner']['banner_image'] = base_url().'uploads/admin/banner/'.$data['banner']['banner_image'];
        }else{
        	$data['banner']['banner_image'] = base_url().'assets/img/slider.jpg';
        }

        $data['do_donation'] = $this->index_model->getCards('donation', array('status' => 1), 'donation.slug,transaction.qty,donation_type.image,donation_type.image_thumb,users.pro_img,users.first_name,users.last_name,donation.qty as goal_qty,donation.name as donation_title,donation_type.name as donation_name,donation.id as donation_id',
            array('donation.created_at' => 'ASC'),
            false,
            8);

        $data['donation_type'] = $this->master_model->getRecords('donation_type');

        $data['reqst_donation'] = $this->index_model->getCards('donation', array('status' => 0), 'donation.slug,transaction.qty,donation_type.image,donation_type.image_thumb,users.pro_img,users.first_name,users.last_name,donation.qty as goal_qty,donation.name as donation_title,donation_type.name as donation_name,donation.id as donation_id',
            array('donation.created_at' => 'ASC'),
            false,
            8);

        $data['angles_donar'] = $this->index_model->getDonars('transaction', false, 'users.first_name,users.last_name,users.pro_img,user_request.uid,count(user_request.uid) as usr_cnt', array('usr_cnt' => 'DSC'), false, 8);
        //Quantity wise sorting not done.

        $data['page_name'] = "Home";
        $data['content']   = 'front/index';
        $this->load->view('front/layout/template', $data);
    }

    public function make_donation($value='')
    {
            $perpage      = isset($_POST['per_page']) ? $_POST['per_page'] : 20;
            $data['page'] = (isset($_GET['page'])) ? $perpage * (($_GET['page']) - 1) : 0;

            $data['total'] = $this->master_model->getRecordCount(DONATION_TABLE,
                array(
                    DONATION_TABLE . ".status"   => 1,
                    DONATION_TABLE . ".activate" => '1',
                    DONATION_TABLE . ".active"   => '1',
                ));
            $pageNum  = $this->input->get('page');
            $pageURL  = base_url('take_donation');
            $_pageRes = commonPagination($pageNum, $pageURL, $data['total'], 4, $perpage);

            $data['pagination']   = $_pageRes['page_links'];
            $data['arr_donation'] = $this->index_model->getCards(DONATION_TABLE,
                array(
                    DONATION_TABLE . ".status"   => 1,
                    DONATION_TABLE . ".activate" => '1',
                    DONATION_TABLE . ".active"   => '1',
                ),
                'donation.slug,transaction.qty,donation_type.image,donation_type.image_thumb,users.pro_img,users.first_name,users.last_name,donation.qty as goal_qty,donation.name as donation_title,donation_type.name as donation_name,donation.id as donation_id',
                array('donation.created_at' => 'ASC'),
                $_pageRes['offset'],
                $_pageRes['per_page']);

        $data['page_name'] = "Make Donation";
        $data['content']   = 'front/make_donation';
        $this->load->view('front/layout/template', $data);
    }

    public function take_donation($value='')
    {
            $perpage      = isset($_POST['per_page']) ? $_POST['per_page'] : 20;
            $data['page'] = (isset($_GET['page'])) ? $perpage * (($_GET['page']) - 1) : 0;

            $data['total'] = $this->master_model->getRecordCount(DONATION_TABLE,
                array(
                    DONATION_TABLE . ".status"   => 0,
                    DONATION_TABLE . ".activate" => '1',
                    DONATION_TABLE . ".active"   => '1',
                ));
            $pageNum  = $this->input->get('page');
            $pageURL  = base_url('take_donation');
            $_pageRes = commonPagination($pageNum, $pageURL, $data['total'], 4, $perpage);

            $data['pagination']   = $_pageRes['page_links'];
            $data['arr_requests'] = $this->index_model->getCards(DONATION_TABLE,
                array(
                    DONATION_TABLE . ".status"   => 0,
                    DONATION_TABLE . ".activate" => '1',
                    DONATION_TABLE . ".active"   => '1',
                ),
                'donation.slug,transaction.qty,donation_type.image,donation_type.image_thumb,users.pro_img,users.first_name,users.last_name,donation.qty as goal_qty,donation.name as donation_title,donation_type.name as donation_name,donation.id as donation_id',
                array('donation.created_at' => 'ASC'),
                $_pageRes['offset'],
                $_pageRes['per_page']);

        $data['page_name'] = "Take Donation";
        $data['content']   = 'front/take_donation';
        $this->load->view('front/layout/template', $data);
    }

    /**
     * Timeline profiles
     */
    public function timeline($enc_id = '')
    {
        $id = base64_decode($enc_id);
        $count = $this->master_model->getRecordCount('users', ['id' => $id]);
        if ($count>0) {

            $user_profile         = $this->master_model->getRecords(USERS_TABLE, array('id' => $id), false, false, false, 1);
            $data['user_profile'] = !empty($user_profile[0]) ? $user_profile[0] : array();
            $data['arr_donations'] = $this->index_model->getCards(DONATION_TABLE,
                array(
                    DONATION_TABLE . ".completed_uid" => $id,
                    DONATION_TABLE . ".status"        => 1,
                    DONATION_TABLE . ".active"        => '1',
                    DONATION_TABLE . ".complete"      => '1',
                ),
                'donation.slug,transaction.qty,donation_type.image,users.pro_img,users.first_name,users.last_name,donation.qty as goal_qty,donation.name as donation_title,donation_type.name as donation_name,donation.id as donation_id',
                array('donation.created_at' => 'ASC'),
                false,
                8);

            $data['page_title'] = PROJECT_NAME . ' | Donation Profile';
            $data['page_name']  = 'Profile Edit';
            $data['content']    = 'front/user/timeline';
            $this->load->view('front/layout/template', $data);
        } else {
            redirect('/');
        }
    }

    public function donate_description($slug)
    {
        $data              = $this->session->flashdata('data');
        $data['desc_card'] = $this->index_model->getDescCard('donation', array('slug' => $slug), '*,donation_type.name as donation_name,donation.created_at as donation_date,donation.name as donation_title, donation.message as donation_message');

        $data['angles_donar'] = $this->index_model->getDonars('transaction', false, 'users.first_name,users.last_name,users.pro_img,count(user_request.uid) as usr_cnt', array('usr_cnt' => 'DSC'), false, 12);

        $data['req_list'] = $this->index_model->getReqList('user_request', array('slug' => $slug), 'user_request.id as users_request_id,donation.slug,user_request.created_at,user_request.message,users.first_name,users.last_name,users.pro_img', false, false, 20);

        $data['page_name'] = "Donation Descrition";
        $data['content']   = 'front/donation_desc';
        $this->load->view('front/layout/template', $data);
    }

    public function newsletter($value = '')
    {

        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email', array('valid_email' => "Email should be Valid.", 'required' => "Email should not be empty."));

        if ($this->form_validation->run()) {

            $data['email']  = $this->input->post('user_email');
            $getRecordCount = $this->master_model->getRecordCount("news_letter", $data);

            if ($getRecordCount != 1 && $getRecordCount < 2) {
                $response = $this->master_model->insertRecord("news_letter", $data);
                if ($response) {
                    $response = "<span style='color:green;'>Subscribed successfully</span>";
                } else {
                    $response = "Unknown Error Try Again.";
                }

            } else {
                $response = "Subscribed already.";
            }
        } else {
            $response = "<span style='color:red !important;'>" . form_error('user_email') . "</span>";
        }
        echo $response;
    }

    public function make_donaton_reqst($redirect)
    {
        //print_r($_POST);
        //redirect(base_url().$this->uri->uri_string(), 'refresh');
        //var_dump($redirect);
        $this->form_validation->set_rules("message", "message", "required|max_length[150]");
        $this->form_validation->set_rules("donate_qty", "Quantity", "required|numeric|less_than_equal_to[10]");
        if ($this->form_validation->run()) {
            if (!isset($_SESSION['identity'])) {
                $this->session->set_flashdata('makerequest', true);
                $this->session->set_flashdata('warning', "Please Login,To Make Request");
                redirect(base_url() . INDEXPHP . "index/donate_description/" . $redirect, 'refresh');
            } else {
                //datbase code
                $donid = $this->master_model->getRecords('donation', array('slug' => $redirect), 'id');
                if ($this->master_model->getRecordCount('user_request', array('uid' => $_SESSION['user_id'], 'donationid' => $donid[0]['id'])) > 0) {
                    //allready post
                    $this->session->set_flashdata('makerequest', true);
                    $this->session->set_flashdata('warning', "Request already has been made,only one request allowed");
                    redirect(base_url() . INDEXPHP . "index/donate_description/" . $redirect, 'refresh');
                } else {

                    //print_r($donid[0]['id']);die();
                    $insert = array('donationid' => $donid[0]['id'],
                        'message'                    => $this->input->post('message'),
                        'qty'                        => $this->input->post('donate_qty'),
                        'uid'                        => $_SESSION['user_id'],
                    );
                    if ($this->master_model->insertRecord('user_request', $insert)) {
                        $this->session->set_flashdata('makerequest', true);
                        $this->session->set_flashdata('success', "Thank you, Request has been Made");
                        redirect(base_url() . INDEXPHP . "index/donate_description/" . $redirect, 'refresh');
                    } else {
                        $this->session->set_flashdata('makerequest', true);
                        $this->session->set_flashdata('danger', "opps try again");
                        redirect(base_url() . INDEXPHP . "index/donate_description/" . $redirect, 'refresh');
                    }

                }

            }
            //print_r($_POST);
        } else {
            $this->session->set_flashdata('makerequest', true);
            $this->session->set_flashdata('danger', validation_errors());
            redirect(base_url() . INDEXPHP . "index/donate_description/" . $redirect, 'refresh');
            //echo validation_errors();
        }

    }

    public function makeComment($redirect)
    {
        $this->form_validation->set_rules("comment", "Comment", "required|max_length[150]");
        $this->form_validation->set_rules("user_request_id", "user_request_id", "required|numeric");
        if ($this->form_validation->run()) {

        } else {
            $this->session->set_flashdata('comment', true);
            $this->session->set_flashdata('danger', validation_errors());
            redirect(base_url() . INDEXPHP . "index/donate_description/" . $redirect, 'refresh');
        }
        //var_dump($_POST);

    }
}
