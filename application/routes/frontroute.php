<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['login']                    = 'authentication/login';
$route['register']                 = 'authentication/register';
$route['registration']             = 'authentication/registration_process';
$route['login-process']            = 'authentication/login_process';
$route['forgot-password']          = 'authentication/forgot_password';
$route['reset-password/(:any)']    = 'authentication/reset_password/$1';
$route['activation/(:any)/(:any)'] = 'authentication/activate/$1/$2';
$route['login/(:any)']             = 'authentication/session/$1';
$route['do_request']               = 'index/do_request';
$route['do_donation']              = 'index/do_donation';
$route['donation/(:any)']          = 'index/donate_description/$1';

/**
 * After Login Routes
 **/
$route[USER . '/logout']          = 'authentication/logout';
$route[USER . '/change_password'] = USER . 'change_password';

/**
 * Admin Routes
 **/
$route[ADMIN_CTRL]                   = ADMIN_CTRL . '/login';
$route[ADMIN_CTRL . '/logout']       = ADMIN_CTRL . '/login/logout';
$route[ADMIN_CTRL . '/banner_upload'] = ADMIN_CTRL . '/dashboard/banner';
