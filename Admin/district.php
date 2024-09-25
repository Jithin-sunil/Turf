<?php
include("../Assets/Connection/connection.php");
include('Head.php');
if(isset($_POST["btn_submit"]))
{
	$id=$_POST['txt_hidden'];
	$district=$_POST["txt_name"];
	if($id==""){
	$insQry="insert into tbl_district(dist_name)values('".$district."')";
	if($con->query($insQry))
	{
	?>
	<script>
	alert('inserted');
	window.location="district.php";
	</script>
    <?php
	}
}
else{
	$updQry="update tbl_district set dist_name='".$district."' where dist_id=".$id;
	if($con->query($updQry))
	{
	?>
	<script>
	alert('updated');
	window.location="district.php";
	</script>
    <?php
	}
}
}
if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_district where dist_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
        <script>
		alert('Deleted');
		window.location="district.php";
		</script>
        <?php
	}
}
$district_name="";
$dist_id="";
if(isset($_GET['eid']))
{
	$selEdit="select * from tbl_district where dist_id=".$_GET['eid'];
	$resEdit=$con->query($selEdit);
	$datEdit=$resEdit->fetch_assoc();
	$district_name=$datEdit['dist_name'];
	$dist_id=$datEdit['dist_id'];
}
?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>District Name</td>
      <td><label for="txt_name"></label>
       <input type="hidden" name="txt_hidden" id="txt_hidden" value="<?php echo $dist_id ?>" />
      
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $district_name ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<form id="form2" name="form2" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>#</td>
      <td>District</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_district";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['dist_name'] ?></td>
      <td><a href="district.php?delID=<?php echo $data ['dist_id']?>">Delete</a>|| <a href="district.php?eid=<?php echo $data['dist_id']?>">Edit</a></td>
    </tr>
    <?php
	}
	?></td>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html> -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District Management</title>
<style>
     /* body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f4f8;
        color: #333;
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }  */

    h1 {
        text-align: center;
        font-size: 24px;
        color: #444;
        margin-bottom: 20px;
    }

    .content-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        width: 90%;
        max-width: 1000px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .form-container {
        margin-bottom: 30px;
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
        margin-bottom: 20px;
    }

    input[type="text"], input[type="hidden"] {
        width: 100%;
        padding: 12px;
        margin-top: 6px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
        color: #333;
        box-sizing: border-box;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        outline: none;
    }

    .btn-container {
        text-align: center;
    }

    .btn {
        width: 45%;
        padding: 10px;
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

    .btn-cancel {
        background-color: #6c757d;
        color: white;
    }

    .btn-cancel:hover {
        background-color: #5a6268;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 12px;
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
    
    <!-- Form for adding/editing districts -->
    <div class="form-container">
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txt_name">District Name</label>
                <input type="hidden" name="txt_hidden" id="txt_hidden" value="<?php echo $dist_id ?>" />
                <input type="text" required name="txt_name" id="txt_name" value="<?php echo $district_name ?>" placeholder="Enter district name" />
            </div>
            <div class="btn-container">
                <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-submit" />
                <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" class="btn btn-cancel" />
            </div>
        </form>
    </div>

    <!-- Table for viewing districts -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>District</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                $sel="select * from tbl_district";
                $row=$con->query($sel);
                while($data=$row->fetch_assoc())
                {
                  $i++;
                  ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $data['dist_name'] ?></td>
                  <td class="action-links">
                    <a href="district.php?delID=<?php echo $data['dist_id']?>">Delete</a>
                    <a href="district.php?eid=<?php echo $data['dist_id']?>">Edit</a>
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




