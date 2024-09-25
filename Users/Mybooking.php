<?php
include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");

// Get the current date and time
$current_time = date('H:i:s');
$current_date = date('Y-m-d');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking View</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="600" border="1">
    <tr>
      <td>Sl.no</td>
      <td>Date</td>
      <td>Slot From</td>
      <td>Slot To</td>
      <td>Turf</td>
      <td>Status</td>
    </tr>
    <?php
    $sel = "SELECT * FROM tbl_booking b 
            INNER JOIN tbl_slot s ON b.slot_id = s.slot_id 
            INNER JOIN tbl_newowner t ON s.owner_id = t.owner_id 
            WHERE b.user_id=" . $_SESSION['uid'];
    
    $row = $con->query($sel);
    $i = 0;
    while($data = $row->fetch_assoc()) {
      $i++;
      
      
      $booking_date = $data['booking_date'];
      $slot_end = $data['slot_end'];

     
      $pay = ($current_date == $booking_date && $current_time > $slot_end) || ($current_date > $booking_date);
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $booking_date; ?></td>
        <td><?php echo $data['slot_start']; ?></td>
        <td><?php echo $slot_end; ?></td>
        <td><?php echo $data['owner_name']; ?></td>
        <td>
          <?php
          
          if($data['booking_status'] == 0 && $pay) {
              echo "Payment Pending";
              ?>
              <a href="Payment.php?pid=<?php echo $data['booking_id']; ?>">Make Payment</a>
              <?php
          } else if($data['booking_status'] == 1) {
              echo "Payment Completed";
              ?>
              <a href="Postcomplaint.php?PCID=<?php echo $data['owner_id']; ?>">Post complaint</a>
              <a href="Rating.php?pid=<?php echo $data['owner_id']; ?>">Review</a>
              <?php
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
include("Foot.php");
ob_flush();
?>
