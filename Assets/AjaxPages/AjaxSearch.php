<?php
include("../Connection/connection.php");
?>


<table width="200" border="1">
  <tr>
      <td>Sl.no</td>
      <td>Turf</td>
      <td>Contact</td>
      <td>District</td>
      <td>Place</td>
      <td>Photo</td>
      <td>Address</td>
      <td>Proof</td>
      <td>Time slot</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_newowner p inner join tbl_place c on p.place_id=c.place_id inner join  tbl_district d on c.dist_id=d.dist_id where p.owner_status='1' and c.place_id = ".$_GET['pid'];
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
      <td> <img src="../Assets/File/Owner/<?php echo $data['owner_proof'] ?>"width="50" height="50"/><?php echo $data['owner_proof'] ?></td>
      <td><a href="Veiwslot.php?cid=<?php echo $data ['owner_id']?>" >Book Time</a></td>
       
    </tr>
    <?php
	}
	?>
    </table>