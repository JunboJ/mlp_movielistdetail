<?php
      if (isset($_POST['submit'])) {                   
               // $cnum = (int)$_POST['updateccnumber'];
                $fullname =  $_POST['updatefullname'];
                //$nameoncard = $_POST['updatenoc'];
                $username = $_POST['updateusername'];
                $email = $_POST['updateemail'];
                $area = $_POST['updatelocation'];
               // $cvv = (int)$_POST['updatecvv'];
                //$vdate = (int)$_POST['updatevdate'];
               
                $update_sql = "UPDATE userprofile SET fullname = '$fullname', userName = '$username', area = '$area', email = '$email'";
                //$sql1 = "UPDATE payment_method SET NameOnCard = '$nameoncard', validDate = '$vdate', CVV = '$cvv',Ccnumber = '$cnum'";
                 
               
                
                if (mysqli_query($conn, $update_sql)) {
                   // if (mysqli_query($connect, $sql1))
                   echo '<script type="javascript">';

                   echo 'alert("Your information has been updated!")';
                   
                   echo '</script>';
                   
                   
                    
              } else {
                    echo "Error: " . $update_sql . "<br>" . mysqli_error($connect);
              }
      }
              mysqli_close($conn);
?>