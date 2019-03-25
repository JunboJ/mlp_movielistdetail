<?php
session_start();
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
                    <li><a href="/movieloverpj/MovieLoverMainPage.php/#section3">News</a></li>
                    <li><a href="/movieloverpj/MovieLoverMainPage.php/#section4">Contact Us</a></li>
                    <li>
                        
                    <?php
                        if(!isset($_SESSION['userName']))
                        {  header ('Location: MovieLoverMainPage.php');
                          
                        } else {
                     
                          echo '<li> <a href="logout.php">Logout</a>';
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
        include 'connection.php';
        
        $userID = $_SESSION['userID'];
        $sql = "SELECT userName, email, area, fullname, Ccnumber FROM userprofile where UserID=$userID";
       
        $result = mysqli_query($conn, $sql);
       
        $row = mysqli_fetch_array($result);
        /*$payment= $row[4]; 
        $payment_sql = "SELECT NameOnCard, validDate, CVV From payment_method Where Ccnumber=$payment";
        $payment_res = mysqli_query($connect,$payment_sql);
        $paymentrow = mysqli_fetch_array($payment_res);
        */
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
                                     echo $row[3];
                                     echo '<br>';
                                     echo '<label>Username : </label>';
                                     echo $row[0];
                                     echo '<br>';
                                     echo '<label>Email : </label>';
                                     echo $row[1];
                                     echo '<br>';
                                     echo '<label>Area:</label>';
                                     echo $row[2];
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
                                        <form action="update.php" method="POST">
                                            <h1> Change your personal details here: </h3>
                                <div class="form-group" >
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="fullname">Full Name:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text"  id="fullname" name="updatefullname" class="text_field form-control" placeholder="Full Name" value="<?php echo $row[3]; ?>" placeholder="<?php echo $row[3]; ?>" required>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="location">Area:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="location" name="updatelocation" class="text_field form-control" placeholder="Location" value="<?php echo $row[2]; ?>" placeholder="<?php echo $row[2]; ?>"required>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="username">Username:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="username" name="updateusername" class="text_field form-control" placeholder="Username" value="<?php echo $row[0]; ?>" placeholder="<?php echo $row[0]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="email">Email:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="username" name="updateemail" class="text_field form-control" placeholder="Email" value="<?php echo $row[1]; ?>" placeholder="<?php echo $row[1]; ?>" required>
                                        </div>
                                    </div>
                                <!--<div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="ccnumber">Credit Card Number:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" maxlength="16" id="ccnumber" name="updateccnumber" class="text_field form-control" placeholder="Credit Card Number" value="<?php echo $row[4]; ?>" placeholder="<?php echo $row[4]; ?>" required>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="nameoncard">Name on Card:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="nameoncard" name="updatenoc" class="text_field form-control" placeholder="Name on Card" value=" echo $paymentrow[0]; ?>" placeholder=" echo $paymentrow[0]; ?>" required>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="cvv">CVV:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" maxlength="3" id="cvv" name="updatecvv" class="text_field form-control" placeholder="CVV" value=" echo $paymentrow[2]; ?>" placeholder=" echo $paymentrow[2]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="cvv">Valid Date:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" maxlength="4" id="updatevdate" name="updatevdate" class="text_field form-control" placeholder="Valid Date"  value=" echo $paymentrow[1]; ?>" placeholder=" echo $paymentrow[1]; ?>" required>
                                        </div>
                                    </div>-->
                                    <br>
                                <div class="form-group form_align col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                        <button type="submit" class="btn btn-default btn-md" value="Submit">Submit</button>
                                    </div>

                                  </form>
            </div>
            
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

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="js/page2.js"></script>

</body>


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
</html>