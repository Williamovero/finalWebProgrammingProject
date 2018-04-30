<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
    <link rel="stylesheet" type="text/css" href="project2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div>
		<ul class="navbar">
	  	<li class="navbarlist"><a href="finalProject_1.php" class="active">Home</a></li>
	  	<li class="navbarlist"><a href="createblog.php">Create Blog</a></li>
	  	<div class="usermanagement">
      <li><a href="userlogin.php">Login</a></li>      
      <li><a href="usersignup.php">Sign Up</a></li>
	<li><a href="http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/logout.php">Log Out</a></li>
	</div>
</ul>
</div>


<div name="maincontent" id="maincontent">

	<?php
	
if (isset($_SESSION['loggedIn'])) {
        echo "<br/>You are already logged in<br/>
                <a href=\"http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/logout.php\"> Log out</a><br/>
                <a href=\"javascript:history.go(-1)\">Go back</a>";
        die;
}

	?>

        <h4 align="center" style="color: red;">Sign In</h4>
        <form action="" method="post">
        <table align="center">
		<tr>
                    	<td>Username:</td>
                        <td><input type="username" name="username" required/></td>
                </tr>
                <tr>
                    	<td>Password:</td>
                        <td><input type="password" name="password" required /></td>
                </tr>
                <tr>
                    	<td><input type="submit" name="submit" value="submit" /></td>
                </tr>
        </table>
        </form>

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
</div>
	<?php
	// Create connection
        $link = mysql_connect("localhost", "tlloyd5", "tlloyd5")
                or die("cannot connect: " . mysql_error());

        // connect to database
        mysql_select_db("tlloyd5")
                or die("database not connected: ". mysql_error());

	$userid = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT accesstype FROM user_info WHERE userid = '$userid' and password = '$password'";
	$ret = mysql_query($sql)
		or die("Username  or password incorrect");

	$row = mysql_fetch_array($ret);
 if(!empty($userid)){
	if ($row["accesstype"] == "admin"){ 
		$_SESSION['adminloggedIn'] = $userid;
		$_SESSION['loggedIn'] = $row["accesstype"];
		$_SESSION['cmtloggedIn'] = $userid; 
		header('Location: http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/project2_1.php');
	}
 	else if($row["accesstype"] == "reguser"){
		 $_SESSION['regloggedIn'] = $userid;
		 $_SESSION['loggedIn'] =	$row["accesstype"];
		 $_SESSION['cmtloggedIn'] = $userid;
		 header('Location: http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/project2_1.php');	
	}
	else echo "Username or password don't exist";
	}
	?>
</body>
</html>
