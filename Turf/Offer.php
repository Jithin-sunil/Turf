<?php
session_start();
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	$Offer=$_POST["txt_offer"];
	$Date=$_POST["txt_date"];
	$insQry="insert into tbl_offer(offer_rate,offer_date,owner_id)values('".$Offer."','".$Date."','".$_SESSION["tid"]."')";
	if($con->query($insQry))
	{
	?>
	<script>
	alert('inserted');
	window.location="Offer.php";
	</script>
    <?php
	}
}
	  if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_offer where offer_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
        <script>
		alert('Deleted');
		window.location="Offer.php";
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
      <td>Offer</td>
      <td><label for="txt_offer"></label>
      <input type="text" name="txt_offer" id="txt_offer" /></td>
    </tr>
    <tr>
      <td>Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" min="<?php echo date('Y-m-d')?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>Sl.no</td>
      <td>Offer</td>
      <td>Date</td>
      <td>Action</td>
    </tr>
     <?php
	$i=0;
	$sel="select * from tbl_offer";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['offer_rate'] ?></td>
      <td><?php echo $data['offer_date'] ?></td>
      <td><a href="Offer.php?delID=<?php echo $data ['offer_id']?>">Delete</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>