<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth'));
        session_check();
    }

    public function index()
    {
        $perpage      = isset($_POST['per_page']) ? $_POST['per_page'] : 10;
        $data['page'] = (isset($_GET['page'])) ? $perpage * (($_GET['page']) - 1) : 0;
        $searchName   = $this->input->get('search_name');

        if (isset($searchName) && $searchName != '') {

            $sqlQry = 'SELECT * FROM ' . USERS_TABLE . ' WHERE first_name like "%' . $searchName . '%" && id!=1';
        } else {

            $sqlQry = "SELECT * FROM " . USERS_TABLE . ' WHERE id!=1';
        }
        $dataCnt             = $this->db->query($sqlQry);
        $data['total']       = $dataCnt->result_id->num_rows;
        $pageNum             = $this->input->get('page');
        $pageURL             = base_url() . ADMIN_CTRL . '/user?search_name=' . $searchName;
        $_pageRes            = $this->commonPagination($pageNum, $pageURL, $data['total'], 4, $perpage);
        $data['pagination']  = $_pageRes['page_links'];
        $sqlQuery            = $sqlQry . ' LIMIT ' . $_pageRes['offset'] . ' ,' . $_pageRes['per_page'] . '';
        $dataSql             = $this->db->query($sqlQuery);
        $data['arr_user']    = $dataSql->result_array();
        $data['search_name'] = isset($searchName) && $searchName != '' ? $searchName : '';
        $data['page_title']  = PROJECT_NAME . ' | Manage User';
        $data['module_name'] = 'Manage User';
        $data['content']     = ADMIN_CTRL . '/user/user_manage';
        $this->load->view(ADMIN_VIEW . '/template', $data);
    }

    public function getResetlink($userId = '')
    {
        /*
        Reset function sets encrypted confirmation code and verification status will reset to "0"
         */
        $where = array("id" => $userId);
        $set   = array(
            'confirmation_code'   => md5($userId),
            'verification_status' => "0",
        );
        $edit_record = $this->master_model->updateRecord(USERS_TABLE, $set, $where);
        return base_url() . 'front/user/reset/' . $set['confirmation_code'];
    }

    public function add($value = '')
    {
        $data['success'] = $data['error'] = '';

        if (isset($_POST['add_user'])) {

            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email Id', 'required|valid_email|is_unique[' . USERS_TABLE . '.email]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('state', 'State', 'required|numeric');
            $this->form_validation->set_rules('city', 'City', 'required|numeric');
            $this->form_validation->set_rules('pincode', 'Pin Code', 'required|numeric');
            $this->form_validation->set_rules('aadhar_number', 'Aadhar Number', 'numeric');
            $this->form_validation->set_rules('tax_id', 'Tax ID', '');
            $this->form_validation->set_rules('other', 'Other Information', '');
            $this->form_validation->set_rules('profession', 'Profession', '');
            //validate form input
            $tables          = $this->config->item('tables', 'ion_auth');
            $identity_column = $this->config->item('identity', 'ion_auth');

            if ($this->form_validation->run() == true) {
                $email    = strtolower($this->input->post('email'));
                $identity = $email;
                $password = '123456';

                $array_data                      = array();
                $array_data['first_name']        = $this->input->post('first_name');
                $array_data['last_name']         = $this->input->post('last_name');
                $array_data['username']          = $identity;
                $array_data['phone']             = $this->input->post('phone');
                $array_data['address']           = $this->input->post('address');
                $array_data['state']             = $this->input->post('state');
                $array_data['city']              = $this->input->post('city');
                $array_data['pincode']           = $this->input->post('pincode');
                $array_data['sd_aadhar']         = $this->input->post('aadhar_number');
                $array_data['sd_tax_card']       = $this->input->post('tax_id');
                $array_data['other']             = $this->input->post('other');
                $array_data['profession']        = $this->input->post('profession');
                $array_data['user_verification'] = '1';

                $this->ion_auth->register($identity, $password, $email, $array_data);
                    // check to see if we are creating the user
                    // redirect them back to the admin page
                    $this->session->set_flashdata('success', 'User registered successfully');
                    redirect(base_url() . ADMIN_CTRL . '/user');
            }
        }

        $data['page_title'] = PROJECT_NAME . ' | Add User';
        $data['content']    = ADMIN_CTRL . '/user/user_add';
        $this->load->view(ADMIN_VIEW . '/template', $data);
    }

    public function edit($id)
    {
        if (isset($id) != '') {
            $id_edit = $id;
            $id      = base64_decode($id);

            if (isset($_POST['user_edit'])) {

                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('state', 'State', 'required|numeric');
                $this->form_validation->set_rules('city', 'City', 'required|numeric');
                $this->form_validation->set_rules('pincode', 'Pin Code', 'required|numeric');
                $this->form_validation->set_rules('aadhar_number', 'Aadhar Number', 'numeric');
                $this->form_validation->set_rules('tax_id', 'Aadhar Number', '');
                $this->form_validation->set_rules('other', 'Other Information', '');
                $this->form_validation->set_rules('profession', 'Profession', '');

                if ($this->form_validation->run() == true) {

                    $array_data                = array();
                    $array_data['first_name']  = $this->input->post('first_name');
                    $array_data['last_name']   = $this->input->post('last_name');
                    $array_data['address']     = $this->input->post('address');
                    $array_data['state']       = $this->input->post('state');
                    $array_data['city']        = $this->input->post('city');
                    $array_data['pincode']     = $this->input->post('pincode');
                    $array_data['sd_aadhar']   = $this->input->post('aadhar_number');
                    $array_data['sd_tax_card'] = $this->input->post('tax_id');
                    $array_data['other']       = $this->input->post('other');
                    $array_data['profession']  = $this->input->post('profession');

                    $edit_record = $this->master_model->updateRecord(USERS_TABLE, $array_data, array("id" => $id));

                    if ($edit_record == true) {
                        $this->session->set_flashdata('success', ' Profile Updated Successfully!');
                        redirect(base_url() . ADMIN_CTRL . '/user/edit/' . $id_edit);
                    } else {
                        $this->session->set_flashdata('danger', ' Error while editing profile.');
                        redirect(base_url() . ADMIN_CTRL . '/user/edit/' . $id_edit);
                    }
                } else {
                    print_r(validation_errors());
                }
            }

            $data['arr_user']   = $this->master_model->getRecords(USERS_TABLE, array("id" => $id));
            $data['arr_user']   = isset($data['arr_user'][0]) ? $data['arr_user'][0] : array();
            $data['page_title'] = PROJECT_NAME . ' | User Edit';
            $data['page_name']  = 'User Edit';
            $data['content']    = ADMIN_CTRL . '/user/user_edit';
            $this->load->view(ADMIN_VIEW . '/template', $data);
        }
    }

    public function commonPagination($segmnetUri, $baseUrl, $totalRec, $configuri, $numOfRec = '')
    {
        $resp                  = array();
        $page_number           = $segmnetUri;
        $page_url              = $config['base_url']              = $baseUrl;
        $config['uri_segment'] = $configuri;
        if (empty($numOfRec)) {$numOfRec = 25;}
        $config['per_page']  = $resp['per_page']  = $numOfRec;
        $config['num_links'] = 4;
        if (empty($page_number)) {
            $page_number = 1;
        }

        $offset                         = ($page_number - 1) * $config['per_page'];
        $resp['offset']                 = $offset;
        $config['use_page_numbers']     = true;
        $config['page_query_string']    = true;
        $config['query_string_segment'] = 'page';
        $config['total_rows']           = $totalRec;
        $page_url                       = $page_url . '/' . $page_number;
        $config['full_tag_open']        = '<div><nav><ul class="pagination pagination-sm pagination-colory">';
        $config['full_tag_close']       = '</ul></nav></div>';
        $config['prev_link']            = '&lt;';
        $config['prev_tag_open']        = '<li>';
        $config['prev_tag_close']       = '</li>';
        $config['next_link']            = '&gt;';
        $config['next_tag_open']        = '<li>';
        $config['next_tag_close']       = '</li>';
        $config['cur_tag_open']         = '<li class="active"><a href="' . $page_url . '">';
        $config['cur_tag_close']        = '</a></li>';
        $config['num_tag_open']         = '<li>';
        $config['num_tag_close']        = '</li>';
        $config['first_tag_open']       = '<li>';
        $config['first_tag_close']      = '</li>';
        $config['last_tag_open']        = '<li>';
        $config['last_tag_close']       = '</li>';
        $config['first_link']           = '&lt;&lt;';
        $config['last_link']            = '&gt;&gt;';
        $this->pagination->cur_page     = $offset;
        $this->pagination->initialize($config);
        $config['page_links'] = $this->pagination->create_links();
        $resp['page_links']   = $config['page_links'];
        return $resp;
    }

    public function verify($id)
    {
        if (isset($id) != '') {
            $id         = base64_decode($id);
            $array_data = array("user_verification" => '1');
            $array_cond = array("id" => $id);
            $verify     = $this->master_model->updateRecord(USERS_TABLE, $array_data, $array_cond);

            $data['error'] = '';
            if ($verify == true) {
                $this->session->set_flashdata('success', 'User Verification Successful');
                redirect(base_url() . ADMIN_CTRL . '/user');
            } else {
                $this->session->set_flashdata('danger', 'Error while Verify Record');
                redirect(base_url() . ADMIN_CTRL . '/user');
            }

        } else {
            redirect(base_url() . ADMIN_CTRL . '/user');
        }
    }

    public function unblock($id)
    {
        if (isset($id) != '') {
            $id         = base64_decode($id);
            $array_data = array("active" => '1');
            $array_cond = array("id" => $id);
            $block      = $this->master_model->updateRecord(USERS_TABLE, $array_data, $array_cond);

            $data['error'] = '';
            if ($block == true) {
                $this->session->set_flashdata('success', 'User Unblock Successfully');
                redirect(base_url() . ADMIN_CTRL . '/user');
            } else {
                $this->session->set_flashdata('danger', 'Error while Unblocking record');
                redirect(base_url() . ADMIN_CTRL . '/user');
            }

        } else {
            redirect(base_url() . ADMIN_CTRL . '/user');
        }
    }

    public function unblock_page($id)
    {
        if (isset($id) != '') {
            $id            = base64_decode($id);
            $array_data    = array("active" => '1');
            $array_cond    = array("id" => $id);
            $block         = $this->master_model->updateRecord(USERS_TABLE, $array_data, $array_cond);
            $data['error'] = '';
            if ($block == true) {
                $this->session->set_flashdata('success', 'User Unblock Successfully');
            } else {
                $this->session->set_flashdata('danger', 'Error while Unblocking record');
            }
            redirect(base_url() . ADMIN_CTRL . '/user/blocked_users');

        } else {
            redirect(base_url() . ADMIN_CTRL . '/user/blocked_users');
        }
    }

    public function block($id)
    {
        if (isset($id) != '') {
            $id            = base64_decode($id);
            $array_data    = array("active" => '0');
            $array_cond    = array("id" => $id);
            $block         = $this->master_model->updateRecord(USERS_TABLE, $array_data, $array_cond);
            $data['error'] = '';
            if ($block == true) {
                $this->session->set_flashdata('success', 'User Block Successfully');
                redirect(base_url() . ADMIN_CTRL . '/user');
            } else {
                $this->session->set_flashdata('danger', 'Error while blocking record');
                redirect(base_url() . ADMIN_CTRL . '/user');
            }
        } else {
            redirect(base_url() . ADMIN_CTRL . '/user');
        }
    }

    public function multi_action()
    {
        if ($_POST['action'] == 'delete') {
            foreach ($_POST['chk'] as $key) {
                $delete = $this->master_model->deleteRecord(USERS_TABLE, array("id" => $key));
            }
            if ($delete == true) {
                $this->session->set_flashdata('success', ' Selected User Deleted Successfully');
                redirect(base_url() . ADMIN_CTRL . '/user');
            } else {
                $this->session->set_flashdata('danger', 'Error While Deleting Selected user. ');
                redirect(base_url() . ADMIN_CTRL . '/user');
            }
        }
        if ($_POST['action'] == 'block') {
            foreach ($_POST['chk'] as $key) {
                $id        = $key;
                $data      = array("active" => '0');
                $condition = array("id" => $id);
                $block     = $this->master_model->updateRecord(USERS_TABLE, $data, $condition);
            }
            $this->session->set_flashdata('success', ' Selected user Blocked Successfully');
            redirect(base_url() . ADMIN_CTRL . '/user');
        }
        if ($_POST['action'] == 'unblock') {
            foreach ($_POST['chk'] as $key) {
                $id        = $key;
                $data      = array("active" => '1');
                $condition = array("id" => $id);
                $block     = $this->master_model->updateRecord(USERS_TABLE, $data, $condition);
            }
            $this->session->set_flashdata('success', ' Selected user Unblocked Successfully');
            redirect(base_url() . ADMIN_CTRL . '/user');
        }
    }

    public function delete($id)
    {
        if (isset($id) != '') {
            $id            = base64_decode($id);
            $delete        = $this->master_model->deleteRecord(USERS_TABLE, array("id" => $id));
            $data['error'] = '';
            if ($delete == true) {
                $this->session->set_flashdata('success', 'Record Deleted Successfully');
            } else {
                $this->session->set_flashdata('danger', 'Error while deleteing record');
            }
            redirect(base_url() . ADMIN_CTRL . '/user');
        } else {
            redirect(base_url() . ADMIN_CTRL . '/user');
        }
    }

    public function blocked_users()
    {
        $perpage      = isset($_POST['per_page']) ? $_POST['per_page'] : 10;
        $data['page'] = (isset($_GET['page'])) ? $perpage * (($_GET['page']) - 1) : 0;
        $searchName   = $this->input->get('search_name');

        if (isset($searchName) && $searchName != '') {

            $sqlQry          = 'SELECT * FROM ' . USERS_TABLE . ' WHERE first_name like "%' . $searchName . '%" AND active="0" AND type="user" AND soft_delete= "0"';
            $data['blocked'] = $this->db->query($sqlQry)->num_rows();
        } else {
            $sqlQry          = "SELECT * FROM " . USERS_TABLE . " WHERE type='user' AND active='0' AND soft_delete='0'";
            $data['blocked'] = $this->master_model->getRecordCount(USERS_TABLE, array('active' => '0', 'type' => 'user', 'soft_delete' => '0'));
        }

        $dataCnt                           = $this->db->query($sqlQry);
        $data['total']                     = $this->master_model->getRecordCount(USERS_TABLE, array('type' => 'user', 'soft_delete' => '0'));
        $pageNum                           = $this->input->get('page');
        $pageURL                           = base_url() . ADMIN_CTRL . '/user/blocked_users?search_name=' . $searchName;
        $_pageRes                          = $this->commonPagination($pageNum, $pageURL, count($dataCnt->result_array()), 4, $perpage);
        $data['pagination']                = $_pageRes['page_links'];
        $sqlQuery                          = $sqlQry . ' LIMIT ' . $_pageRes['offset'] . ' ,' . $_pageRes['per_page'] . '';
        $dataSql                           = $this->db->query($sqlQuery);
        $data['user_registration_records'] = $dataSql->result_array();
        $data['search_name']               = isset($searchName) && $searchName != '' ? $searchName : '';
        $data['page_title']                = PROJECT_NAME . ' | Manage user';
        $data['module_name']               = 'Manage user';
        $data['content']                   = ADMIN_CTRL . '/user/blocked_users';
        $this->load->view(ADMIN_VIEW . '/template', $data);
    }

    public function getcity_records($value = '')
    {
        $data['state_id'] = $this->input->post('state_id');
        $response         = $this->master_model->getRecords(CITIES_TABLE, $data, '', array("city_id" => 'ASC'));
        echo json_encode($response);
    }
}
