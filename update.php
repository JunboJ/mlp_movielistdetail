<?php
session_start();
   include 'connection.php';


        
                                                
               // $cnum = (int)$_POST['updateccnumber'];
                $fullname =  $_POST['updatefullname'];
                //$nameoncard = $_POST['updatenoc'];
                $username = $_POST['updateusername'];
                $email = $_POST['updateemail'];
                $area = $_POST['updatelocation'];
               // $cvv = (int)$_POST['updatecvv'];
                //$vdate = (int)$_POST['updatevdate'];
               
                $sql = "UPDATE userprofile SET fullname = '$fullname', userName = '$username', area = '$area', email = '$email'";
                //$sql1 = "UPDATE payment_method SET NameOnCard = '$nameoncard', validDate = '$vdate', CVV = '$cvv',Ccnumber = '$cnum'";
                 
               
                
                if (mysqli_query($conn, $sql)) {
                   // if (mysqli_query($connect, $sql1))
                    echo 'New record created successfully <a href="MyProfile_page2.php"> back </a>';
                    
              } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
              }
              mysqli_close($conn);
              
                           

?>