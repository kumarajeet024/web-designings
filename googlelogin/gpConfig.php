 <?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '830767982236-19024brtjqr18niqplu5v7bmfih4ge3f.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'ZdyziTHdFw2gPPyZg2f7H-gj'; //Google client secret
$redirectURL = 'http://localhost/googlelogin'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>