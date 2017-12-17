<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// if (!function_exists('get_site_status')) {

//     function get_site_status()
//     {
//         $CI = &get_instance();

//         $CI->db->select('site_status');
//         $result = $CI->db->get_where(ACCOUNT_SETTING_TABLE, array('site_status' => '1'))->result_array();
//         return $result;
//     }
// }

/**
 * Before login session check admin
 */

if (!function_exists('session_check_login')) {

    function session_check_login()
    {
        $CI = &get_instance();
// dd($CI->session->userdata());
        if ($CI->ion_auth->logged_in() && $CI->ion_auth->is_admin()) {
            $user = $CI->ion_auth->user()->row();
            if (!empty($user)) {

                redirect(base_url() . ADMIN_CTRL . '/dashboard');
            }
        }
    }
}

/**
 * After login session check for admin
 */

if (!function_exists('session_check')) {

    function session_check()
    {
        $CI = &get_instance();

        if (!$CI->ion_auth->logged_in()) {

            $CI->session->set_flashdata('info', 'Please login first');
            redirect(base_url() . ADMIN_CTRL . '/login');
        } elseif (!$CI->ion_auth->is_admin()) {

            $CI->ion_auth->logout();
            $CI->session->set_flashdata('info', 'You must be an admin to view this page');
            redirect(base_url() . ADMIN_CTRL . '/login');
        } else {

            $obj_user = $CI->ion_auth->user()->row();

            if (!empty($obj_user)) {

                $arr_user= (array) $obj_user;
                $CI->session->set_userdata('arr_user', $arr_user); 
            }
        }
    }
}

if (!function_exists('dd')) {

    function dd($value = '')
    {
        echo '<pre>';print_r($value);die();
    }
}

// if (!function_exists('user_session_check')) {

//     function user_session_check($encoded_array = "")
//     {

//         $CI = &get_instance();

//         $user_data = $CI->session->userdata('user_data');

//         $data['profile_image'] = $CI->encryption->decrypt($user_data['profile_image']) ? $CI->encryption->decrypt($user_data['profile_image']) : '';
//         $data['user_id']       = $CI->encryption->decrypt($user_data['user_id']);
//         $data['user_email']    = $CI->encryption->decrypt($user_data['user_email']);
//         $data['user_type']     = $CI->encryption->decrypt($user_data['user_type']);
//         $data['record']        = $CI->master_model->getRecords(USERS_TABLE, array("id" => $data['user_id']));

//         if ($data['user_type'] == 'doctor' || $data['user_type'] == 'user') {
//             return $data;
//         } else {
//             return array();
//         }

//     }
// }

// if (!function_exists('get_details')) {

//     function get_details()
//     {
//         $CI     = &get_instance();
//         $result = $CI->master_model->getRecords(ACCOUNT_SETTING_TABLE);
//         return $result;
//     }
// }

// if (!function_exists('create_thumb')) {

//     function create_thumb($folder_name, $image_name, $width, $height)
//     {
//         $CI = &get_instance();

//         $image_thumb = dirname('uploads/' . $folder_name . '/' . $image_name) . '/' . base64_encode($image_name) . '_' . $width . '_' . $height . strrchr($image_name, '.');

//         if (!file_exists($image_thumb)) {
//             $config['image_library']  = 'gd2';
//             $config['source_image']   = 'uploads/pet_story_images/' . $image_name;
//             $config['new_image']      = $image_thumb;
//             $config['maintain_ratio'] = false;
//             $config['height']         = $height;
//             $config['width']          = $width;
//             $config['master_dim']     = 'auto';

//             $CI->load->library('image_lib', $config);
//             $CI->image_lib->initialize($config);
//             $CI->image_lib->resize();
//             $CI->image_lib->clear();
//         }

//         return base64_encode($image_name) . '_' . $width . '_' . $height . strrchr($image_name, '.');
//     }
// }

// if (!function_exists('resize_image')) {

//     function resize_image($folder_name, $image_name, $width, $height)
//     {
//         $CI           = &get_instance();
//         $image_thumb  = dirname('uploads/' . $folder_name . '/' . $image_name) . '/' . base64_encode($image_name) . '_' . $width . '_' . $height . strrchr($image_name, '.');
//         $source_image = 'uploads/pet_story_images/' . $image_name;

//         if (!file_exists($image_thumb)) {
//             $config['image_library']  = 'gd2';
//             $config['source_image']   = 'uploads/pet_story_images/' . $image_name;
//             $config['new_image']      = $image_thumb;
//             $config['overwrite']      = true;
//             $config['maintain_ratio'] = false;
//             $config['height']         = $height;
//             $config['width']          = $width;
//             $config['master_dim']     = 'auto';

//             $CI->load->library('image_lib', $config);
//             $CI->image_lib->initialize($config);
//             $CI->image_lib->resize();
//             $CI->image_lib->clear();
//         }

//         if (file_exists($source_image)) {
//             unlink($source_image);
//         }

//         return base64_encode($image_name) . '_' . $width . '_' . $height . strrchr($image_name, '.');
//     }
// }

if (!function_exists('commonPagination')) {

    function commonPagination($segmnetUri, $baseUrl, $totalRec, $configuri, $numOfRec = '')
    {
        $CI = &get_instance();
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
        $config['full_tag_open']        = '<ul class="pagination">';
        $config['full_tag_close']       = '</ul>';
        $config['prev_link']            = '<i class="mdi-navigation-chevron-left"></i>';
        $config['prev_tag_open']        = '<li>';
        $config['prev_tag_close']       = '</li>';
        $config['next_link']            = '<i class="mdi-navigation-chevron-right"></i>';
        $config['next_tag_open']        = '<li>';
        $config['next_tag_close']       = '</li>';
        $config['cur_tag_open']         = '<li class="active"><a href="#">';
        $config['cur_tag_close']        = '</a></li>';
        $config['num_tag_open']         = '<li>';
        $config['num_tag_close']        = '</li>';
        $config['first_tag_open']       = '<li>';
        $config['first_tag_close']      = '</li>';
        $config['last_tag_open']        = '<li>';
        $config['last_tag_close']       = '</li>';
        // $config['first_link']           = '&lt;&lt;';
        // $config['last_link']            = '&gt;&gt;';
        $CI->pagination->cur_page = $offset;
        $CI->pagination->initialize($config);
        $config['page_links'] = $CI->pagination->create_links();
        $resp['page_links']   = $config['page_links'];
        return $resp;
    }
}
