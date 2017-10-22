<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login']    				= 'authentication/login';
$route['register'] 				= 'authentication/register';
$route['registration'] 			= 'authentication/registration_process';
$route['login-process'] 		= 'authentication/login_process';
$route['forgot-password'] 		= 'authentication/forgot_password';
$route['reset-password/(:any)'] = 'authentication/reset_password/$1';
$route['activation/(:any)/(:any)'] = 'authentication/activate/$1/$2';

/**
 * After Login Routes
 **/
$route[USER.'/logout'] 				= 'user/logout';
$route[USER.'/change_password'] 	= 'user/change_password';
