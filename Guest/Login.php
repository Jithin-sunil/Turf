<?php
session_start();
include('../Assets/Connection/connection.php');
if(isset($_POST["btn_login"]))
{
	$Email=$_POST["txt_email"];
	$Password=$_POST["txt_pwd"];
	 $user="select * from tbl_newuser where user_email='".$Email."' and user_password='".$Password."'";
	$rowuser=$con->query($user);
	
	$admin="select * from tbl_adminregistration where admin_email='".$Email."' and admin_password='".$Password."'";
		$rowadmin=$con->query($admin);
	$turf="select * from tbl_newowner where owner_email='".$Email."'and owner_password='".$Password."'";
		$rowturf=$con->query($turf);
		
		
		
    if($datauser=$rowuser->fetch_assoc())
	{
		$_SESSION['uid']=$datauser['user_id'];
		$_SESSION['uname']=$datauser['user_name'];
		header('location:../Users/Homepage.php');
	}
	else if($dataadmin=$rowadmin->fetch_assoc())
	{
		$_SESSION['aid']=$dataadmin['admin_id'];
		header('location:../Admin/Homepage.php');
	}
	else if($dataowner=$rowturf->fetch_assoc())
	{
		$_SESSION['tid']=$dataowner['owner_id'];
		$_SESSION['tname']=$dataowner['owner_name'];
		header('location:../Turf/Homepage.php');
	}
	else
	{
       ?>
       <script>
	   alert("invalid");
	   window.location="login.php";
	   </script>
	   <?php
	}
}
?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pwd"></label>
      <input type="text" name="txt_pwd" id="txt_pwd" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_login" id="btn_login" value="Login
     " /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="Newuser.php">Newuser</a></td>
    </tr>
  </table>
</form>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>

  <style media="screen">
    * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #1c1c1e;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-image: url('image/your-background-image.jpg'); /* Replace with your background */
      background-size: cover;
      background-position: center;
    }

    .login-container {
      background-color: rgba(0, 0, 0, 0.8);
      padding: 40px;
      border-radius: 15px;
      width: 350px;
      text-align: center;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
    }

    h1 {
      color: white;
      font-size: 24px;
      margin-bottom: 30px;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      color: white;
      font-size: 14px;
      text-align: left;
      margin-bottom: 8px;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #2d2d2d;
      color: white;
      font-size: 14px;
    }

    .input-group input::placeholder {
      color: #888;
    }

    .forgot-password {
      text-align: right;
      margin-bottom: 20px;
    }

    .forgot-password a {
      color: #bbb;
      font-size: 12px;
      text-decoration: none;
    }

    .forgot-password a:hover {
      text-decoration: underline;
    }

    .btn-login {
      width: 100%;
      padding: 12px;
      border: none;
      background-color: #32CD32; /* Light green color */
      color: white;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .btn-login:hover {
      background-color: #28a428; /* Slightly darker green on hover */
    }

    .login-with {
      margin-top: 20px;
      color: #bbb;
      font-size: 12px;
    }

    .social-icons {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin: 10px 0;
    }

    .social-icons img {
      width: 30px;
      height: 30px;
      cursor: pointer;
    }

    .signup-link {
      margin-top: 20px;
      font-size: 12px;
      color: #bbb;
    }

    .signup-link a {
      color: #6e57e0;
      text-decoration: none;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <div class="login-container">
    <h1>LOGIN</h1>

    <form id="form1" name="form1" method="post" action="">
      <div class="input-group">
        <label for="txt_email">Username</label>
        <input type="text" name="txt_email" id="txt_email" placeholder="Enter your username" />
      </div>
      <div class="input-group">
        <label for="txt_pwd">Password</label>
        <input type="password" name="txt_pwd" id="txt_pwd" placeholder="Enter your password" />
      </div>

      <div class="forgot-password">
        <a href="ForgotPass.php">Forgot password?</a>
      </div>

      <input type="submit" name="btn_login" id="btn_login" class="btn-login" value="Login"/>

      <div class="signup-link">
         <a href="Newowner.php">Turf</a> / <a href="Newuser.php">New user</a>
      </div>
    </form>
  </div>

</body>

</html>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>

  <style media="screen">
    * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
    }

    body {
      font-family: Arial, sans-serif;
      height: 100vh;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: url('Assets/Templates/Main/images/bg_1.jpg'); /* Replace with your background image */
      background-size: cover;
      background-position: center;
      position: relative;
    }

    /* Overlay */
    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.6); /* Dark overlay with 60% opacity */
      z-index: 0; /* Stays behind the form */
    }

    .login-container {
      position: relative;
      background-color: rgba(0, 0, 0, 0.8);
      padding: 40px;
      border-radius: 15px;
      width: 350px;
      text-align: center;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
      z-index: 1; /* Sits on top of the overlay */
    }

    h1 {
      color: white;
      font-size: 24px;
      margin-bottom: 30px;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      color: white;
      font-size: 14px;
      text-align: left;
      margin-bottom: 8px;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #2d2d2d;
      color: white;
      font-size: 14px;
    }

    .input-group input::placeholder {
      color: #888;
    }

    .forgot-password {
      text-align: right;
      margin-bottom: 20px;
    }

    .forgot-password a {
      color: #bbb;
      font-size: 12px;
      text-decoration: none;
    }

    .forgot-password a:hover {
      text-decoration: underline;
    }

    .btn-login {
      width: 100%;
      padding: 12px;
      border: none;
      background-color: #6e57e0;
      color: white;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .btn-login:hover {
      background-color: #5a45b8;
    }

    .login-with {
      margin-top: 20px;
      color: #bbb;
      font-size: 12px;
    }

    .social-icons {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin: 10px 0;
    }

    .social-icons img {
      width: 30px;
      height: 30px;
      cursor: pointer;
    }

    .signup-link {
      margin-top: 20px;
      font-size: 12px;
      color: #bbb;
    }

    .signup-link a {
      color: #6e57e0;
      text-decoration: none;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <div class="login-container">
    <h1>LOGIN</h1>

    <form id="form1" name="form1" method="post" action="">
      <div class="input-group">
        <label for="txt_email">Username</label>
        <input type="text" name="txt_email" id="txt_email" placeholder="Enter your username" />
      </div>
      <div class="input-group">
        <label for="txt_pwd">Password</label>
        <input type="password" name="txt_pwd" id="txt_pwd" placeholder="Enter your password" />
      </div>

      <div class="forgot-password">
        <a href="#">Forgot password?</a>
      </div>

      <button type="submit" class="btn-login">Sign in</button>

      <div class="signup-link">
        Don't have an account? <a href="#">Sign up</a>
      </div>
    </form>
  </div>

</body>

</html>
 -->
