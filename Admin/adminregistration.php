<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	$id=$_POST['txt_hidden'];
	$Name=$_POST["txt_Name"];
	$Email=$_POST["txt_Email"];
	$Password=$_POST["txt_Password"];
	if($id=="")
	{
		
	$insQry="insert into tbl_adminregistration(admin_name,admin_email,admin_password)values('".$Name."','".$Email."','".$Password."')";
	if($con->query($insQry))
	{
		?>
		<script>
		alert('inserted');
		window.location="adminregistration.php";
		</script>
        <?php
}
}

else{
	$updQry="update tbl_adminregistration set admin_name='".$Name."',admin_email='".$Email."',admin_password='".$Password."' where admin_id='".$id."'";
	if($con->query($updQry))
	{
	?>
	<script>
	alert('updated');
	window.location="adminregistration.php";
	</script>
    <?php
	}
}
}

if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_adminregistration where admin_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
        <script>
		alert('Deleted');
		window.location="adminregistration.php";
		</script>
        <?php
	}
}
$aid=$ais=$aie=$aip="";
if(isset($_GET['eid']))
{
	$selEdit="select * from tbl_adminregistration where admin_id='".$_GET['eid']."'";
	$resEdit=$con->query($selEdit);
	$datEdit=$resEdit->fetch_assoc();
	$ais=$datEdit['admin_name'];
	$aie=$datEdit['admin_email'];
	$aip=$datEdit['admin_password'];
	$aid=$datEdit['admin_id'];
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
      <td><label for="txt_Name"></label>
      <input type="text" name="txt_Name" id="txt_Name" value="<?php echo $ais ?>" />
      
      <input type="hidden" name="txt_hidden" id="txt_hidden" value="<?php echo $aid ?>"> </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_Email"></label>
      <input type="text" name="txt_Email" id="txt_Email" value="<?php echo $aie ?>"/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_Password"></label>
      <input type="text" name="txt_Password" id="txt_Password"  value="<?php echo $aip ?>"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<form name="form2" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Email</td>
      <td>Password</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_adminregistration";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['admin_name'] ?></td>
      <td><?php echo $data['admin_email'] ?></td>
      <td><?php echo $data['admin_password'] ?></td>
      <td><a href="adminregistration.php?delID=<?php echo $data ['admin_id']?>">Delete</a>|| <a href="adminregistration.php?eid=<?php echo $data['admin_id']?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
    
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>