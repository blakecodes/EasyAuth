<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = 'CLIENT_ID_HERE'; //Google client ID
$clientSecret = 'CLIENT_SECRET_HERE'; //Google client secret
$redirectURL = 'REDIRECT_URL_HERE'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to YOURSITE');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>