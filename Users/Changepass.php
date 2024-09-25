<?php
include("../Assets/Connection/connection.php");
// ob_start();
// include("Head.php");
if(isset($_POST["btn_cpwd"]))
{
	$user="select *from tbl_newuser where user_id='".$_SESSION['uid']."'";
$row=$con->query($user);
$data=$row->fetch_assoc();
$dbpass=$data['user_password'];
$oldpass=$_POST['txt_pwd'];
$newpass=$_POST['txt_npwd'];
$repass=$_POST['txt_rpwd'];
if($dbpass==$oldpass)
{
	if($newpass==$repass)
	{
		$updQry="update tbl_newuser set user_password='".$newpass."' where  user_id='".$_SESSION['uid']."'";
	if($con->query($updQry))
{
?>
<script>
alert("password changed");
	window.location="Myprofile.php";
	</script>
    <?php
	}
	else
	{
	?>
	<script>
    alert("Error");
	</script>
    <?php
	}
}
else
{
	?>
	<script>
    alert("Missmatch");
	</script>
    <?php
}
}
	else
{
	?>
	<script>
    alert("Incorrect");
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
      <td>Old password</td>
      <td><label for="txt_pwd"></label>
      <input type="text" name="txt_pwd" id="txt_pwd" /></td>
    </tr>
    <tr>
      <td>New password</td>
      <td><label for="txt_npwd"></label>
      <input type="text" name="txt_npwd" id="txt_npwd" /></td>
    </tr>
    <tr>
      <td>Re-type password</td>
      <td><label for="txt_rpwd"></label>
      <input type="text" name="txt_rpwd" id="txt_rpwd" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_cpwd" id="btn_cpwd" value="Change password" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
 <?php
// include("Foot.php");
// ob_flush();
?> --> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Change Password</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212; /* Dark black background */
            display: flex;
            justify-content: center;
            padding: 50px 20px;
            margin: 0;
        }

        .change-password-form {
            background-color: #1c1c1c; /* Dark grey form background */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6); /* Deep shadow */
            width: 600px;
            max-width: 100%;
            margin: 50px 0;
        }

        .change-password-form h2 {
            text-align: center;
            color: #fff; /* White text color */
            margin-bottom: 20px;
        }

        .change-password-form table {
            width: 100%;
            color: #ddd; /* Light grey for text */
        }

        .change-password-form td {
            padding: 10px;
        }

        .change-password-form input {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            border: 1px solid #444; /* Darker grey border */
            background-color: #333; /* Dark grey input background */
            color: #fff; /* White text color */
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .change-password-form input:hover {
            border-color: #4CAF50; /* Green hover effect */
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.3);
        }

        .change-password-form input:focus {
            border-color: #4CAF50; /* Green border on focus */
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.5);
            outline: none;
        }

        .change-password-form .btn-container {
            text-align: center;
        }

        #btn_cpwd {
            width: 45%;
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #btn_cpwd:hover {
            background-color: #45a049;
        }

        #btn_cancel {
            width: 45%;
            background-color: #f44336;
            color: white;
            padding: 12px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #btn_cancel:hover {
            background-color: #e53935;
        }

        @media (max-width: 768px) {
            .change-password-form {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="change-password-form">
        <h2>Change Password</h2>
        <form id="form1" name="form1" method="post" action="">
            <table border="0">
                <tr>
                    <td>Old Password</td>
                    <td><input type="password" name="txt_pwd" id="txt_pwd" required /></td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td><input type="password" name="txt_npwd" id="txt_npwd" required /></td>
                </tr>
                <tr>
                    <td>Re-type Password</td>
                    <td><input type="password" name="txt_rpwd" id="txt_rpwd" required /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="btn-container">
                            <input type="submit" name="btn_cpwd" id="btn_cpwd" value="Change Password" />
                            <input type="button" name="btn_cancel" id="btn_cancel" value="Cancel" onclick="window.history.back();" />
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
