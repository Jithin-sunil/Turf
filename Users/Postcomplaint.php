 <?php

include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$id=$_POST['txt_hidden'];
	$Title=$_POST["txt_title"];
	$Content=$_POST["txt_content"];
	if($id==""){
	$insQry="insert into tbl_complaint(complaint_title,complaint_content,user_id,complaint_date,owner_id)values('".$Title."','".$Content."','".$_SESSION['uid']."',curdate(),'".$_GET["PCID"]."')";
	if($con->query($insQry))
	{
	?>
	<script>
	alert('inserted');
	window.location="Postcomplaint.php";
	</script>
    <?php
	}
}
else{
	$updQry="update tbl_complaint set complaint_title='".$Title."',complaint_content='".$content."' where complaint_id=".$id;
	if($con->query($updQry))
	{
	?>
	<script>
	alert('updated');
	window.location="Postcomplaint.php";
	</script>
    <?php
	}
}
}
if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_complaint where complaint_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
        <script>
		alert('Deleted');
		window.location="Postcomplaint.php";
		</script>
        <?php
	}
}
$cp_name="";
$cp_content="";
$cp_id="";
if(isset($_GET['eid']))
{
	$selEdit="select * from tbl_complaint where complaint_id=".$_GET['eid'];
	$resEdit=$con->query($selEdit);
	$datEdit=$resEdit->fetch_assoc();
	$district_name=$datEdit['complaint_title'];
	$dist_id=$datEdit['complaint_content'];
	$dist_id=$datEdit['complaint_id'];
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
      <td>Title</td>
      <td><label for="txt_title"></label>
      <input type="hidden" name="txt_hidden" id="txt_hidden" value="<?php echo $cp_id ?>" />
      <input type="text" name="txt_title" id="txt_title" value="<?php echo $cp_name ?>"/> </td>
    </tr>
    <tr>
      <td>Content</td>
      <td><label for="txt_content"></label>
      <textarea name="txt_content" id="txt_content" cols="45" rows="5" value="<?php echo $cp_content ?>"/></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<table width="200" border="1">
  <tr>
    <td>Sl.no</td>
    <td>Date</td>
    <td>Title</td>
    <td>Turf</td>
    <td>Content</td>
    <td>Reply</td>
    <td>Action</td>
  </tr>
  <tr>
     <?php
	$i=0;
	$sel="select * from tbl_complaint c inner join tbl_newowner h on c.owner_id=h.owner_id where user_id='".$_SESSION['uid']."' and c.owner_id!=''";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['complaint_date'] ?></td>
      <td><?php echo $data['complaint_title'] ?></td>
      <td><?php echo $data['owner_name'] ?></td>
      <td><?php echo $data['complaint_content'] ?></td>
      <td><?php echo $data['complaint_reply'] ?></td>
      <td><a href="Postcomplaint.php?delID=<?php echo $data ['complaint_id']?>">Delete</a>|| <a href="Postcomplaint.php?eid=<?php echo $data['complaint_id']?>">Edit</a></td>
  </tr>
  <?php
	}
	?>
</table>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>
