
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movielover";
    $db_table1 = "contactus";
   

    // Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
// "INSERT INTO  $db_table1 (NameOnCard) VALUES ('$nameoncard')"

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
                                                
                 
                
                $text = $_POST['contacttext'];
                $email = $_POST['contactemail'];
                $fullname = $_POST['contactname'];
               
                $sql1 = "INSERT INTO $db_table1 (fullname, email, message) VALUES ('$fullname', '$email', '$text')";
                 
             
                
      if (mysqli_query($conn, $sql1)) {
            echo 'Thank You for Your message! We will contact You as soon as Possible!<br> <a href="MovieLoverMainPage.php"> back </a>';
            
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
?>