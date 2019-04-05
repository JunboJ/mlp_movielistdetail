<?php
session_start();
include ('connection.php');
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Movie Lover</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/mainpage2_css.css" type="text/css"/>
</head>
<body>
   
    <header> 
                    <div data-target=".navbar" data-offset="50">

                <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="MovieloverMainPage.php"><img id="logo_pic" src="img/logomovieloverBW.png"></a>
                    </div>
                    
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                    <li><a href="/movieloverpj/MovieLoverMainPage.php">Home</a></li>
                    <li><a href="/movieloverpj/movie_list.php">Movies</a></li>
                    <li><a href="/movieloverpj/MovieLoverMainPage.php#section3">News</a></li>
                    <li><a href="/movieloverpj/MovieLoverMainPage.php#section4">Contact Us</a></li>
                    <li>
                        
                    <?php
                        if(!isset($_SESSION['userName'])) {
                        // {  header ('Location: MovieLoverMainPage.php');
                          
                        } else {
                     
                          echo '<li> <a href="/movieloverpj/logout.php">Logout</a>';
                          echo '</li>';
                        }
                        ?>
                        </li>
        </ul>
        
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            
            </div>
            <div class="col-lg-8  col-md-8 col-sm-8 col-xs-8"></div>
        
        <section id="tabs_section">
            <div class="tab">
                <button class="tablinks" id="defaultTab" onclick="openTab(event, 'First')">My Profile</button>
                <button class="tablinks" onclick="openTab(event, 'Second')">My List</button>
                <button class="tablinks" onclick="openTab(event, 'Third')">My Tickets</button>

            </div>
            </section>
            <section>
                <div id="First" class="tabcontent">
                <?php
                    include ('connection.php');
                    
                    $userID = $_SESSION['userID'];
                    $showinfo_sql = "SELECT userName, email, area, fullname, Ccnumber FROM userprofile where UserID=$userID";
                
                    $showinfo_res = mysqli_query($conn, $showinfo_sql);
                
                    $showinfo_arr = mysqli_fetch_array($showinfo_res);
                ?>
                    <div id="MyProfile">
                        <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                        <div class="column1 col-lg-8  col-md-8 col-sm-8 col-xs-8">
                                    <br>
                                    <?php
                                    if(!isset($_SESSION['userName']))
                                    { header ('Location: MovieLoverMainPage.php');
                                      
                                    } else {
                                     echo '<h1> Welcome, '   .$_SESSION['userName']. '</h1>';
                                     echo '<label>Full Name : </label>';
                                     echo $showinfo_arr[3];
                                     echo '<br>';
                                     echo '<label>Username : </label>';
                                     echo $showinfo_arr[0];
                                     echo '<br>';
                                     echo '<label>Email : </label>';
                                     echo $showinfo_arr[1];
                                     echo '<br>';
                                     echo '<label>Area:</label>';
                                     echo $showinfo_arr[2];
                                     echo '<br>';
                                     echo '<label>Payment:</label>';
                                     echo 'Visa';
                                     echo '<br>';
                                    }
                                    ?>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                </div>
                                                         
                                            
                                    </div>


                            <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class = "change-details">
                                         <!-- Trigger/Open The Modal -->
                                         <button id="myBtn">Change personal details </button>
            
                                         <!-- The Modal -->
                                         <div id="myModal" class="modal">

                                         <!-- Modal content -->
                                        <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                            <h1> Change your personal details here: </h3>
                                            <div class="form-group" >
                                                <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="fullname">Full Name:</label>
                                                <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                        <input type="text"  id="fullname" name="updatefullname" class="text_field form-control" value="<?php echo $showinfo_arr[3]; ?>" placeholder="<?php echo $showinfo_arr[3]; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="location">Area:</label>
                                                <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                        <input type="text" id="location" name="updatelocation" class="text_field form-control" value="<?php echo $showinfo_arr[2]; ?>" placeholder="<?php echo $showinfo_arr[2]; ?>"required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="username">Username:</label>
                                                <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                        <input type="text" id="username" name="updateusername" class="text_field form-control" value="<?php echo $showinfo_arr[0]; ?>" placeholder="<?php echo $showinfo_arr[0]; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="email">Email:</label>
                                                <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                        <input type="text" id="username" name="updateemail" class="text_field form-control" value="<?php echo $showinfo_arr[1]; ?>" placeholder="<?php echo $showinfo_arr[1]; ?>" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group form_align col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                                <button type="submit" name="submit" class="btn btn-default btn-md" value="Submit">Submit</button>
                                            </div>
                                        </form>
                                        </div>
                                        <?php
                                            
                                            include ('connection.php');
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
                                                    echo '<script>
                                                        alert("Your information has been updated!");
                                                        </script>';
                                                    } else {
                                                            echo "<div><p>Error: " . $update_sql . "<br>" . mysqli_error($connect)."</p><div>";
                                                    }
                                                }
                                            mysqli_close($conn);
                                        ?>               
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>   
        </div>
        <div class="container">

