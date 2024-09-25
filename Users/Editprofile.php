<?php
include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");
$sel="select *from tbl_newuser where user_id='".$_SESSION['uid']."'";
$row=$con->query($sel);
$data=$row->fetch_assoc();
if(isset($_POST['btn_edit']))
{
	$Name=$_POST['txt_name'];
	$Email=$_POST['txt_email'];
	$Contact=$_POST['txt_contact'];
	$Address=$_POST['txt_address'];
	$updQry="update tbl_newuser set user_name='".$Name."',user_email='".$Email."',user_contact='".$Contact."',user_address='".$Address."' where user_id='".$_SESSION['uid']."'";
	if($con->query($updQry))
{
?>
<script>
alert('updated');
	window.location="Myprofile.php";
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
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $data ['user_name'] ?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $data ['user_email'] ?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data ['user_contact'] ?> "/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"><?php echo $data ['user_address'] ?> </textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_edit" id="btn_edit" value="Edit" /></td>
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
    <title>Edit Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212; /* Dark black background */
            display: flex;
            justify-content: center;
            padding: 50px 20px;
            margin: 0;
        }

        .edit-profile-form {
            background-color: #1c1c1c; /* Dark grey form background */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6); /* Deep shadow */
            width: 600px;
            max-width: 100%;
            margin: 50px 0;
        }

        .edit-profile-form h2 {
            text-align: center;
            color: #fff; /* White text color */
            margin-bottom: 20px;
        }

        .edit-profile-form table {
            width: 100%;
            color: #ddd; /* Light grey for text */
        }

        .edit-profile-form td {
            padding: 10px;
        }

        .edit-profile-form input,
        .edit-profile-form textarea {
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

        .edit-profile-form input:hover,
        .edit-profile-form textarea:hover {
            border-color: #4CAF50; /* Green hover effect */
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.3);
        }

        .edit-profile-form input:focus,
        .edit-profile-form textarea:focus {
            border-color: #4CAF50; /* Green border on focus */
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.5);
            outline: none;
        }

        .btn-container {
            text-align: center;
        }

        #btn_edit {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #btn_edit:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            .edit-profile-form {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="edit-profile-form">
        <h2>Edit Profile</h2>
        <form id="form1" name="form1" method="post" action="">
            <table border="0">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="txt_name" id="txt_name" value="<?php echo $data['user_name']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="txt_email" id="txt_email" value="<?php echo $data['user_email']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>
                        <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data['user_contact']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <textarea name="txt_address" id="txt_address" cols="45" rows="5"><?php echo $data['user_address']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="btn-container">
                            <input type="submit" name="btn_edit" id="btn_edit" value="Edit" />
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>
