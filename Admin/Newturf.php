<?php
include("../Assets/Connection/connection.php");
include('Head.php');
if(isset($_GET["acID"]))
{
	$upQry="update  tbl_newowner set owner_status='1' where owner_id='".$_GET["acID"]."'";
	if($con->query($upQry))
	{
		?>
        <script>
		alert('Accepted');
		window.location="Newturf.php";
		</script>
                <?php
	}
}
		
		
if(isset($_GET["RejID"]))
{
	 $upQry="update  tbl_newowner set owner_status='2' where owner_id='".$_GET["RejID"]."'";
	if($con->query($upQry))
	{
		?>
        <script>
		alert('Rejected');
		window.location="Newturf.php";
		</script>
        <?php
	}
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Turf Management</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
        }
        .content-container {
            margin: 20px auto;
            max-width: 1200px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            margin-bottom: 40px;
        }
        thead {
            background-color: #007bff;
            color: white;
        }
        .table-heading {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tbody tr:nth-child(odd) {
            background-color: #e9f7fe;
        }
        .action-links a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        td img {
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="content-container">
    <!-- New Turf Requests Section -->
    <h3>New Turf Requests</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sl.no</th>
                <th>Turf</th>
                <th>Contact</th>
                <th>District</th>
                <th>Place</th>
                <th>Photo</th>
                <th>Address</th>
                <th>Proof</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $sel = "SELECT * FROM tbl_newowner p 
                    INNER JOIN tbl_place c ON p.place_id=c.place_id 
                    INNER JOIN tbl_district d ON c.dist_id=d.dist_id 
                    WHERE p.owner_status='0'";
            $row = $con->query($sel);
            while($data = $row->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['owner_name'] ?></td>
                <td><?php echo $data['owner_contact'] ?></td>
                <td><?php echo $data['dist_name'] ?></td>
                <td><?php echo $data['place_name'] ?></td>
                <td><img src="../Assets/File/Owner/<?php echo $data['owner_photo'] ?>" width="50" height="50" /></td>
                <td><?php echo $data['owner_address'] ?></td>
                <td><img src="../Assets/File/Owner/<?php echo $data['owner_proof'] ?>" width="50" height="50" /></td>
                <td class="action-links">
                    <a href="Newturf.php?acID=<?php echo $data['owner_id'] ?>">Accept</a>
                    <a href="Newturf.php?rejID=<?php echo $data['owner_id'] ?>">Reject</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <!-- Accepted and Rejected List Section -->
    <h3>Accepted & Rejected Turf List</h3>
    
    <!-- Accepted Turf Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sl.no</th>
                <th>Turf</th>
                <th>Contact</th>
                <th>District</th>
                <th>Place</th>
                <th>Photo</th>
                <th>Address</th>
                <th>Proof</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="9" class="table-heading">Accepted List</td>
            </tr>
            <?php
            $i = 0;
            $sel = "SELECT * FROM tbl_newowner p 
                    INNER JOIN tbl_place c ON p.place_id=c.place_id 
                    INNER JOIN tbl_district d ON c.dist_id=d.dist_id 
                    WHERE p.owner_status='1'";
            $row = $con->query($sel);
            while($data = $row->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['owner_name'] ?></td>
                <td><?php echo $data['owner_contact'] ?></td>
                <td><?php echo $data['dist_name'] ?></td>
                <td><?php echo $data['place_name'] ?></td>
                <td><img src="../Assets/File/Owner/<?php echo $data['owner_photo'] ?>" width="50" height="50" /></td>
                <td><?php echo $data['owner_address'] ?></td>
                <td><img src="../Assets/File/Owner/<?php echo $data['owner_proof'] ?>" width="50" height="50" /></td>
                <td class="action-links">
                    <a href="Newturf.php?RejID=<?php echo $data['owner_id'] ?>">Reject</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <!-- Rejected Turf Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sl.no</th>
                <th>Turf</th>
                <th>Contact</th>
                <th>District</th>
                <th>Place</th>
                <th>Photo</th>
                <th>Address</th>
                <th>Proof</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="9" class="table-heading">Rejected List</td>
            </tr>
            <?php
            $i = 0;
            $sel = "SELECT * FROM tbl_newowner p 
                    INNER JOIN tbl_place c ON p.place_id=c.place_id 
                    INNER JOIN tbl_district d ON c.dist_id=d.dist_id 
                    WHERE p.owner_status='2'";
            $row = $con->query($sel);
            while($data = $row->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['owner_name'] ?></td>
                <td><?php echo $data['owner_contact'] ?></td>
                <td><?php echo $data['dist_name'] ?></td>
                <td><?php echo $data['place_name'] ?></td>
                <td><img src="../Assets/File/Owner/<?php echo $data['owner_photo'] ?>" width="50" height="50" /></td>
                <td><?php echo $data['owner_address'] ?></td>
                <td><img src="../Assets/File/Owner/<?php echo $data['owner_proof'] ?>" width="50" height="50" /></td>
                <td class="action-links">
                    <a href="Newturf.php?acID=<?php echo $data['owner_id'] ?>">Accept</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
include('Foot.php');
?>




 
