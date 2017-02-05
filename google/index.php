<?php
//Include GP config file && User class
include_once 'gpConfig.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    /*Get User Data*/
	$gpUserProfile = $google_oauthV2->userinfo->get();

	/*Return the data*/
	var_dump($gpUserProfile);
} else {
    /*Retrieve an authorization URL*/
	$authUrl = $gClient->createAuthUrl();
	$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
}
?>
