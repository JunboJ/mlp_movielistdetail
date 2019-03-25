<html>
<head>
    <meta charset="utf-8">
    <title>MovieLover Register </title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/main_css.css" type="text/css"/>
</head>
<body id="backregister" style="background-image: url(img/backregister.JPG); background-size : 100%;">
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
              <a class="navbar-brand" href="#"><img id="logo_pic" src="img/logomovielover.png"></a>
            </div>
            <div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li><a href="MovieLoverMainPage.php">Home</a></li>
                  <li><a href="movie_list.php">Movies</a></li>
                  <li><a href="MovieLoverMainPage.php#section3">News</a></li>
                  <li><a href="MovieLoverMainPage.php#section4">Contact Us</a></li>
                  <li>
                    
            
                        <!-- Trigger/Open The Modal -->
                        <a id="myBtn">Login/Register</a>
                        
                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                        
                          <!-- Modal content -->
                          <div class="modal-content">
                            <span class="close">&times;</span>
                        
                            <h1>Login/Register</h1>
                            <div class="form-group login">
                                    <label for="email">Email/Username:</label>
                                    <input type="text" name="field" class="form-control" id="email" placeholder="Enter email/username" onchange="input_check(this.id)">
                                </div>
                                <div class="form-group">
                                        <label for="firstname">Password:</label>
                                        <input type="text" name="field" class="form-control" id="firstname" placeholder="Enter password" onchange="input_check(this.id)">
                                    </div>
                                    Not a member yet? 
                                    <a href="registerpage.html"> Join us Now!</a>
                                    <br>
                            <input type="button" class="btn btn-info" value="Submit Button" onclick="sub_bt()">
                        
                            <input type="reset" class="btn btn-danger" value="Reset">
                            
                          </div>
                        
                          
                        
                        </div> </li></ul>
                                     
              </div>
            </div>
          </div></nav>
        </div> </header>

    <div class="container"  >
        <br>
        <br>
        <div class="row" id="register">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            
            </div>
            <div class="col-lg-8  col-md-8 col-sm-8 col-xs-8">
            <h1>Join us now!</h1>
            You will be able to get notification and book the new release movie only by being our 
            subscriber. <br> Subcription fee only <b>$5 per month</b>


            <form name="pay" action="insert.php" method="post">
                    
                    <div class="row">
                      
                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                            <div class="form-horizontal col-xs-10 col-sm-10 col-md-10 col-lg-10">
                              <form action="insert.php" method="POST">  
                                </div> <div class="form-group">
                                    <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="username">Full Name:</label>
                                    <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                            <input type="text" id="fullname" name="inputfullname" class="text_field form-control" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="username">Username:</label>
                                    <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                            <input type="text" id="username" name="inputusername" class="text_field form-control" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="email">Email:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="formemail" name="inputemail" class="text_field form-control" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="area">Area:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="formarea" name="inputarea" class="text_field form-control" placeholder="Area" required>
                                        </div>
                                    </div>
                                <div class="form-group" >
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="credit_card">Credit card:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" maxlength="16" id="cardno" name="inputccnumber" class="text_field form-control" placeholder="Credit card number" onchange="input_check(this.id);checklen(this)" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="password">Password:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="formpassword" name="inputpassword" class="text_field form-control" placeholder="Password" required>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="name">Name on card:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="nameoncard" name="inputnameoncard" class="text_field form-control" placeholder="Name on the card" required>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="password">Valid Date:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="vdate" maxlength="4" name="inputvdate" class="text_field form-control" placeholder="Valid Date" required>
                                        </div>
                                    </div>    
                                    <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="cvv">CVV:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" maxlength="3" id="cvv" name="inputcvv" class="text_field form-control" placeholder="CVV" required>
                                        </div>
                                    </div>                       
                                
                                <div class="form-group form_align col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                        <button type="submit" class="btn btn-default btn-md" value="Register">Register</button>
                                    </div>

                                  </form>
                                    
                            </div>
                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                        </div>
                        
                        
                </form>

    </div></div> 
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
            <br>  
            <img src="img/socialmedia.png" width="100px">
            </div>

        </article>
    </footer>

</html>