<?php
include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");

if (isset($_POST["btn_submit"])) {
  $Slot = $_POST["sel_slot"];
  $insQry = "INSERT INTO tbl_booking(slot_id,user_id,booking_date) VALUES ('$Slot', '".$_SESSION['uid']."', CURDATE())";

  if ($con->query($insQry)) {
    ?>
    <script>
      alert('Slot Booked');
      window.location = "Mybooking.php";
    </script>
    <?php
  }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Slot Booking</title>
</head>
<body>
  <form id="form1" name="form1" method="post" action="">
    <table width="200" border="1">
      <tr>
        <td>Slot</td>
        <td>
          <label for="sel_slot"></label>
          <select name="sel_slot" id="sel_slot" onchange="getPrice(this.value)">
            <option value="">--Select--</option>
            <?php
            
            $sel="SELECT * FROM tbl_slot";
            $res=$con->query($sel);
            while ($row = $res->fetch_assoc()) {
              $slot_id = $row['slot_id'];

              
              $today = date('Y-m-d');
              $check = "SELECT * FROM tbl_booking WHERE slot_id = '$slot_id' AND booking_date = '$today'";
              $bookingRes = $con->query($check);
              $booked = $bookingRes->num_rows > 0;
              ?>
              <option value="<?php echo $slot_id; ?>" <?php echo ($booked) ? 'disabled' : ''; ?>>
                <?php echo $row['slot_start'] . ' - ' . $row['slot_end']; ?>
                <?php echo ($booked) ? '(Already Booked)' : ''; ?>
              </option>
              <?php
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Amount</td>
        <td>
          <label for="txt_amount"></label>
          <input type="text" name="txt_amount" id="txt_amount" value="" readonly />
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="btn_book" id="btn_book" value="Submit" />
        </td>
      </tr>
    </table>
  </form>
</body>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPrice(sid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPrice.php?sid=" + sid,
      success: function (result) {
        $("#txt_amount").val(result);
      }
    });
  }
</script>
</html>
<?php
include("Foot.php");
ob_flush();
?>
