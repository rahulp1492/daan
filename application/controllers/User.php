<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth'));
        $this->load->model('index_model');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
    }

    /**
     * My donation timeline
     */
    public function timeline($value = '')
    {
        if (!empty($this->session->userdata('user_id')) && $this->session->userdata('user_id') != '') {

            $id = $this->session->userdata('user_id');
            $user_profile = $this->master_model->getRecords(USERS_TABLE, array('id' => $id), FALSE, FALSE, FALSE, 1);
            $data['user_profile'] = !empty($user_profile[0])? $user_profile[0]:array();
// dd($data);
            $data['arr_donations'] = $this->index_model->getCards(DONATION_TABLE,
                array(
                    DONATION_TABLE . ".completed_uid" => $id,
                    DONATION_TABLE . ".status"        => 1,
                    DONATION_TABLE . ".active"        => '1',
                    // DONATION_TABLE . ".complete" => '1',
                ),
                'donation.slug,transaction.qty,donation_type.image,users.pro_img,users.first_name,users.last_name,donation.qty as goal_qty,donation.name as donation_title,donation_type.name as donation_name,donation.id as donation_id',
                array('donation.created_at' => 'ASC'),
                false,
                8);
// dd($data);
            $data['page_title'] = PROJECT_NAME . ' | My Donation Requests';
            $data['page_name']  = 'Profile Edit';
            $data['content']    = 'front/user/timeline';
            $this->load->view('front/layout/template', $data);
        } else {
            redirect('/');
        }
    }

    /**
     * My donation requests list
     */
    public function my_request($value = '')
    {
        if (!empty($this->session->userdata('user_id')) && $this->session->userdata('user_id') != '') {

            $id = $this->session->userdata('user_id');

            $data['arr_requests'] = $this->index_model->getCards(DONATION_TABLE,
                array(
                    DONATION_TABLE . ".uid"      => $id,
                    DONATION_TABLE . ".status"   => 1,
                    DONATION_TABLE . ".activate" => '1',
                    DONATION_TABLE . ".active"   => '1',
                ),
                'donation.slug,transaction.qty,donation_type.image,users.pro_img,users.first_name,users.last_name,donation.qty as goal_qty,donation.name as donation_title,donation_type.name as donation_name,donation.id as donation_id',
                array('donation.created_at' => 'ASC'),
                false,
                8);
// dd($data);
            $data['page_title'] = PROJECT_NAME . ' | My Donation Requests';
            $data['page_name']  = 'My Donation Requests';
            $data['content']    = 'front/user/my_request';
            $this->load->view('front/layout/template', $data);
        } else {
            redirect('/');
        }
    }

    /**
     * User Profile update
     */
    public function profile($value = '')
    {
        if (!empty($this->session->userdata('user_id')) && $this->session->userdata('user_id') != '') {

            $id = $this->session->userdata('user_id');

            if (isset($_POST['user_edit'])) {

                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('state', 'State', 'required|numeric');
                $this->form_validation->set_rules('city', 'City', 'required|numeric');
                $this->form_validation->set_rules('pincode', 'Pin Code', 'required|numeric');
                $this->form_validation->set_rules('user_verification', 'User verification', 'numeric');

                if ($this->form_validation->run() == true) {
                    $array_data                      = array();
                    $array_data['first_name']        = $this->input->post('first_name');
                    $array_data['last_name']         = $this->input->post('last_name');
                    $array_data['phone']             = $this->input->post('phone');
                    $array_data['address']           = $this->input->post('address');
                    $array_data['state']             = $this->input->post('state');
                    $array_data['city']              = $this->input->post('city');
                    $array_data['pincode']           = $this->input->post('pincode');
                    $array_data['user_verification'] = '2';

                    $edit_record = $this->master_model->updateRecord(USERS_TABLE, $array_data, array("id" => $id));
                    if ($edit_record == true) {
                        $this->session->set_flashdata('success', ' Profile Updated Successfully!');
                        redirect(base_url('/user/profile'));
                    } else {
                        $this->session->set_flashdata('danger', ' Error while editing profile.');
                        redirect(base_url('/user/profile'));
                    }
                }
            }

            $data['record']     = $this->master_model->getRecords(USERS_TABLE, array("id" => $id));
            $data['record']     = isset($data['record'][0]) ? $data['record'][0] : null;
            $data['page_title'] = PROJECT_NAME . ' | Profile Edit';
            $data['page_name']  = 'Profile Edit';
            $data['content']    = 'front/user/profile';
            $this->load->view('front/layout/template', $data);
        } else {
            redirect('/');
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
        redirect('login', 'refresh');
    }

    // change password
    public function change_password()
    {
        $this->form_validation->set_rules('old', 'old password', 'required');
        $this->form_validation->set_rules('new', 'new password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', 'confirm new password', 'required');

        if (!$this->ion_auth->logged_in()) {
            redirect('login', 'refresh');
        }

        $user = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == false) {
            // display the form
            // set the flash data error message if there is one
            //$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['message'] = (validation_errors()) ? $this->session->set_flashdata('danger', validation_errors()) : '';

            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->data['old_password']        = array(
                'name' => 'old',
                'id'   => 'old',
                'type' => 'password',
            );
            $this->data['new_password'] = array(
                'name'    => 'new',
                'id'      => 'new',
                'type'    => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['new_password_confirm'] = array(
                'name'    => 'new_confirm',
                'id'      => 'new_confirm',
                'type'    => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
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
        } else {
            $identity = $this->session->userdata('identity');

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change) {
                //if the password was successfully changed
                $this->session->set_flashdata('success', $this->ion_auth->messages());
                $this->logout();
            } else {
                $this->session->set_flashdata('danger', $this->ion_auth->errors());
                redirect('user/change_password', 'refresh');
            }
        }
    }

    public function _render_page($view, $data = null, $returnhtml = false) //I think this makes more sense

    {

        $this->viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) {
            return $view_html;
        }
//This will return html on 3rd argument being true
    }
}
