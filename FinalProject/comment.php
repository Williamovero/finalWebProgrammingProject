<?php
   session_start();
//	echo $_SESSION['loggedIn']; 
?>

<!DOCTYPE html>
<html>
<head>
      	<title>Comment</title>
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
   <!-- Beginning of footer -->
        <div class="footer" id="footer">
          <h2>
            Contact Us at These Links
          </h2>
            <table>
                <tr>
                <ul style="list-style-type: none; display: inline-block;" class="leftAlign">
                  <li><a href="">About</a></li>
                  <ul>
                  <li><a href="">Contact</a></li>
                  <li><a href="">Employment</a></li>
                </ul>
                </ul>
                <ul style="list-style-type: none; display: inline-block;" class="leftAlign">
                  <li><a href="">Connections</a></li>
                  <ul>
                  <li><a href="">Magazines</a></li>
                  <li><a href="">Tickets</a></li>
                </ul>
                </ul>
            </tr>
                  <tr>
                <ul>
          <a href="#" class="white-text">
            <i class="fab fa-facebook fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-twitter fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-linkedin fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-google-plus fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-github fa-4x"></i>
          </a>
    </ul>
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
