<?php
session_start();
include("../Assets/Connection/connection.php");
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
	window.location="Editprofile.php";
	</script>
    <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $data ['owner_name'] ?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $data ['owner_email'] ?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data ['owner_contact'] ?> "/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"><?php echo $data ['owner_address'] ?> </textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_edit" id="btn_edit" value="Edit" /></td>
    </tr>
  </table>
</form>
</body>
</html>