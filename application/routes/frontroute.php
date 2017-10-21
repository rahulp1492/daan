<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login']    			= 'authentication/login';
$route['register'] 			= 'authentication/register';
$route['login-process'] 	= 'authentication/login_process';
$route['forgot-password'] 	= 'authentication/forgot_password';
$route['reset-password/(:any)'] = 'authentication/reset_password/$1';

/**
 * After Login Routes
 **/
$route[USER.'/logout'] 				= 'user/logout';
$route[USER.'/change_password'] 	= 'user/change_password';
