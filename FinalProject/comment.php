<?php
   session_start();
//	echo $_SESSION['loggedIn']; 
?>

<!DOCTYPE html>
<html>
<head>
      	<title>Comment</title>
                <link rel="stylesheet" type="text/css" href="project2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div>
                <ul class="navbar">
                <li class="navbarlist"><a href="project2_1.php">Home</a></li>
                <li class="navbarlist"><a href="createblog.php" class="active">Create Blog</a></li>
                <div class="usermanagement">
                        <li><a href="userlogin.php">Login</a></li>
                        <li><a href="usersignup.php">Sign Up</a></li>
                        <li><a href="http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/logout.php">Log Out</a></li>
        </div>
</ul>
</div>
<div name="maincontent" id="maincontent">

<?php
   if (!isset($_SESSION['loggedIn'])) {
        echo "<br/>Must be logged in to comment <br/>
                <a href=\"http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/userlogin.php\"> Log in</a><br/>
                 <a href=\"javascript:history.go(-1)\">Go back</a>";
  	die;
	}


?>

<h4 align="center" style="color: red;">Add Comment</h4>
        <form action="" method="post">
        <table align="center">
            <tr>
                <td>Title:</td>
            </tr>
            <tr>
            <td><input type="text" name="title" required /></td>
            </tr>
            <tr>
                <td>Comment:</td>
            </tr>
            <tr>
<td><textarea rows="25" cols="50" name="content" required ></textarea></td>
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
      	<?php
	//connect to server
            $link = mysql_connect("localhost", "tlloyd5", "tlloyd5")
                or die("cannot connect: " . mysql_error());
	 // connect to database
            mysql_select_db("tlloyd5")
                or die("database not connected: ". mysql_error());

        $title = $_POST['title'];
        $content = $_POST['content'];
        $userid = $_SESSION['cmtloggedIn'];
	$postid = $_GET['postid'];
	
        if(!empty($title)){
            $query = "INSERT INTO comment (postid, userid, content, title)
                        VALUES('$postid', '$userid', '$content', '$title')";
            $ret = mysql_query($query);
            if($ret==0){
                echo "Error";
            }
            else header('Location: http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/project2_1.php');

        }
	$link->close();
        ?>
</body>
</html>
