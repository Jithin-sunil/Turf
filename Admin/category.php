<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	$id=$_POST['txt_hidden'];
	$Category=$_POST["txt_category"];
	if ($id==""){
	$insQry="insert into tbl_category(category_name)values('".$Category."')";
	if($con->query($insQry))
	{
	?>
	<script>
	alert('inserted');
	window.location="category.php";
	</script>
    <?php
	}
}
else{
	$updQry="update tbl_category set category_name='".$Category."' where category_id=".$id;
	if($con->query($updQry))
	{
	?>
	<script>
	alert('updated');
	window.location="category.php";
	</script>
    <?php
	}
}
}
	
if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_category where category_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
        <script>
		alert('Deleted');
		window.location="category.php";
		</script>
        <?php
	}
}
$category_name="";
$category_id="";
if(isset($_GET['eid']))
{
	$selEdit="select * from tbl_category where category_id=".$_GET['eid'];
	$resEdit=$con->query($selEdit);
	$datEdit=$resEdit->fetch_assoc();
	$category_name=$datEdit['category_name'];
	$category_id=$datEdit['category_id'];
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
 <input type="hidden" name="txt_hidden" id="txt_category_id"value="<?php echo $category_id ?>" /></td>

  <table width="200" border="1">
    <tr>
      <td>Category</td>
      <td><label for="txt_category"></label>
     
 <input type="text" name="txt_category" id="txt_category"value="<?php echo $category_name ?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<form id="form2" name="form2" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>#</td>
      <td>Category</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_category";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td> <?php echo $i ?></td>
      <td><?php echo $data['category_name'] ?></td>
      <td><a href="category.php?delID=<?php echo $data ['category_id']?>">Delete</a> || <a href="category.php?eid=<?php echo $data['category_id']?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>