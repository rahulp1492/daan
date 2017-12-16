<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_check();
    }

    public function index()
    {
        $data['page_title'] = "Dashboard";
        $data['content']    = "admin/dashboard";
        $this->load->view('admin/template', $data);
    }

    public function banner($value = '')
    {
        $data['arr_banner'] = $this->master_model->getRecords('account_setting');
        $data['arr_banner'] = isset($data['arr_banner'][0]) ? $data['arr_banner'][0] : array();

        $data['module_name']= 'Banner Upload';
        $data['page_title'] = PROJECT_NAME . ' | Banner Upload';
        $data['content']    = ADMIN_CTRL . '/setting/banner';
        $this->load->view(ADMIN_VIEW . '/template', $data);
    }

    public function upload_file()
    {
        $config['upload_path']   = './uploads/admin/banner/';
        $config['max_size']      = 1280 * 730;
        $config['min_size']      = 800 * 600;
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['encrypt_name']  = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (isset($_FILES['profile_img']) && !empty($_FILES['profile_img']['name'])) {
            if ($this->upload->do_upload('profile_img')) {
                $upload_data          = $this->upload->data();
                $_POST['profile_img'] = $upload_data['file_name'];
                return true;
            } else {
                $this->form_validation->set_message('upload_file', $this->upload->display_errors());
                return false;
            }
        } else {
            $this->form_validation->set_message('upload_file', 'Please select file.');
            $_POST['profile_img'] = null;
            return false;
        }
    }

    public function banner_upload($value = '')
    {
        $this->form_validation->set_rules('profile_img', 'Banner', 'callback_upload_file');

        if ($this->form_validation->run()) {

            $data['banner'] = $this->master_model->getRecords('account_setting');
            $data['banner'] = isset($data['banner'][0]) ? $data['banner'][0] : array();

            if (file_exists('./uploads/admin/banner/' . $data['banner']['banner_image'])) {
                unlink('./uploads/admin/banner/' . $data['banner']['banner_image']);
            }
            $this->master_model->updateRecord('account_setting', ['banner_image' => $this->input->post('profile_img')], ['id' => 1]);
            $this->session->set_flashdata('success', 'Banner Updated Successfully');
        }
        redirect(base_url(ADMIN_CTRL . '/dashboard/banner'));
    }
}
