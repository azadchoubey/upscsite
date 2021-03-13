<?php
$msg=false;
$addmsg=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
      $name= $_POST['uname'];
      $gender=$_POST['gender'];
      $date=$_POST['date'];
      $fname=$_POST['fname'];
      $mname=$_POST['mname'];
      $Marital=$_POST['Marital'];
      $physically=$_POST['Physically'];
      $community=$_POST['Community'];
      $qualification=$_POST['Qualification'];
        $addline1=$_POST['line1'];
        $addline2=$_POST['line2'];
        $addline3=$_POST['line3'];
        $city=$_POST['city'];
        $state=$_POST['slist'];
        $Pincode=$_POST['Pincode'];
        $mobile=$_POST['mnumber'];
        $email=$_POST['emailField'];
        $cemail=$_POST['cemail'];
 include 'db_confiq.php';  
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else{

$sql = "INSERT INTO `joining` (`id`, `Name`, `Gender`, `DOB`, `Father`, `Mother`, `Marital`, `Physically`, `Community`, `Qualification`, `Addline1`, `Addline2`, `Addline3`, `City`, `State`, `Pincode`, `Mobile`, `Email`, `Submitdate`) VALUES (NULL, '$name', '$gender', '$date', '$fname','$mname', '$Marital', '$physically', '$community', '$qualification ', '$addline1', '$addline2', '$addline3', '$city', '$state', '$Pincode', '$mobile', '$email', CURRENT_TIMESTAMP)";
$result=mysqli_query($conn, $sql);
if ($result) {
    global  $addmsg;
    $addmsg=true;
 
// This function will return a random 
// string of specified length 
function random_strings($length_of_string) { 
      global $name;
    // md5 the timestamps and returns substring 
    // of specified length 
    return substr(md5($name), 0, $length_of_string); 
} 
  
// This function will generate  
// Random string of length 10 
    $token= random_strings(10); 
 
  
}

   
   
   
   else {
    $duplicate = mysqli_error($conn);
        if($duplicate=="Duplicate entry '$email' for key 'Email'"){
            global $msg;
            $msg=true;      
        }
  } 
  mysqli_close($conn);
    
}

}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sty.css">
    <title>Fill</title>
<img src="img/home.jpg" style="width:100%;">


</head>

<body onload="setStates();">

<div class="navbar">
  <a  href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
  <div class="dropdown">
    <button class="dropbtn">Registration
    </button>
    <div class="dropdown-content">
      <a href="form.php">Apply Form</a>
      <a href="#">Download Admit card</a>
    </div>
  </div>
