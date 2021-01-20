<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EPASS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="pstyles.css">
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
                  
                  
                   </ul>
                
             </div> 
            </div>
          </nav> 
                
                <h2 style="margin-top:150px;
                margin-left:150px;
   font-family: Georgia, 'Times New Roman', Times, serif;
   font-size:35px;
   color:black;
   display:inline-block;
   border:4px solid yellow;
   background-color:white;">THANKYOU AND TRAVEL SAFELY!</h2> 


            <?php
include 'connect.php';
include 'C:/xampp/htdocs/epass/vendor/autoload.php' ;

             
                  if(isset($_POST['submit'])){
                    $fstate = $_POST['fstate'];
                            $state = $_POST['state'];
                            $city=$_POST['city'];
                            $address=$_POST['address'];
                            $date=$_POST['date'];
                            $tdate=$_POST['tdate'];
                            $reason=$_POST['reason'];
                            $myfile_path = 'images/'.$_FILES['myfile']['name'];
                            $pincode=$_POST['pincode'];
                            $fname= $_POST['fname'];
                            $lname= $_POST['lname'];
                            $mobile=$_POST['mobile'];
                            $aadhar=$_POST['aadhar'];
                            $userid=$_POST['userid'];

                            $filename = basename($_FILES['myfile']['name']);
   
                            $rank1="MEDICAL SERVICES";
                            $rank3="GOVERNMENT WORKERS";
                            $rank2="ESSENTAIL SERVICES";
                            $rank4="BUSINESS";
                            $rank5="VISIT HOMETOWN";

                            if($reason==$rank1)
                                $rank="1";
                            else if($reason==$rank2)
                                $rank="2";
                            else if ($reason==$rank3)
                                $rank="3";
                            else if ($reason==$rank4)
                                $rank="4";
                            else
                                 $rank="5";
                   
                              
                            
                                 

                     $result ="UPDATE `details` SET fstate='$fstate',state='$state',city='$city',address='$address',date='$date',tdate='$tdate',reason='$reason', myfile ='$myfile_path',pincode='$pincode',fname='$fname',lname='$lname',mobile='$mobile',aadhar='$aadhar',rank='$rank' WHERE userid='$userid'";


                    if (mysqli_query($conn, $result))
                    {
                      echo "New record created successfully";
                    }
                    else
                    {
                      echo "not inserted " . $result . "<br>" . mysqli_error($conn);
                    }
                          
                          

                  }
                  $mpdf = new \Mpdf\Mpdf();
$data = '';
$data .= '<h1 style="
                            margin-left:170px;
                            font-family:Times New Roman;font-size: 30px;color:blue;"><img src="logo-small.png" alt="" width="90" height="90">TRAVEL EPASS</h1>';
                            $data .= '<b>FROM STATE:  </b>' .$fstate.'<br />';
                            $data .= '<b> TO STATE:  </b>' . $state .'<br />';
                            $data .= '<b> TO CITY:  </b>' . $city .'<br />';
                            $data .= '<b> TO ADDRESS:  </b>' . $address .'<br />';
                            $data .= '<b> FROM DATE:  </b>' . $date.'<br />';
                            $data .= '<b> TO DATE:  </b>' . $tdate.'<br />';
                            $data .= '<b> REASON FOR TRAVEL:  </b>'. $reason.'<br />';
                            $data .= '<b>PINCODE:  </b>' . $pincode.'<br />';
                            $data .= '<b>FULL NAME:  </b>' . $fname. " " . $lname.'<br />';
                            $data .= '<b> MOBILE NO.:  </b>' . $mobile.'<br />';
                            $data .= '<b>AADHAR NO.:  </b>'  . $aadhar.'<br />';
                            $data .= '<h2 style="margin-left:200px;
                            font-family:Times New Roman;font-size: 18px;color:magenta;">THANKYOU AND TRAVEL SAFELY :)</h2>';
                            $data .='<h3 style="
                            margin-left:600px;
                            font-family:Times New Roman;font-size: 20px;color:red;"><img src="img7.png" alt="" width="90" height="90"></h3>';

                            
                            $mpdf->WriteHTML($data);
                            $mpdf->Output('E-pass.pdf','D');

                            


               ?>


     

</body>
</html>
