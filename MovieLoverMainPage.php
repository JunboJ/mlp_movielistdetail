<?php
session_start();
include 'connection.php';
?>

<html>
<head>
    <meta charset="utf-8">
    <title>MovieLoverMainPage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/main_css.css" type="text/css"/> -->

</head>
<body>
<header>
<div id="navcontainer" class="container-fluid d-flex justify-content-between" style="position:absolute;background-color:grey">
        <div class="p-2">
            <nav id="topnavbar" class="navbar navbar-expand-lg container-fluid" >
                <a class="navbar-brand" href="/movieloverpj/MovieLoverMainPage.php"><img id="logo_pic" src="img/logomovielover.png" style="height:40px; width:auto"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/movieloverpj/MovieLoverMainPage.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/movieloverpj/movie_list.php">MOVIES</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/movieloverpj/MovieLoverMainPage.php#section3">NEWS</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/movieloverpj/MovieLoverMainPage.php#section4">CONTACT US</a>
                        </li>

                        <?php
                            if(!isset($_SESSION['userID'])) {
                                echo '<li class= "nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginmodal">Login/Register</a>
                                    </li>';
                            } else {
                                // echo '<a class="nav-link" id="myBtn" style="display:none;">';
                                echo '<li> <a class="nav-link" href="/movieloverpj/logout.php">Logout</a>';
                                echo '</li>';
                                echo '<li> <a class="nav-link" href="/movieloverpj/myprofile.php">My Profile</a>';
                                echo '</li>';
                            }
                        ?>
                    </ul>
                    
                </div>
            </nav>
        </div>
        <div id="searchcontainer" class="dropdown p-2">
                <input class="form-control ds-input mr-sm-2" id="searchbox" autocomplete="off" spellcheck="false" role="combobox" type="search" placeholder="Search">
                <!-- <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button> -->
            <div class="ds-dropdown-menu" role="listbox" id="dropdownarea">
                        <!-- <div id="dropdownarea">
                        </div> -->
            </div>
        </div>
    </div>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
          <div id="loginmodal" class="modal fade">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <!-- Modal content -->
                  <div class="modal-content" >
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                      <button type="button" class="close" data-dismiss="modal">
                          <span>&times;</span>
                      </button>
                  </div> 
                      <form id="loginform" action="loginprocess.php" method="post">
                      <div class="form-group login" >
                          <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
                      </div>
                          <div class="form-group login">
                              <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                          </div>
                          Not a member yet? 
                          <a href="registerpage.php"> Join us Now!</a>
                          <br> 
                          <input type="submit"name="submit" class="btn btn-info" value="Login">
                      </form>
                  </div>
              </div>
          </div>
      </header>


      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="img\avengers.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
            <h5>The Avangers</h5>
            <p>2020-20-20</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img\xmen.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
            <h5>Xmen: Dark Phoenix</h5>
            <p>2020-20-20</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img\pikachu.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
            <h5>Detective Pikachu</h5>
            <p>2020-20-20</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img\IT2.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
            <h5>IT Chapter 2</h5>
            <p>2020-20-20</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img\godzilla.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
            <h5>Godzilla</h5>
            <p>2020-20-20</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
          
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

            

          
    <br>
    <br>
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            
                <section class="text text-1 container" id="section3">
                        <article>
                        <h1>News</h1>
                        <br><ul style="list-style-type:disc;">
                        
                        
                      <?php
                      $sql ="SELECT newsUrl, newstitle FROM news";
                      $result = mysqli_query($conn,$sql);
                      //$row = mysqli_fetch_array($result);

                      if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                          echo '<li>' . '<a  target="_blank" href="' . $row['newsUrl']. '">' .   $row['newstitle'] . '</a>' . '</li>' . '<br/>';
                        }
                    } else {
                        echo "0 results";
                    }  

?>

                            </article></ul>
                    </section>
        
                    <section class="text text-2 " id="section4">
                         <form name="contactform" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class=""></div>
                                <div class="container-fluid">
                                    <h1>CONTACT US</h1>
                                    <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" name="contactemail" class="form-control" id="email" placeholder="Enter email" onchange="input_check(this.id)">
                                        </div>
                                        <div class="form-group">
                                                <label for="firstname">First Name:</label>
                                                <input type="text" name="contactname" class="form-control" id="firstname" placeholder="Enter firstname" onchange="input_check(this.id)">
                                            </div>
                                            <div class="form-group">
                                                    <label for="message">Message:</label>
                                                    <textarea type="text" name="contacttext" class="form-control rounded-0" id="textarea" rows="3" onchange="input_check(this.id)"></textarea>
                                                </div>
                                    
                                        <input type="submit" name="submit" class="btn btn-info" value="Submit Button" >
                                
                                        <input type="reset" class="btn btn-danger" value="Reset">
                                    </div>
                            <div class=""></div>
                        </form>
                    </section>

                    <?php
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }   
                        if (isset($_POST['submit'])) {         
                                $text = $_POST['contacttext'];
                                $email = $_POST['contactemail'];
                                $fullname = $_POST['contactname'];
                            
                                $contact_sql = "INSERT INTO contactus (fullname, email, message) VALUES ('$fullname', '$email', '$text')";
                                
                                        
                                            
                            if (mysqli_query($conn, $contact_sql)) {
                                echo '
                                    <script>
                                    alert("Thank You for Your message! We will contact You as soon as Possible!");
                                    </script>
                                    ';        
                            } else {
                                echo "alert(Error: " . $contact_sql . "<br>" . mysqli_error($conn).");";
                            }
                                mysqli_close($conn);
                        }
                    ?>
            </div>

    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
    <script type="text/javascript" src="js/page1.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
                    
</body>

<footer>
    <article>
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <br>
        <p>Copyright © 2019 Movie Lover, All Rights Reserved </p></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <br>  
        <img src="img/socialmedia.png" width="100px">
        </div>

    </article>
</footer>


</html>

