<?php
include('Head.php');
include('../Assets/Connection/connection.php');
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
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
      <td><a href="Postcomplaint.php?delID=<?php echo $data ['complaint_id']?>">Delete</a></td>
  </tr>
  <?php
	}
	?>
</table>
</body>
</html>
<?php
include('Foot.php');
?>