<?php
include('../Assets/Connection/connection.php');
if (isset($_POST['btn_submit']))
{
	$Name=$_POST['txt_name'];
	$Address=$_POST['txt_address'];
	$Contact=$_POST["txt_contact"];
	$Email=$_POST["txt_email"];
	$Password=$_POST["txt_pwd"];
	$Conform_password=$_POST["txt_cpwd"];
	$Photo=$_FILES['file_photo']['name'];
	$path=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($path,'../Assets/File/Owner/'.$Photo);
	$Proof=$_FILES['file_proof']['name'];
	$path=$_FILES['file_proof']['tmp_name'];
	$Place=$_POST['sel_place'];
	move_uploaded_file($path,'../Assets/File/Owner/'.$Proof);
	if($Password==$Conform_password)
	{
		$insQry="insert into
tbl_newowner(owner_name,owner_address,owner_contact,owner_email,owner_password,owner_photo,owner_proof,place_id)values('".$Name."','".$Address."','".$Contact."','".$Email."','".$Password."','".$Photo."','".$Proof."','".$Place."')";
	if($con->query($insQry))
	{
		?>
		<script>
		alert('inserted');
		window.location="Newowner.php";
		</script>
        <?php
}
	
else
{
	?>
    <script>
	alert('Password mismatch');
	</script>
    <?php
}
}
}
	?>
<!-- </form><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onchange="getPlace(this.value)">
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
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place">
        <option>..select..</option>
      </select></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pwd"></label>
      <input type="password" name="txt_pwd" id="txt_pwd" /></td>
    </tr>
    <tr>
      <td>Conform password</td>
      <td><label for="txt_cpwd"></label>
      <input type="password" name="txt_cpwd" id="txt_cpwd" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="file_proof"></label>
      <input type="file" name="file_proof" id="file_proof" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
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

</script> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212; /* Dark black background */
            display: flex;
            justify-content: center;
            padding: 50px 20px;
            margin: 0;
        }

        .registration-form {
            background-color: #1c1c1c; /* Dark grey form background */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6); /* Deep shadow */
            width: 600px;
            max-width: 100%;
            margin: 50px 0;
        }

        .registration-form h2 {
            text-align: center;
            color: #fff; /* White text color for dark background */
            margin-bottom: 20px;
        }

        .registration-form label {
            font-size: 14px;
            color: #ddd; /* Light grey for labels */
            font-weight: bold;
        }

        .registration-form input,
        .registration-form select,
        .registration-form textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            border: 1px solid #444; /* Darker grey border */
            background-color: #333; /* Dark grey input background */
            color: #fff; /* White text color */
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .registration-form input[type="radio"] {
            width: auto;
            margin-right: 5px;
        }

        .registration-form textarea {
            resize: none;
        }

        .registration-form input:hover,
        .registration-form select:hover,
        .registration-form textarea:hover {
            border-color: #4CAF50; /* Green hover effect */
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.3);
        }

        .registration-form input:focus,
        .registration-form select:focus,
        .registration-form textarea:focus {
            border-color: #4CAF50; /* Green border on focus */
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.5);
            outline: none;
        }

        .registration-form .btn-container {
            text-align: center;
        }

        /* Styling the submit button */
        #btn_submit {
            width: 45%;
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #btn_submit:hover {
            background-color: #45a049;
        }

        /* Styling the cancel button */
        #btn_cancel {
            width: 45%;
            background-color: #f44336;
            color: white;
            padding: 12px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #btn_cancel:hover {
            background-color: #e53935;
        }

        @media (max-width: 768px) {
            .registration-form {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="registration-form">
        <h2> Turf Registration</h2>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <label for="sel_district">District</label>
            <select name="sel_district" id="sel_district" onchange="getPlace(this.value)">
                <option>---SELECT----</option>
                <?php
                $sel = "select * from tbl_district";
                $row = $con->query($sel);
                while ($data = $row->fetch_assoc()) {
                ?>
                <option value="<?php echo $data['dist_id'] ?>"><?php echo $data['dist_name'] ?></option>
                <?php
                }
                ?>
            </select>

            <label for="sel_place">Place</label>
            <select name="sel_place" id="sel_place">
                <option>---SELECT----</option>
            </select>

            <label for="txt_name">Name</label>
            <input type="text" name="txt_name" id="txt_name" required placeholder="Enter your name" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
         />

            <label for="txt_address">Address</label>
            <textarea name="txt_address" id="txt_address" cols="45" rows="5" placeholder="Enter your address"required></textarea>

            <label for="txt_contact">Contact</label>
            <input type="text"  required name="txt_contact" id="txt_contact" placeholder="Enter your contact number" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9"/>

            <label for="txt_email">Email</label>
            <input type="email"   required name="txt_email" id="txt_email" placeholder="Enter your email address" Pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;/>

            <label for="txt_pwd">Password</label>
            <input type="password"  required name="txt_pwd" id="txt_pwd" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>

            <label for="txt_cpwd">Confirm Password</label>
            <input type="password"  required name="txt_cpwd" id="txt_cpwd" placeholder="Confirm your password" />

            <label for="file_photo">Photo</label>
            <input type="file"  required name="file_photo" id="file_photo" />

            <label for="file_proof">Proof</label>
            <input type="file"  required name="file_proof" id="file_proof" />

            <div class="btn-container">
                <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
            </div>
        </form>
    </div>

    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                success: function (result) {
                    $("#sel_place").html(result);
                }
            });
        }
    </script>

</body>

</html>
