<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Blog</title>
        <meta charset="UTF-8">

        <!-- Responsive Layout -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
            <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="finalProject.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
       
               <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>

            <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
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
    if (!isset($_SESSION['adminloggedIn'])) {
	echo "<br/>Must be logged in as an administrator to post <br/> 
		<a href=\"http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/userlogin.php\"> Log in</a><br/>
		 <a href=\"javascript:history.go(-1)\">Go back</a>";	
	die;
	}

?>

<h4 align="center" style="color: red;">Create Blog Post</h4>
        <form action="" method="post">
        <table align="center">
            <tr>
                <td>Title:</td>
            </tr>
	    <tr>  
	    <td><input type="text" name="title" required /></td>
            </tr>
	    <tr>
                <td>Blog:</td>
            </tr>
            <tr>
            <td><textarea rows="50" cols="50" name="content" required ></textarea></td>
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
            $link = mysql_connect("localhost", "root", "Over7070")
                or die("cannot connect: " . mysql_error());

        // connect to database
            mysql_select_db("tlloyd5")
                or die("database not connected: ". mysql_error());

        $title = $_POST['title'];
        $content = $_POST['content'];
	$userid = $_SESSION['adminloggedIn'];	        
       	
	if(!empty($title)){
            $query = "INSERT INTO post (content, userid, title)
                        VALUES('$content', '$userid', '$title')";
            $ret = mysql_query($query);
            if($ret==0){
                echo "Error";
            }
            else header('Location: project2_1.php');

        } 
	$link->close();
	?>

</body>
</html>
