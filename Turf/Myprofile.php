<?php
session_start();
include("../Assets/Connection/connection.php");
ob_start();
include("Header.php");
$sel="select *from tbl_newowner u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.dist_id=d.dist_id where u.owner_id='".$_SESSION['tid']."'";
$row=$con->query($sel);
$data=$row->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="464" border="1">
    <tr>
      <td colspan="2"><img src="../Assets/File/User/<?php echo $data ['owner_photo']?>" width="150" height="150"/></td>
    </tr>
    <tr>
      <td width="175">Name</td>
      <td width="273"><?php echo $data ['owner_name'] ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data ['owner_email']?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['owner_contact']?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $data ['dist_name']?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $data['place_name']?></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><a href="Editprofile.php">Edit profile</a>||<a href="Changepass.php">Change password</a></div></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Footer.php");
ob_flush();
?>