</div>

    <div style="text-align :center;">
        <h2>Application Form For Joining</h2>
        <p class="red">All the given fields are required starts with *</p>
    </div>
    <h5 class="bord" > <strong><center>Part-1 Registration</center> </strong></h5>

    <div class="form1">
        <?php
               if($msg){
                echo "<p style=' color:red;
                font-size: 15px;
                margin-left: 42%;'> Email id already exists !!!</p>";

            }
            elseif($addmsg){
                
                include 'db_confiq.php';  
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                } else{
                    
                    session_start();
                    $_SESSION["emailField"] = $email;
                    $_SESSION["login_time_stamp"] = time();   
                  
                      
                        header("Location: confrom.php");
                               

                   
                   
                        }}

    
      ?>
        <form id="text" action="form.php" method="post">
            <strong>
                <p id="ph"> Personal Details </p>
            </strong>
            <table>
                <tr>
                    <td><b>Name</b>
                        <input type="text" name="uname" style=" margin-left: 455px;  width:420px;" required>
                        <p class="red1"><u>Note:</u> Name should be same as document.<br>
                            <u>Note:</u> Please do not use any prefix such Mr. or Ms etc.
                        </p>
                    </td>
                </tr>
                <tr style="margin-bottom:10px;">
                    <td><b>Gender</b>
                        <SELECT id="fill" name='gender'>
                            <OPTION Value="Male">Male</OPTION>
                            <OPTION Value="Female">Female</OPTION>
                            <OPTION Value="Other">Other</OPTION>
                        </SELECT>
                    </td>
                </tr>
                <tr id="fill">
                    <td> <b>Date Of Birth</b> <input type="date" name="date" style=" margin-left: 417px;">
                        <p class="red1"><u> Note: </u> (Date Of Birth as recorded in Marticulation/Seccoundry Examnation
                            Certificate.)</p>
                    </td>
                </tr>
                <tr>
                    <td> <b>Father Name's </b> <input type="text" name='fname'
                            style=" margin-left: 413px;  width:420px;" required>
                        <p class="red1"><u> Note: </u> Do not use prefix such Shri or Mr etc. </p>
                    </td>
                </tr>
                <tr>
                    <td> <b>Mother Name's </b> <input type="text" name='mname'
                            style=" margin-left: 405px;  width:420px;" required>
                        <p class="red1"><u> Note: </u> Do not use prefix such Smt or Mrs etc. </p>
                    </td>
                </tr>

                <tr>
                    <td><b>Marital Status</b>
                        <select name="Marital" style=" margin-left: 413px;">
                            <option value="">--Select Marital--</option>
                            <option value="Married">Married</option>
                            <option value="Unmarried">Unmarried</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Physically Changed :</b>
                        <select name="Physically" style=" margin-left: 377px;">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                    </td>
                </tr>
                <tr>
                    <td><b>Community :</b>
                        <select name="Community" style=" margin-left: 417px; margin-bottom:10px;">
                            <option value="Yes">Gerenal</option>
                            <option value="No">OBC</option>
                            <option value="No">SC/ST</option>
                    </td>
                </tr>
            </table>
            <strong>
                <p id="ph"> Educational Qualification </p>
            </strong>
            <table>
                <tr>
                    <td><b>Select Your Educational Qualification :</b>
                        <select name="Qualification" style=" margin-left: 275px; margin-bottom:10px;">
                            <option value="">--Select Your Qualification--</option>
                            <option value="10th">10th</option>
                            <option value="10+2">10+2</option>
                            <option value="Grauation">Grauation</option>
                            <option value="Post Grauation ">Post Grauation </option>
                    </td>
                </tr>
            </table>
            <strong>
                <p id="ph"> Address </p>
            </strong>
            <table>

                <p class="red" style="margin-bottom:2px; margin-left: 500px;"><u> Note: </u> Do not enter your name
                    again in address flieds. </p>
                </td>
                <tr>
                    <td><b>Line 1:</b>
                        <input type="text" name='line1' style=" margin-left: 458px;  width:420px;" required>
                    </td>
                </tr>
                <tr>
                    <td><b>Line 2:</b>
                        <input type="text" name='line2' style=" margin-left: 458px;   width:420px;" required>
                    </td>
                </tr>

                <tr>
                    <td><b>Line 3:</b>
                        <input type="text" name='line3' style=" margin-left: 458px;   width:420px;" required>
                    </td>
                </tr>

                <tr>
                    <td><b>State/UT :</b>
                        <script>
                        var states = new Array();
                        states['India'] = new Array('Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar',
                            'Chhattisgarh', 'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jammu and Kashmir',
                            'Jharkhand', 'Karnataka', 'Kerala', 'Madhya Pradesh', 'Maharashtra', 'Manipur',
                            'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Punjab', 'Rajasthan', 'Sikkim',
                            'Tamil Nadu', 'Telangana', 'Tripura', 'Uttar Pradesh', 'Uttarakhand', 'WestBengal',
                            'Andaman and Nicobar Islands', 'Chandigarh', 'Dadra and Nagar Haveli', 'Daman and Diu',
                            'Lakshadweep', 'Puducherry');

                        function setStates() {
                            var newOptions = states['India'];
                            var newValues = states['India'];
                            selectField = document.getElementById("state");
                            selectField.options.length = 0;
                            for (i = 0; i < newOptions.length; i++) {
                                selectField.options[selectField.length] = new Option(newOptions[i], newValues[i]);
                            }
                        }
                        </script>

                        <select name=slist id="state" style=" margin-left: 438px;">
                            <option value=""></option>
                        </select>
                <tr>
                    <td><b>District/City:</b>
                        <input type="text" name='city' style=" margin-left: 422px;   width:420px;" required>
                    </td>
                </tr>
                <tr>
                    <td><b>Pincode:</b>
                        <input type="text" name='Pincode' style=" font-size: 12px; margin-left: 447px;  width:80px; "
                            required>
                    </td>
                </tr>

                <tr>
                    <td><b>Mobile No:</b>
                        <input type="tel" name='mnumber' style=" font-size: 12px; margin-left: 433px;  width:150px; "
                            required>
                    </td>
                </tr>
                <tr>
                    <td><b>Email id:</b>
                        <input type="text" id="emailField" name='emailField' pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$"
                            style=" font-size: 12px; margin-left: 446px;  width:420px; " placeholder="Enter Email id"
                            required>


                <tr>
                    <td><b> Confirm Email id:</b>
                        <input type="text" id="cemail" name='cemail' pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$"
                            style=" font-size: 12px; margin-left: 395px;  width:420px; " required>
                <tr>
                    <td><input type="submit" vaule="Submit" id="okButton" disabled
                            style="margin-left:50%; margin-bottom:10px; margin-top:10px;" /> <input type="reset">
        </form>
    </div>
    <script>
    const signUpForm = document.getElementById('text');
    var emailField = document.getElementById('emailField');
    const okButton = document.getElementById('okButton');
    var cemail = document.getElementById('cemail');
    emailField.addEventListener('keyup', testpassword2);
    cemail.addEventListener('keyup', testpassword2);

    function testpassword2() {
        if (emailField.value == cemail.value) {
            okButton.disabled = false;
        } else {
            okButton.disabled = true;
        }
    };

    okButton.addEventListener('click', function(event) {
        signUpForm.submit();
    });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>