<?php
include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");
$sel="select *from tbl_newuser u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.dist_id=d.dist_id where u.user_id='".$_SESSION['uid']."'";
$row=$con->query($sel);
$data=$row->fetch_assoc();
?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="464" border="1">
    <tr>
      <td colspan="2"><img src="../Assets/File/User/<?php echo $data ['user_photo']?>" width="150" height="150"/></td>
    </tr>
    <tr>
      <td width="175">Name</td>
      <td width="273"><?php echo $data ['user_name'] ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data ['user_email']?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['user_contact']?></td>
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
// include("Foot.php");
// ob_flush();
?> -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>My Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212; /* Dark black background */
            display: flex;
            justify-content: center;
            padding: 50px 20px;
            margin: 0;
        }

        .profile-container {
            background-color: #1c1c1c; /* Dark grey form background */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6); /* Deep shadow */
            width: 600px;
            max-width: 100%;
            color: #ddd; /* Light grey text color */
        }

        .profile-container h2 {
            text-align: center;
            color: #fff; /* White text color */
            margin-bottom: 20px;
        }

        .profile-container img {
            display: block;
            margin: 0 auto 20px auto;
            border-radius: 75px; /* Circular image */
        }

        .profile-container table {
            width: 100%;
            margin-bottom: 20px;
        }

        .profile-container td {
            padding: 10px;
        }

        .profile-container a {
            color: #4CAF50; /* Green color for links */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .profile-container a:hover {
            color: #45a049; /* Darker green on hover */
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <h2>My Profile</h2>
        <form id="form1" name="form1" method="post" action="">
            <img src="../Assets/File/User/<?php echo $data['user_photo']?>" width="150" height="150"/>
            <table border="0">
                <tr>
                    <td>Name</td>
                    <td><?php echo $data['user_name'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $data['user_email']?></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><?php echo $data['user_contact']?></td>
                </tr>
                <tr>
                    <td>District</td>
                    <td><?php echo $data['dist_name']?></td>
                </tr>
                <tr>
                    <td>Place</td>
                    <td><?php echo $data['place_name']?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div>
                            <a href="Editprofile.php">Edit Profile</a> || <a href="Changepass.php">Change Password</a>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>

