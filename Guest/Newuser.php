 <?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	$Name=$_POST["txt_name"];
	$Gender=$_POST["txt_gender"];
	$DOB=$_POST["txt_dob"];
	$Contact=$_POST["txt_contact"];
	$Email=$_POST["txt_email"];
	$Password=$_POST["txt_pwd"];
	$Conform_password=$_POST["txt_cpwd"];
	$Photo=$_FILES['file_photo']['name'];
	$path=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($path,'../Assets/File/User/'.$Photo);
	$Place=$_POST['sel_place'];
	if($Password==$Conform_password)
	{
		
	$insQry="insert into
tbl_newuser(user_name,user_gender,user_dob,user_contact,user_email,user_password,user_photo,place_id)values('".$Name."','".$Gender."','".$DOB."','".$Contact."','".$Email."','".$Password."','".$Photo."','".$Place."')";
	if($con->query($insQry))
	{
		?>
		<script>
		alert('inserted');
		window.location="Newuser.php";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User Registration</title>
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
            color: #fff; /* White text color */
            margin-bottom: 20px;
        }

        .registration-form table {
            width: 100%;
            color: #ddd; /* Light grey for text */
        }

        .registration-form td {
            padding: 10px;
        }

        .registration-form input,
        .registration-form select {
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
    margin-right: 15px; /* Increase spacing between radio buttons */
}

        

        .registration-form input:hover,
        .registration-form select:hover {
            border-color: #4CAF50; /* Green hover effect */
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.3);
        }

        .registration-form input:focus,
        .registration-form select:focus {
            border-color: #4CAF50; /* Green border on focus */
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.5);
            outline: none;
        }

        .registration-form .btn-container {
            text-align: center;
        }

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
    <script src="../Assets/JQ/jQuery.js"></script>
</head>

<body>
    <div class="registration-form">
        <h2>User Registration</h2>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table border="0">
                <tr>
                    <td>District</td>
                    <td><select name="sel_district" id="sel_district" onChange="getPlace(this.value)">
                            <option>---SELECT----</option>
                            <?php
                            $sel = "select * from tbl_district";
                            $row = $con->query($sel);
                            while ($data = $row->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $data['dist_id'] ?>">
                                    <?php echo $data['dist_name'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Place</td>
                    <td><select name="sel_place" id="sel_place">
                            <option>---SELECT----</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text"  required name="txt_name" id="txt_name"  pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
                </tr>
                <tr>
                <td>Gender</td>
    <td>
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 15px;">
                <input type="radio" required name="txt_gender" id="rbl_gender" value="Male" /> Male
            </label>
            <label>
                <input type="radio" required name="txt_gender" id="rbl_gender2" value="Female" /> Female
            </label>
        </div>
    </td>
                </tr>
                <tr>
                    <td>DOB</td>
                    <td><input type="text" required name="txt_dob" id="txt_dob" /></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><input type="text" required name="txt_contact" id="txt_contact"  pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9"/>
</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" required name="txt_email" id="txt_email" Pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" required name="txt_pwd" id="txt_pwd"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
</td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" required name="txt_cpwd" id="txt_cpwd" /></td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td><input type="file" required name="file_photo" id="file_photo" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="btn-container">
                            <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                            <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
                        </div>
                    </td>
                </tr>
            </table>
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
