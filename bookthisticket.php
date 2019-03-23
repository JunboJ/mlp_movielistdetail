<?php
    session_start();

    $userid = $_SESSION['userID'];
    $movieid = $_SESSION['movieID'];
    $userName = 'James';


    include ('connection.php');

    $sessionid = $_REQUEST['seid'];
    $session = $_REQUEST['se'];
    $seats = $_REQUEST['seat'];
    $theatername = $_REQUEST['tn'];

    if ($seats > 1) {
        $w_ticket = "tickets";
    }else{
        $w_ticket = "ticket";
    }

//get movie name from db
    $moviename_sql = "SELECT title FROM movies WHERE movieID = $movieid";
    $title_res = mysqli_query($conn, $moviename_sql);
    $title_arr = mysqli_fetch_all($title_res);
    $title = $title_arr[0][0];

//add this order to tickets_order table
    $sql = "INSERT INTO tickets_order (movieID, sessionID, userID, seats) VALUES ($movieid, $sessionid, $userid, $seats)";
    $order_res = mysqli_query($conn, $sql);

    if ($order_res === TRUE) {
        echo "order placed successfully";
        sendnotification();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

//send email function
    $getemail_sql = "SELECT email FROM userprofile WHERE UserID = $userid";
    $email_res = mysqli_query($conn, $getemail_sql);
    $email_arr = mysqli_fetch_all($email_res);
    $email = $email_arr[0][0];
    echo $email;

    function sendnotification () {
        $userName = $GLOBALS['userName'];
        $email = $GLOBALS['email'];
        $w_ticket = $GLOBALS['w_ticket'];
        $seats = $GLOBALS['seats'];
        $title = $GLOBALS['title'];
        $theatername = $GLOBALS['theatername'];
        $session = $GLOBALS['session'];

        $from_name = 'Movie Lover';
        $from_email = 'movielover.jar@gmail.com';
        $headers = 'From: '.$from_name.' <'.$from_email.'>';
        $body = 'Hi, user'.$userName.'. You have booked '.$seats.' '.$w_ticket.' for'.$title. ' at '.$theatername.' at '.$session;
        $subject = 'Your order has been placed successfully!';
        $to = "'".$email."'";
        if (mail($to, $subject, $body, $headers)) {
            echo 1;
        }else{
            echo 2;
        }
    }

//update seats info in dummy table
    //get current seats in dummy table
    $dummy_seats = "SELECT seats FROM dummytb1 WHERE sessionID = $sessionid";
    $ds_rs = mysqli_query($conn, $dummy_seats);
    $ds = mysqli_fetch_all($ds_rs);

    // echo $ds[0][0];

    //calculate new seats
    $latestSeats = $ds[0][0] - $seats;

    //update dummy table
    $seats_sql = "UPDATE dummytb1 SET seats = $latestSeats WHERE sessionID = $sessionid";
    $dummyseats_res = mysqli_query($conn, $seats_sql);

    // if ($dummyseats_res === TRUE) {
    //     echo "dummy seats info updated successfully";
    // } else {
    //     echo "Error: " . $seats_sql . "<br>" . $conn->error;
    // }
?>