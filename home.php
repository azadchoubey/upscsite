<?php
session_start();
if(!isset($_SESSION["username"]))
{ 
  $loginbtn=true;
}
else{
  $loginbtn =false;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $user=$_POST['Username'];
  $pass=$_POST['Password'];
require 'db_confiq.php';
$sql = "SELECT * FROM `user_login` WHERE `Username`='$user'";
$RESULT= mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($RESULT);


  if ($numrows > 0){
    while($row = mysqli_fetch_assoc($RESULT))
    { if ($pass==$row['Password']){
      
      $_SESSION["username"] = $user;
     // note current time 
      $_SESSION["login_time_stamp"] = time();   
          $loginbtn=false;
    }
    else{
      echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <center><strong>invaild password ! </strong> </center>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";

    }
    }
  }else {
    echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <center><strong>invaild  username ! </strong> </center>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  
      
  }
}
?>

<!doctype html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="sty.css">
    <title>Home</title>
<img src="img/home.jpg" style="width:100%;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!-- Load an icon library -->
    <div class="navbar">
        <a href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
        <div class="dropdown">
            <button class="dropbtn">Registration
            </button>
            <div class="dropdown-content">
                <a href="form.php">Apply Form</a>
                <a href="#">Download Admit Card</a>
            </div>
        </div>
        <?php if(isset($_SESSION["username"])){ echo "<a href='logout.php' style='margin-left:940px;'>Logout
            </a> "; } ?>
    </div> 
    <?php 

if($loginbtn){
echo'<div class="countair">
<form action="home.php" method="post">
  <p style="margin-top: 35px; text-align: center; font-size: 30px;"> Login Your Account </p>
<input type="text" placeholder="Username" style="margin-top: 10px;" class="form" name="Username" /><br>
<input type="Password" placeholder="Password" class="form"  name="Password" /><br>
<input type="submit" Value="Login" class="buttom"  name="submit"/>
</form>
</div>';

}
?>


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
    <script>
    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
    </script>
</body>

</html>