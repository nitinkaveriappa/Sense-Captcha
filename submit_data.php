<?php
session_start();
$current_id = session_id();
if (!isset($_SESSION['created']))
{
  $_SESSION['created'] = time();
}
$idle = time() - $_SESSION['created'];

//Verifies form, directs to success or survey page
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//Verifies Name is in valid format
	if(isset($_POST['Name']) && preg_match("/^[a-zA-Z0-9.' ]+$/",$_POST['Name'])  && strlen($_POST['Name']) < 35)
	{
		$name = $_POST['Name'];
	}
	else
	{
		header("Location:index.php?type=err");
	}
	//Verifies Email is in valid format
	if(isset($_POST['Email']) && preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,4}$/',$_POST['Email'])  && strlen($_POST['Email']) < 50)
	{
		$email = $_POST['Email'];
	}
	else
	{
		header("Location:index.php?type=err");
	}
  //Verifies Password is in valid format
  if(isset($_POST['Password']) && preg_match('/^[a-zA-Z0-9._%+!$@ ]+$/',$_POST['Password']) && strlen($_POST['Password']) < 30)
	{
		$password = $_POST['Password'];
	}
	else
	{
		header("Location:index.php?type=err");
	}


	if(isset($_POST['Sense-result']))
	{
		$result = $_POST['Sense-result'];
	}
	else
	{
		header("Location:index.php?type=bot");
	}

	$success=file_get_contents("https://nitinkaveriappa.pro/SenseCaptcha/result/$result");
	//If its a bot it redirects to index
	if($success!="true")
     {
       header("Location:index.php?type=bot");
     }
	//If not a bot 	then tries to login in player
	else {
	$_SESSION['name'] = $name;
	$_SESSION['email'] = $email;
	
	file_put_contents("users/user_data.txt","$name | $email | $password \n", FILE_APPEND);
	
	header("Location:thank_you.php");
  }
}
else
{
	header("Location:index.php?type=err");
}

if ($idle > 180)
{
	session_regenerate_id();
  // Unset all of the session variables
  $_SESSION = array();
  // Delete the session cookie
	if (ini_get("session.use_cookies"))
	{
    	$params = session_get_cookie_params();
    	setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
	}
}

?>
