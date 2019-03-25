
<?php
session_start();
include 'connection.php';

$username   = $_POST['username'];
$pass       = $_POST['password'];
 
$user = mysqli_query($conn,"select * from userprofile where userName='$username' and password='$pass'");

$chek = mysqli_num_rows($user);



if($chek>0)
{   
    $row = mysqli_fetch_array($user);
    $_SESSION["userName"] = $row["userName"];
    $_SESSION['userID'] = $row['UserID'];
    $_SESSION['email'] = $row['email'];
    header("location: MyProfile_page2.php");
} else{
    echo 'wrong username/password </br> <a href="MovieLoverMainPage.php"> back </a>';
}


?>