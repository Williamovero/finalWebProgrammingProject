<html>
    <head>
        <title>User sign up</title>
        <meta charset="UTF-8">

        <!-- Responsive Layout -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="images/initialUtilblog.png">
       
            <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/finalProject.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

               <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>

            <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    </head>
    <body class="SignUpPage">
<div class="SignUp">
        
              <ul class="switch-group">
        <li class="switch active"><h4 align="center" style="color: #FE6250;"><a href="#signup"><strong>Register</strong></a></h4></li>
        <li class="switch"><a href="#login">Log In</a></li>
      </ul>
        <form action="userlogin.php" method="post" id="register">
                    <input type="given-name" name="firstname" placeholder="firstname" required autocomplete="off" /><br>
                    <input type="family-name" name="lastname" placeholder="lastname" required autocomplete="off" /><br>
                    <input type="name" name="email" placeholder="email" required autocomplete="off" /><br>
                    <input type="name" name="username" placeholder="username" required autocomplete="off" /><br>
                    <input type="name" name="password" placeholder="password" required autocomplete="off" /><br>

                    <label>
                    <input class="with-gap" name="radio1" type="radio" value = "admin" id="accesstype1" checked />
                    <span>Admin</span>
                    </label>
                    
                    <label>
                    <input class="with-gap" name="radio1" type="radio" value = "reguser" id="accesstype2" />
                    <span>User</span>
                    </label>
                    <br>

                    <input type="submit" value="Submit" class="btn waves-effect indigo darken-3 waves-light">
        </form>



        <div class="form">
      
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="/" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
        <?php
        // Create connection
            $link = mysql_connect("localhost", "root", "Over7070")
                or die("cannot connect: " . mysql_error());
      
        // Connect to database
            mysql_select_db("finalproject")
                or die("database not connected: ". mysql_error());
      
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $userid = $_POST['username'];
        $password = $_POST['password'];
        $accesstype = $_POST['radio1'];
      
        if(!empty($firstname)){
            $query = "INSERT INTO user_info (firstname, lastname, email, password, userid, accesstype)
                        VALUES('$firstname', '$lastname', '$email', '$password', '$userid', '$accesstype')";
            $ret = mysql_query($query);
            if($ret==0){
                echo "Username or email already exists";
                echo '<a href= "userlogin.php"> Log in</a>';
            }
	    else header('Location: userlogin.php ');

        }
        $link->close();

    ?>
</div>
</body>
</html>