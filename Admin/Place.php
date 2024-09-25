<?php
include("../Assets/Connection/connection.php");
include('Head.php');

if(isset($_POST["btn_submit"]))
{
	$District=$_POST["sel_district"];
	$Place=$_POST["txt_place"];
	$Pincode=$_POST["txt_pincode"];
	$insQry="insert into tbl_place(place_name,place_pincode,dist_id)values('".$Place."','".$Pincode."','".$District."')";
	if($con->query($insQry))
	{
	?>
	<script>
	alert('inserted');
	window.location="Place.php";
	</script>
    <?php
	}
}
	  if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_place where place_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
        <script>
		alert('Deleted');
		window.location="Place.php";
		</script>
        <?php
	}
}
?>
 <!-- <form action="" method="get"></form><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <div align="right">
          <select name="sel_district" id="sel_district">
            <option>--select--</option>
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
         <div align="right">
            <select name="sel_district" id="sel_district">
          </select>
        </div></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place"/></td>
    </tr>
    <tr>
      <td>Pincode</td>
      <td><label for="txt_pincode"></label>
      <input type="text" name="txt_pincode" id="txt_pincode"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit"></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td>#</td>
      <td>District</td>
      <td>Place</td>
      <td>Pincode</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_place p inner join tbl_district d on p.dist_id=d.dist_id";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['dist_name'] ?></td>
      <td><?php echo $data['place_name'] ?></td>
      <td><?php echo $data['place_pincode'] ?></td>
      <td><a href="Place.php?delID=<?php echo $data ['place_id']?>">Delete</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>  -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place Management</title>
<style>
    /* body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f4f8;
        color: #333;
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: flex-start; 
        height: 100vh;
    } */

    h1 {
        text-align: center;
        font-size: 24px;
        color: #444;
        margin-bottom: 20px;
    }

    .content-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        width: 90%; /* Increased size */
        max-width: 800px; /* Increased max-width */
        display: flex;
        flex-direction: column;
        margin-top: 40px; /* Added margin for spacing */
    }

    .info-container {
        margin-bottom: 20px;
        padding: 10px;
        background-color: #e9f7fd;
        border: 1px solid #007bff;
        border-radius: 8px;
    }

    .form-container {
        margin-bottom: 20px;
        width: 100%;
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    label {
        font-size: 14px;
        font-weight: bold;
        color: #666;
    }

    .form-group {
        margin-bottom: 15px;
    }

    select, input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
        color: #333;
        box-sizing: border-box;
        transition: all 0.3s ease;
    }

    select:focus, input[type="text"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        outline: none;
    }

    .btn-container {
        text-align: center;
    }

    .btn {
        width: 45%;
        padding: 8px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
        margin: 0 10px;
        transition: background-color 0.3s ease;
    }

    .btn-submit {
        background-color: #007bff;
        color: white;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ccc;
        font-size: 14px;
        color: #333;
    }

    th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .action-links a {
        color: #007bff;
        text-decoration: none;
        margin-right: 10px;
    }

    .action-links a:hover {
        text-decoration: underline;
    }

</style>
</head>

<body>

<!-- Content Box: Combined Form and Table -->
<div class="content-container">

    <!-- Place Information Section -->
   
    <!-- Form for adding/editing places -->
    <div class="form-container">
        <form name="form1" method="post" action="">
            <div class="form-group">
                <label for="sel_district"><b>District</b></label>
                <select name="sel_district" id="sel_district">
                    <option>--select--</option>
                    <?php
                    $sel="select * from tbl_district";
                    $row=$con->query($sel);
                    while($data=$row->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $data['dist_id'] ?>"><?php echo $data['dist_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="txt_place"><b>Place</b></label>
                <input type="text" required name="txt_place" id="txt_place" placeholder="Enter place name" />
            </div>

            <div class="form-group">
                <label for="txt_pincode">Pincode</label>
                <input type="text" required name="txt_pincode" id="txt_pincode" placeholder="Enter pincode" />
            </div>

            <div class="btn-container">
                <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-submit" />
            </div>
        </form>
    </div>

    <!-- Table for viewing places -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>District</th>
                    <th>Place</th>
                    <th>Pincode</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                $sel="select * from tbl_place p inner join tbl_district d on p.dist_id=d.dist_id";
                $row=$con->query($sel);
                while($data=$row->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['dist_name'] ?></td>
                    <td><?php echo $data['place_name'] ?></td>
                    <td><?php echo $data['place_pincode'] ?></td>
                    <td class="action-links">
                        <a href="Place.php?delID=<?php echo $data['place_id'] ?>">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
<?php
include('Foot.php');
?>


