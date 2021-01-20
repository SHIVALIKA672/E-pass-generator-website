<?php
$username = "root";
$password = "";
$db="epass";
$table="login";
$conn = mysqli_connect("localhost", $username, $password,$db) or die(mysqli_connect_error());
mysqli_select_db($conn,$db) or die(mysqli_error($conn));

 ?>
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
    <link rel="stylesheet" href="lstyles.css">
    
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

                <h2>LOGIN </h2>
                <form action="login.php" method="post">
                    <div>
                        <label for="Username">Username</label><br>
                        <input type="text" Placeholder="User Id " name="userid">
                    </div>
                    <div>
                        <label for="password">Password</label><br>
                        <input type="password" Placeholder="Password" name="password">
                    </div><br>

                  <div>
                    <button type="submit" class="btn btn-warning" name="login">Login</button>

                    <a class="btn btn-warning" href="register.php" role="button">Register</a>

                  </div>
                </form>




        </div>
    </div>



<?php
if(isset($_POST['login']))
{
  session_start();
  $userid=$_POST['userid'];
  $pass=$_POST['password'];
 
if($userid=="" && $password=="")
{
  echo "<br><center><h4>Please enter the all Credentials<h4></center>";
}
else  {
  $sql1="SELECT `userid`,`password` FROM $table WHERE `userid`='$userid' " ;
  $check=mysqli_query($conn, $sql1);
  $count=mysqli_num_rows($check);
  if($count!=0)
  {
    while($row=mysqli_fetch_assoc($check)){
      $dbusername=$row['userid'];
      $dbpassword=$row['password'];
    }
    if($userid==$dbusername && $pass==$dbpassword){
      $_SESSION['username']=$userid;
      header('Location:new.php');
    }
    else {
      echo "<center><h4>Incorrect username or Password</h4></center>";
    }
  }
}
}

?>

</body>
</html>
