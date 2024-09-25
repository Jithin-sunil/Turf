 <?php
session_start();
include("../Assets/Connection/connection.php");
ob_start();
include("Header.php");
if(isset($_POST["btn_submit"]))
{
	
	$Start_time=$_POST["txt_start"];
	$End_time=$_POST['txt_end'];
	$Amount=$_POST['txt_amount'];
	$insQry="insert into tbl_slot(slot_start,slot_end,slot_amount,owner_id)values('".$Start_time."','".$End_time."','".$Amount."','".$_SESSION['tid']."')";
	if($con->query($insQry))
	{
	?>
	<script>
	alert('inserted');
	window.location="Timeslot.php";
	</script>
    <?php
	}
}
if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_slot where slot_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
        <script>
		alert('Deleted');
		window.location="Timeslot.php";
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
      <td>Start time</td>
      <td align="center"><label for="txt_start"></label>
        <label for="sel_start"></label>
        <div align="right">
          <label for="txt_start2"></label>
          <input type="time" name="txt_start" id="txt_start2" />
      </div></td>
    </tr>
    <tr>
      <td>End time</td>
      <td><label for="sel_end"></label>
        <div align="right">
          <label for="txt_end"></label>
          <input type="time" name="txt_end" id="txt_end" />
      </div></td>
    </tr>
    <tr>
      <td>Amount</td>
      <td><label for="txt_amount"></label>
      <input type="text" name="txt_amount" id="txt_amount"  /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>Sl.no</td>
      <td>Start</td>
      <td>End</td>
      <td>Amount</td>
      <td>Action</td>
    </tr>
    <tr>
        <?php
	$i=0;
	$sel="select * from tbl_slot";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['slot_start'] ?></td>
      <td><?php echo $data['slot_end'] ?></td>
      <td><?php echo $data['slot_amount'] ?></td>
      <td><a href="Timeslot.php?delID=<?php echo $data ['slot_id']?>">Delete</a>
    </tr>
    <?php
	}
		?>
  </table>
</form>
</body>
</html>
<?php
include("Footer.php");
ob_flush();
?>