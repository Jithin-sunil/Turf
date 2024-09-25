<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	$Brandname =$_POST["txt_brand"];
	$insQry="insert into tbl_brand(brand_name)values('".$Brandname."')";
	if($con->query($insQry))
	{
	?>
	<script>
	alert('inserted');
	window.location="brand.php";
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
      <td>Brandname</td>
      <td><label for="txt_brand"></label>
      <input type="text" name="txt_brand" id="txt_brand" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td>#</td>
      <td>Brandname</td>
      <td>Action</td>
    </tr>
     <?php
	$i=0;
	$sel="select * from tbl_brand";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['brand_name'] ?></td>
      <td>&nbsp;</td>
    </tr>
    <?php
	}
	?>
  </table>
 
</form>
</body>
</html>