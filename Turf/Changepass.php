<?php
session_start();
include("../Assets/Connection/connection.php");
ob_start();
include("Header.php");
if(isset($_POST["btn_cpwd"]))
{
	$owner="select *from tbl_newowner where owner_id='".$_SESSION['tid']."'";
$row=$con->query($owner);
$data=$row->fetch_assoc();
$dbpass=$data['owner_password'];
$oldpass=$_POST['txt_pwd'];
$newpass=$_POST['txt_npwd'];
$repass=$_POST['txt_rpwd'];
if($dbpass==$oldpass)
{
	if($newpass==$repass)
	{
		$updQry="update tbl_newowner set owner_password='".$newpass."' where  owner_id='".$_SESSION['tid']."'";
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
include("Footer.php");
ob_flush();
?>