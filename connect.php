<?php

$servername="localhost";
$username="root";
$password= "";
$db="epass";


$conn = mysqli_connect($servername, $username,$password, $db); 

if(!$conn){
die("connection failed".mysqli_connect_error());
}
echo"<center 50px></br>";
echo " connected succesfully!! <br>";




?>


