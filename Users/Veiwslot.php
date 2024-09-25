<?php
include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");
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
      <td>Start</td>
      <td>End</td>
      <td>Amount</td>
      <td>Action</td>
      
    </tr>
    <tr>
        <?php
	$i=0;
	$sel="select * from tbl_slot where owner_id=".$_GET['cid'];
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
       <td><a href="Payment.php?bookID=<?php echo $data['slot_id']?>">Book Turf</a> </td>
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
