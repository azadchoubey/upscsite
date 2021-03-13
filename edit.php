<?php
session_start();
$emailid=$_SESSION["emailField"];
    


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
      
 include 'db_confiq.php';  
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else{
global   $disid;
echo $disid;
$sql = "UPDATE `joining` SET `Name` = '$name', `Gender`='$gender',`DOB`='$date', `Father`='$fname', `Mother` = '$mname',`Marital`='$Marital',`Physically`='$physically',`Community`='$community',`Qualification`='$qualification',`Addline1`='$addline1',`Addline2`='$addline2',`Addline3`='$addline3',`City`='$city',`State`='$state',`Pincode`='$Pincode',`Mobile`='$mobile',`Email`='$email',`Submitdate`= CURRENT_TIMESTAMP WHERE `joining`.`id` ='$disid'";

$result=mysqli_query($conn, $sql);


  mysqli_close($conn);
  if($result){
    // header("Location:confrom.php");
  }
    else{

        echo "faild to update";
    }
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
          
          require 'db_confiq.php';
          $sql = "SELECT * FROM `joining` WHERE `Email`='$emailid'";
          $disply = mysqli_query($conn, $sql);
      
          if($disply){
          while ($row = mysqli_fetch_array($disply)) {
                
            ?>
   <?php echo " <form id='text' action='edit.php?";echo $row['id'] method='post'>" ;?>
          


        
          <strong>
                <p id="ph"> Personal Details </p>
            </strong>
            <table>
                <tr>

                    <td><b>Name</b>
                        <input type = "text" name="uname" value="<?php echo $row['Name'];?> "style=" margin-left: 455px;  width:420px;"  >
                        
                    </td>
                </tr>
                <tr style="margin-bottom:10px;">
                    <td><b>Gender</b>
                        <SELECT id="fill"   name='gender'>
                           <option ><?php echo $row['Gender'];?></option>
                          
                    </td>
                </tr>
                <tr id="fill">
                    <td> <b>Date Of Birth</b> <input  name="date" value='<?php echo $row['DOB'];?> '   style=" margin-left: 417px;">
                        
                    </td>
                </tr>
                <tr>
                    <td> <b>Father Name's </b> <input type="text" name='fname'
                    value="<?php echo $row['Father'];?> "    style=" margin-left: 413px;  width:420px;" required>
                       
                </tr>
                <tr>
                    <td> <b>Mother Name's </b> <input type="text" name='mname'
                    value="<?php echo $row['Mother'];?> "           style=" margin-left: 408px;  width:420px;" required>
                        
                    </td>
                </tr>

                <tr>
                    <td><b>Marital Status</b>
                        <select name="Marital"  style=" margin-left: 413px;">
                            <option value=""><?php echo $row['Marital'];?></option>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Physically Changed :</b>
                        <select name="Physically"   style=" margin-left: 377px;">
                        <option value=""><?php echo $row['Physically'];?></option>  
                    </td>
                </tr>
                <tr>
                    <td><b>Community :</b>
                        <select name="Community"   style=" margin-left: 417px; margin-bottom:10px;">
                        <option value=""><?php echo $row['Community'];?></option>  
                          
                    </td>
                </tr>
            </table>
            <strong>
                <p id="ph"> Educational Qualification </p>
            </strong>
            <table>
                <tr>
                    <td><b>Select Your Educational Qualification :</b>
                        <select name="Qualification"   style=" margin-left: 275px; margin-bottom:10px;">
                        <option value=""><?php echo $row['Qualification'];?></option> 
                        
                    </td>
                </tr>
            </table>
            <strong>
                <p id="ph"> Address </p>
            </strong>
            <table>

              
                </td>
                <tr>
                    <td><b>Line 1:</b>
                        <input type="text"   value="<?php echo $row['Addline1'];?> "    name='line1' style=" margin-left: 458px;  width:420px;" required>
                    </td>
                </tr>
                <tr>
                    <td><b>Line 2:</b>
                        <input type="text"  value="<?php echo $row['Addline2'];?> "     name='line2' style=" margin-left: 458px;   width:420px;" required>
                    </td>
                </tr>

                <tr>
                    <td><b>Line 3:</b>
                        <input type="text"  value="<?php echo $row['Addline3'];?> "     name='line3' style=" margin-left: 458px;   width:420px;" required>
                    </td>
                </tr>

                <tr>
                    <td><b>State/UT :</b>
               
                        <select name=slist   id="state" style=" margin-left: 438px;">
                        <option value=""><?php echo $row['State'];?></option> 
                        </select>
                <tr>
                    <td><b>District/City:</b>
                        <input type="text"  value="<?php echo $row['City'];?> "     name='city' style=" margin-left: 422px;   width:420px;" required>
                    </td>
                </tr>
                <tr>
                    <td><b>Pincode:</b>
                        <input type="text" value="<?php echo $row['Pincode'];?> "     name='Pincode' style=" font-size: 12px; margin-left: 447px;  width:80px; "
                            required>
                    </td>
                </tr>

                <tr>
                    <td><b>Mobile No:</b>
                        <input type="tel" value="<?php echo $row['Mobile'];?> "     name='mnumber' style=" font-size: 12px; margin-left: 433px;  width:150px; "
                            required>
                    </td>
                </tr>
                <tr>
                    <td><b>Email id:</b>
                        <input type="text"  value="<?php echo $row['Email'];?> "     id="emailField" name='emailField' pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$"
                            style=" font-size: 12px; margin-left: 446px;  width:420px; " placeholder="Enter Email id"
                            required>


                <tr>
                    <td><input type="submit" vaule="Confrom details" id="okButton" 
                            style="margin-left:50%; margin-bottom:10px; margin-top:10px;" /> 
  <?php  }}?>  </form> 
    </div>
 

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