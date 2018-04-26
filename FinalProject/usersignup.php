<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <title>User sign up</title>
        <link rel="stylesheet" type="text/css" href="project2.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div>
		<ul class="navbar">
	  	<li class="navbarlist"><a href="project2_1.php" class="active">Home</a></li>
	  	<li class="navbarlist"><a href="createblog.php">Create Blog</a></li>
	  	<div class="usermanagement">
      <li><a href="userlogin.php">Login</a></li>      
      <li><a href="usersignup.php">Sign Up</a></li>
	<li><a href="http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/logout.php">Log Out</a></li>
	</div>
</ul>
</div>
<div name="maincontent" id="maincontent">
        <h4 align="center" style="color: red;">Register</h4>
        <form action="" method="post">
        <table align="center">
            <tr>
                <td>First Name:</td>
                <td><input type="given-name" name="firstname" required /></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="family-name" name="lastname" required /></td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><input type="email" name="email" required /></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="username" name="username" required/></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required /></td>
            </tr>
            <tr>
                <td>Access Type:</td>
                <td>
                    <input type = "radio" name = "radio1"
                            value = "admin" id="accesstype1"/>Admin
                    <input type = "radio" name = "radio1"
                            value = "reguser" id="accesstype2" />User

                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit" /></td>
            </tr>
        </table>
<div class="footer">
  <h2>Join our blog</h2>
	   <div class="footer-social">
	     <a href="https://www.facebook.com/GeorgiaStateUniversity"  target="_blank"><span class="footer-facebook">F</span></a>
	     <a href="https://twitter.com/georgiastateu" target="_blank"><span class="footer-twitter">T</span></a>
	     <a href="https://www.linkedin.com/edu/georgia-state-university-18163" target="_blank"><span class="footer-linkedin">L</span></a>
	     <a href="http://instagram.com/georgiastateuniversity" target="_blank"><span class="footer-instagram">I</span></a>
	     <a href="https://www.flickr.com/photos/georgiastate" target="_blank"><span class="footer-flickr">fl</span></a>
	     <a href="https://www.youtube.com/channel/UCpDtOZmGitIVXytVrjJL7LQ" target="_blank"><span class="footer-youtube">y</span></a>
	     <a href="http://vimeo.com/georgiastate" target="_blank"><span class="footer-vimeo">V
	     </span></a>
	   </div> 
</div>
        </form>
        <?php
        // Create connection
            $link = mysql_connect("localhost", "tlloyd5", "tlloyd5")
                or die("cannot connect: " . mysql_error());
      
        // connect to database
            mysql_select_db("tlloyd5")
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
	    else header('Location: http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/userlogin.php ');

        }
        $link->close();

    ?>
</div>
</body>
</html>
