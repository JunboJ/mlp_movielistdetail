<?php
session_start();
    $_SESSION = array();
    // $_SESSION["userName"] = "";
    // $_SESSION['userID'] = "";
    // $_SESSION['email'] = "";
session_destroy();
header("location: MovieLoverMainPage.php");
?>