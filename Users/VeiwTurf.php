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
    <td><label for="sel_district"></label>
      <select name="sel_district" id="sel_district" onChange="getPlace(this.value)">
        <option>...select...</option>
         <?php
	  $sel="select * from tbl_district";
	  
	  $row=$con->query($sel);
	  while($data=$row->fetch_assoc())
	  {
		  ?>
            <option value="<?php echo $data['dist_id'] ?>">
            <?php echo $data['dist_name']?></option>
            <?php
	  }
	  ?>
        
      </select></td>
    <td><label for="sel_place"></label>
     <select name="sel_place" id="sel_place" onchange="getTurf(this.value)">
        <option>..select..</option>
      </select></td>
  </tr>
</table>
<div id="search">
<table width="200" border="1">
  <tr>
      <td>Sl.no</td>
      <td>Turf</td>
      <td>Contact</td>
      <td>District</td>
      <td>Place</td>
      <td>Photo</td>
      <td>Address</td>
      <!-- <td>Proof</td> -->
      <td>Time slot</td>
      <!-- <td>Complaint</td> -->
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_newowner p inner join tbl_place c on p.place_id=c.place_id inner join  tbl_district d on c.dist_id=d.dist_id where p.owner_status='1'";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
<tr>

      <td><?php echo $i ?></td>
      <td><?php echo $data['owner_name'] ?></td>
      <td><?php echo $data['owner_contact'] ?></td>
      <td><?php echo $data['dist_name'] ?></td>
      <td><?php echo $data['place_name'] ?></td>
      <td><img src="../Assets/File/Owner/<?php echo $data['owner_photo'] ?>"width="50" height="50"/></td>
      <td><?php echo $data['owner_address'] ?></td>
      <!-- <td> <img src="../Assets/File/Owner/<?php echo $data['owner_proof'] ?>"width="50" height="50"/><?php echo $data['owner_proof'] ?></td> -->
      <td><a href="Veiwslot.php?cid=<?php echo $data ['owner_id']?>" >Book Time</a></td>
    
       
    </tr>
    <?php
	}
	?>
    </table>
    </div>
</body>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }



 function getTurf(pid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSearch.php?pid=" + pid,
      success: function (result) {

        $("#search").html(result);
      }
    });
  }

</script>
</html>
<?php
include("Foot.php");
ob_flush();
?>
