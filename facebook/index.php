<?php
//Include FB config file && User class
require_once 'fbConfig.php';

if(!$fbUser){
	$fbUser = NULL;
    $loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));
    $output = '<a href="'.$loginURL.'"><img src="images/fblogin-btn.png"></a>';
}else{
	//Get user profile data from facebook
	$fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
	

	
	//Insert or update user data to the database
	$fbUserData = array(
		'oauth_provider'=> 'facebook',
		'oauth_uid' 	=> $fbUserProfile['id'],
		'first_name' 	=> $fbUserProfile['first_name'],
		'last_name' 	=> $fbUserProfile['last_name'],
		'email' 		=> $fbUserProfile['email'],
		'gender' 		=> $fbUserProfile['gender'],
		'locale' 		=> $fbUserProfile['locale'],
		'picture' 		=> $fbUserProfile['picture']['data']['url'],
		'link' 			=> $fbUserProfile['link']
	);
}
?>

<!--View Results-->
<pre><?php var_dump($fbUserData); ?></pre>