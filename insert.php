
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movielover";
    $db_table1 = "payment_method";
    $db_table2 = "userprofile";

    // Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
// "INSERT INTO  $db_table1 (NameOnCard) VALUES ('$nameoncard')"

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
                                                
                $cnum = (int)$_POST['inputccnumber']; 
                $nameoncard = $_POST['inputnameoncard'];
                $username = $_POST['inputusername'];
                $password = $_POST['inputpassword'];
                $email = $_POST['inputemail'];
                $area = $_POST['inputarea'];
                $vdate = (int)$_POST['inputvdate']; 
                $cvv = (int)$_POST['inputcvv'];
                $fullname = $_POST['inputfullname'];
               
                $sql1 = "INSERT INTO $db_table2 (userName, fullname, password, email, Ccnumber, area ) VALUES ('$username', '$fullname', $password, '$email', $cnum, '$area')";
                 
                $sql = "UPDATE $db_table1 SET NameOnCard = '$nameoncard', validDate = $vdate, CVV = $cvv where Ccnumber = $cnum";
                
                if (mysqli_query($conn, $sql1)) {
                    if (mysqli_query($conn, $sql))
                    echo 'Congratulations! Now you are registered! <br> <a href="MovieLoverMainPage.php"> back </a>';
                    
              } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
              mysqli_close($conn);
?>

