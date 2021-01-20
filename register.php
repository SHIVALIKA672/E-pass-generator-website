<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-PASS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="rstyles.css">
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <h1>E-PASS</h1>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" class="btn btn-one">

           <li class="active"><a href="index.html">HOME</a></li>
               <li ><a href="details.html">DETAILS</a></li>
               <li><a href="contact.html">CONTACT US</a></li>
               <li><a href="logout.php">LOGOUT </a></li>


               </ul>

         </div>
        </div>
      </nav>

    <div class="container">
        <div class="row">
            <h2><b>REGISTRATION FORM</b></h2>
<form  method="post">
    <div>
        <label for="fname">Firstname</label><br>
        <input type="text" Placeholder="Firstname" name="fname">
    </div><br>
    <div>
        <label for="lname">Lastname</label><br>
        <input type="text" Placeholder="Lastname" name="lname">
    </div><br>
    <div>
        <label for="email">Email</label><br>
        <input type="text" Placeholder="Email Id" name="Email">
    </div><br>
    <div>
        <label for="userid">Set Username</label><br>
        <input type="text" Placeholder="User Id" name="userid">
    </div><br>
    <div>
        <label for="pass">Set Password</label><br>
        <input type="password" Placeholder="Password" name="password">
    </div><br>
    <div><button type="submit" class="btn btn-warning" name="register">Register</button></div>
    <div><a class="btn btn-warning" href="login.php" role="button">Back</a></div>
</form>
</div>
</div>



<?php
include 'connect.php';

if(isset($_POST['register'])){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $Email=$_POST['Email'];
  $userid=$_POST['userid'];
  $password=$_POST['password'];

if($userid!= NULL && $password!= NULL)
{
  $sql="INSERT INTO `login`( fname, lname, Email, userid, password) VALUES ('$fname','$lname','$Email','$userid','$password')";
  if(mysqli_query($conn,$sql))
  {
      echo "<br><center><h3>Registeration Successfull please Login to view your Result</h3></center><br>";
  } else{
      echo "ERROR: Were not able to execute $sql. ". mysqli_error($conn);
  }
  $put="INSERT INTO `details`(`userid`) VALUES ('$userid')";
  if(mysqli_query($conn,$put))
  {
      echo "<br><center><h3>Registeration Successfull </h3></center><br>";
      header('Location:details.html');
  } else{
      echo "ERROR: Could not able to execute $put. ". mysqli_error($conn);
  }
}
else {
  echo "<br><center><h3>Please enter All the Credentials</h3></center>";
}


}
?>
</body>
</html>
