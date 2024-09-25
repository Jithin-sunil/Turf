<?php
session_start();
include("../Assets/Connection/connection.php");
ob_start();
include("Header.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View User Booking</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="600" border="1">
    <tr>
      <td>Sl.no</td>
      <td>Date</td>
      <td>Slot From</td>
      <td>Slot To</td>
      <td>User</td>
      <td>Contact</td>
      <td>Status</td>
    </tr>

    <?php
    $i = 0;
    
    $sel = "SELECT * FROM tbl_booking b 
            INNER JOIN tbl_slot s ON s.slot_id = b.slot_id 
            INNER JOIN tbl_newowner o ON o.owner_id = s.owner_id 
            INNER JOIN tbl_newuser c ON c.user_id = b.user_id 
            WHERE o.owner_id = '" . $_SESSION['tid'] . "'";
    
    $row = $con->query($sel);
    while ($data = $row->fetch_assoc()) {
      $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['booking_date']; ?></td>
        <td><?php echo $data['slot_start']; ?></td>
        <td><?php echo $data['slot_end']; ?></td>
        <td><?php echo $data['user_name']; ?></td>
        <td><?php echo $data['user_contact']; ?></td>
        <td>
          <?php
         
          if ($data['booking_status'] == 0) {
              echo "Payment Pending";
          } else if ($data['booking_status'] == 1) {
              echo "Payment Completed";
          }
          ?>
        </td>
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
