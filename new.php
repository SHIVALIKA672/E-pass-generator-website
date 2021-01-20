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
    <link rel="stylesheet" href="nstyles.css">
    
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

                <h2>DETAILS </h2>
                <form action="new.php" method="post">
                    <div>
                        <label for="Username">Username</label><br>
                        <input type="text" Placeholder="User Id " name="userid">
                    </div>
                    <div>
                        <label for="password">Aadhar Number</label><br>
                        <input type="number" Placeholder="AADHAR NO." name="aadhar">
                    </div><br>

                  <div>
                    <button type="submit" class="btn btn-warning" name="login">E-PASS DETAILS</button>

                   </div>
                </form>

        </div>
    </div>

    <?php
     include 'connect.php';
     if(isset($_POST['login']))
{
  $userid=$_POST['userid'];
  $aadhar=$_POST['aadhar'];

  $sql = "SELECT * FROM details WHERE aadhar='$aadhar' ";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. "- STATE: " . $row["fstate"]. 
      "- DESTINATION: " . $row["state"].
      "- CITY: " . $row["city"]. 
      "- ADDRESS: " . $row["address"].
      "- FROM DATE: " . $row["date"].
      "- TO DATE: " . $row["tdate"]. 
      "- REASON: " . $row["reason"]. 
      "- PINCODE: " . $row["pincode"]. 
      "- NAME: " . $row["fname"]. " " . $row["lname"]. 
      "- MOBILE: " . $row["mobile"]. 
      "- AADHAR: " . $row["aadhar"]. "<br/>"; 
    }
  }
}
?>
</body>
</html>