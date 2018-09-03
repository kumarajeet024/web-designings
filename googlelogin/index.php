<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new User();
	
	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	$_SESSION['userData'] = $userData;
	
	//Render facebook profile data
    if(!empty($userData)){
        $output = '<h1>Google+ Profile Details </h1>';
        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Google';
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        $output .= '<br/>Logout from <a href="logout.php">Google</a>'; 
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login with Google</title>
<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
    
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./mystyle.css">
</head>
<body background="o-SUCCESS-facebook.jpg"><header>
  <div class="container">
    <div id="branding">
      <h1><span class="highlight">CV Builder </span>for  success destined professionals</h1>
    </div>
    <nav>
      <ul>
        <li class="current"><a href="index.html">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="login_form.php">Sign in</a></li>
      </ul>
    </nav>
  </div>
    </header>
    <section id="showcase">
      <div class="container">
        <h1>Create your professional resume in 15 minutes</h1>
        <p>My resume builder takes away all of the stress and difficulty that comes with making a resume. I created a cleanly formatted and persuasive resume that landed me more interviews, and employment soon after.</p>
         <img src="20180410_200245.png" >
      </div>

    </section>
    <section id="register">
      <div class="container">
        <h1>Login to access </h1>

        <form action="?php echo $current_file; ?" method="POST"><div class="formgroup">
          <div class="design">Username:<br>
          <input type="text" placeholder="Enter your username...." name="username"><br>
          
          Password:<br>
          <input type="password" placeholder="Enter password...." name="password"><br>
          
          <button type="submit" class="button_1">Log in</button>
           <a href="myregister.php">Don't have an account yet?<br> Create Account here!!!</a>
        </div></div>
      </form>
    </div>
          
     
    </section>
<div><?php echo $output; ?></div>
</body>
</html>

<?php

include 'dbcon.php';
include_once 'userdata.inc.php';
if(isset($_POST['username'])&& isset($_POST['password']))
  {$username=$_POST['username'];
   $password=$_POST['password'];  
   $password_hash=md5($password);
   if(!empty($username) && !empty($password))
   	{
   		$stmt=$db->prepare("SELECT * FROM my_users WHERE Username=? AND Password=?");
      $stmt->bindParam(1,$username);
      $stmt->bindParam(2,$password_hash);
      $attempt=$stmt->execute();
        if($attempt)
        {
          $query_num_rows=$stmt->rowCount();
          
        
        if ($query_num_rows==0)
             {
             	echo "Invalid Data Entered !!!";
             	echo "Please<a href='myregister.php'>Register</a>";
             }
             else if($query_num_rows==1)
             { 
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                  $uid=htmlentities($row['ID']);

             
                echo $uid;
              }
             	$_SESSION['uid']=$uid;
             	header('Location:form_pers.php');

             }
      }             
     }
     else
       	{
       		echo "Please enter all details asked here!!";
       	}
   }
 ?>