<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

        </div>
        <div class="col-lg-8  col-md-8 col-sm-8 col-xs-8"></div>
  

        <section class= "secondtab">    

<div id="Second" class="tabcontent">

<div class="mylistmv">
    <div class="moviedetail">
        
        <?php
        
        include ('connection.php');
        $userID = $_SESSION['userID'];
        // $movidid_sql = "SELECT movieID from watchlist where userID= $userID";
        // $watchlist_res = mysqli_query($connect,$movidid_sql);
        // $watchlist = mysqli_fetch_all($watchlist_res);
        //  echo $userID;                           

        $movieinfo_sql = "SELECT title, poster, releasedate From (SELECT movieID FROM watchlist WHERE userID = $userID)AS newtb INNER JOIN movies ON newtb.movieID = movies.movieID";
        $movieinfo_res = mysqli_query($conn,$movieinfo_sql);
        $movieinfo = mysqli_fetch_all($movieinfo_res);

        // $result = mysqli_query($connect,$sql)

        //$row = mysqli_fetch_all($result);
        ?>
    <!-- <table class="mylisttb">
        <tbody> -->
       <?php
           for ($r = 0; $r < count($movieinfo); $r++) {
            echo "<div id='mblock' >";
            echo "<table>";
            echo "<br />";
                    echo "<tr>";
                    echo "<td>";
                    echo "<img src='img/".$movieinfo[$r][1]."' width=150px >";
                    echo "</td>";
                    echo "<td>";
                    echo "<h3>".$movieinfo[$r][0]."</h3>";
                    echo "<p>".$movieinfo[$r][1]."</p>";
                    echo "<p>".$movieinfo[$r][2]."</p>";
                    echo "</td>";
                    echo "</tr>";
            echo "</table>";
            echo "</div>";
            echo "<div style='height:3px'>";
            echo "<hr class='style-eight'/>";
            
            echo "</div>";
        }
        ?>


                                </div>

</div>

            </div>
        </section> 
                   
                     </div>
                            </div>
<div class="container">
<section class= "thirdtab">

        <div class="row">
         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                  
         </div>
        <div class="col-lg-8  col-md-8 col-sm-8 col-xs-8"></div>
  
<div id="Third" class="tabcontent">
        <div>
            <div class="orderdetail">
            <?php
            
                include ('connection.php');
                $ticket_sql = "SELECT title,newtb.sessionID, newtb.seats from (SELECT movieID,sessionID, seats from tickets_order Where userID=$userID) 
                as newtb INNER JOIN movies ON newtb.movieID = movies.movieID INNER JOIN sessions ON movies.movieID = sessions.movieID";
                
                                            
                $ticket_res = mysqli_query($conn,$ticket_sql);
                $ticket = mysqli_fetch_all($ticket_res);
            
    
           for ($r = 0; $r < count($ticket); $r++) {
            echo "<div id='oblock' >";
            echo "<table>";
                    echo "<tr>";
                        echo "<td>";
                        echo "<h3>".$ticket[$r][0]."</h3>";
                        echo "</td>";
                    echo "</tr>";
            
                 echo "<tr>";
                    echo "<td>";
                    echo "<b>Session ID:</b>","<p>".$ticket[$r][1]."</p>";
                    echo "</td></tr>";
                    echo "<br>";
                    echo "<tr><td>";
                    echo "<b>Amount of seats:</b>","<p>".$ticket[$r][2]."</p>";
                    echo "</td>";
                echo "</tr>";
            echo "</table>";
            echo "</div>";
            echo "<div style='height:3px'>";
            echo "<hr class='style-eight'/>";
            
            echo "</div>";
            
        }
        ?>
                    </div>
                    
                                




        </div>

</div>
</div>
</section>  
</div>
<footer>
<article>
    <div class="container">
        <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <br>
    <p>Copyright © 2019 Movie Lover, All Rights Reserved </p></div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    
    </div>

</article>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="js/page2.js"></script>

</body>



</html>

            
                    
                                           
                        

                       
                        
                        
                    