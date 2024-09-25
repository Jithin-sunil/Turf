<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	$id=$_POST['txt_hidden'];
	$Content=$_POST["txt_content"];
	if ($id==""){
	$insQry="insert into tbl_feedback(feedback_content)values('".$Content."')";
	if($con->query($insQry))
	{
	?>
	<script>
	alert('inserted');
	window.location="Feedback.php";
	</script>
    <?php
	}
}
else{
	$updQry="update tbl_feedback set feedback_content='".$Content."' where feedback_id=".$id;
	if($con->query($updQry))
	{
	?>
	<script>
	alert('updated');
	window.location="Feedback.php";
	</script>
    <?php
	}
}
}
	
if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_feedback where feedback_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
        <script>
		alert('Deleted');
		window.location="Feedback.php";
		</script>
        <?php
	}
}
$fdc="";
$fid="";
if(isset($_GET['eid']))
{
	$selEdit="select * from tbl_feedback where feedback_id=".$_GET['eid'];
	$resEdit=$con->query($selEdit);
	$datEdit=$resEdit->fetch_assoc();
	$fdc=$datEdit['feedback_content'];
	$fid=$datEdit['feedback_id'];
}
?>
<form action="" method="get"></form><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="">
 
  <table width="333" border="1">
    <tr>
      <td width="185">Content</td>
      <td colspan="2"><label for="txt_content"></label>
      <input type="hidden" name="txt_hidden" id="txt_category_id"value="<?php echo $fid ?>" />     
      <textarea name="txt_content" id="txt_content" cols="45" rows="5" value="<?php echo $fdc ?>"></textarea>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>#</td>
      <td>Content</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_feedback";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td> <?php echo $i ?></td>
      <td><?php echo $data['feedback_content'] ?></td>
      <td><a href="Feedback.php?delID=<?php echo $data ['feedback_id']?>">Delete</a> || <a href="Feedback.php?eid=<?php echo $data['feedback_id']?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>