<?php
include('../Connection/connection.php');
$sel="select * from tbl_slot where  slot_id='".$_GET['sid']."'";
$row=$con->query($sel);
$data=$row->fetch_assoc();

echo $data['slot_amount'];

?>