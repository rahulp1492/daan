<?php
/**
 * Facebook OAuth2 Provider
 *
 * @package    CodeIgniter/OAuth2
 * @category   Provider
 * @author     Phil Sturgeon
 * @copyright  (c) 2012 HappyNinjas Ltd
 * @license    http://philsturgeon.co.uk/code/dbad-license
 */

class OAuth2_Provider_Facebook extends OAuth2_Provider
{
	protected $scope = array('offline_access', 'email', 'read_stream');

	public function url_authorize()
	{
		return 'https://www.facebook.com/dialog/oauth';
	}

	public function url_access_token()
	{
		return 'https://graph.facebook.com/oauth/access_token';
	}

	public function get_user_info(OAuth2_Token_Access $token)
	{
		$url = 'https://graph.facebook.com/me?'.http_build_query(array(
			'access_token' => $token->access_token,
			'fields'=> 'email,first_name,last_name,link'
		));

		$user = json_decode(file_get_contents($url));
		// Create a response from the request
		//[email] => webwingt@gmail.com [first_name] => John [last_name] => Smith [link] => https://www.facebook.com/app_scoped_user_id/2156165294610151/ [id] => 2156165294610151 )
		return array(
			'uid' => $user->id,
			//'nickname' => isset($user->username) ? $user->username : null,
			'first_name' => $user->first_name,
			'last_name' => $user->last_name,
			'email' => isset($user->email) ? $user->email : null,
			//'location' => isset($user->hometown->name) ? $user->hometown->name : null,
			//'description' => isset($user->bio) ? $user->bio : null,
			'image' => 'https://graph.facebook.com/me/picture?type=normal&access_token='.$token->access_token,
			//'urls' => array('Facebook' => $user->link),
		);
	}
}
