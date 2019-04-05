<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="stylesheet" href="css/custom.css" type="text/css">

</head>

<body>
    <!-- nav part///////////////////////////////////////////////////////////// -->
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
                            session_start();
                            if(!isset($_SESSION['userID'])) {
                                echo '<li class= "nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Login/Register</a>
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
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
    <div id="myModal" class="modal fade">
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
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->

    <!-- nav end///////////////////////////////////////////////////////////////////////////////////////////// -->
    <div></div>
    <div class="container-fluid">
            <?php
            // $_SESSION['userID']
            $_SESSION['email'] = 'junboz598@gmail.com';
            include 'connection.php';
            
            // for showing movie info
            $sql = "SELECT movieID, title, poster, releasedate FROM movies";
            $result = mysqli_query($conn,$sql);

            //movie info store here as 2d array
            $row = mysqli_fetch_all($result);
            
                //check how many movies are in DB
                for ($a = 0; $a < count($row); $a++) {
                    //show 4 movies in a row
                    //echo col
                    echo "<div class='movieUnit text-center'>";//a2
                    //layout in one col -poster
                    $imgpath = 'img/';
                    echo "<form method='post' action='movie_detail.php'>
                        <div class='text-center posterunit'>
                        <input type='hidden' name='movieid' value='".$row[$a][0]."'/>
                        <input type='image' class='img' name='submit' src='".$imgpath.$row[$a][2]."' border='0' alt='Submit' style='width:100%; margin:15px; display:inline-block'/>
                        </div>
                        </form>";
                

                    //layout in one col -title
                    echo "<div class='text-center'>
                        <p><b>".$row[$a][1]."</b></p>
                        </div>";

                    //layout in one col -release date
                    echo "<div class='text-center'>
                        <p>".$row[$a][3]."</p>
                        </div>";

                    //layout in one col -button set
                    echo "<div>";//a3

                    //add to list btn
                    echo "<div class='btnset text-center'>";
                    // echo "<button class = 'btn btn-default' id = 'atl_btn_".$row[$a][0]."'></button>";
                    // echo "<button type='button' class='btn btn-default' data-toggle='modal' data-target='#bookticketform' onclick='getareDropitem();'>Book Ticket</button>";
                    echo "</div><br>";

                    echo "</div>";//a3

                    echo "</div>";//a2

                }
                
            ?>
    </div>
    <div>
        <footer id="footer" class="">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <br>
                <p>Copyright © 2019 Movie Lover, All Rights Reserved </p></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <br>  
                <img src="img/socialmedia.png" width="100px">
                </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="//amp.azure.net/libs/amp/2.2.4/azuremediaplayer.min.js"></script>
    <script type="text/javascript" src="js/movielist.js"></script>
    <script type="text/javascript" src="js/search.js"></script>

</body>

</html>