 <?php
include("../Assets/Connection/connection.php");
include('Head.php');

?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="200" border="1">
  <tr>
    <td>Sl.no</td>
    <td>Date</td>
    <td>Title</td>
    <td>User</td>
    <td>Content</td>
    <td>Action</td>
  </tr>
    <?php
	$i=0;
	$sel="select * from tbl_complaint c inner join tbl_newuser u on c.user_id=u.user_id";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
   
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['complaint_date'] ?></td>
    <td><?php echo $data['complaint_title'] ?></td>
    <td><?php echo $data['user_name'] ?></td>
    <td><?php echo $data['complaint_content'] ?></td>
      
    <td><a href="Reply.php?repliID=<?php echo $data['complaint_id']?>">Reply</a> 
  </tr>
  <?php
	}
	?>
</table>
</body>
</html> -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Management</title>
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
        width: 90%;
        max-width: 800px;
        margin-top: 40px;
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
    }

    .action-links a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>


<div class="content-container">
    <table>
        <tr>
            <th>Sl.no</th>
            <th>Date</th>
            <th>Title</th>
            <th>User</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
        <?php
        $i=0;
        $sel="select * from tbl_complaint c inner join tbl_newuser u on c.user_id=u.user_id";
        $row=$con->query($sel);
        while($data=$row->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data['complaint_date'] ?></td>
            <td><?php echo $data['complaint_title'] ?></td>
            <td><?php echo $data['user_name'] ?></td>
            <td><?php echo $data['complaint_content'] ?></td>
            <td class="action-links">
                <a href="Reply.php?repliID=<?php echo $data['complaint_id']?>">Reply</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>

</body>
</html>

<?php
include('Foot.php');
?>
