<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Project 2 index page</title>
	<link rel="stylesheet" type="text/css" href="project2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>
	<div>
		<ul class="navbar">
	  	<li class="navbarlist"><a href="project2_1.php" class="active">Home</a></li>
	  	<li class="navbarlist"><a href="createblog.php">Create Blog</a></li>
	
	<div class="usermanagement">
			<li><a href="http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/userlogin.php">Login</a></li>
			<li><a href="http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/usersignup.php">Sign Up</a></li>
			<li><a href="http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/logout.php">Log Out</a></li>
	</div>
</ul>
</div>


<div name="maincontent" id="maincontent">
<table>
<tr>
	<div name="Blog" id="Blog">
<div class="header">
  <h2>Tanaja Lloyd, William Orgertrice's Blog</h2>
<?php
if($_SESSION['loggedIn'] == "admin")
        echo "<h6>Welcome " .$_SESSION['cmtloggedIn']. ", admin!</h6>";
        else if($_SESSION['loggedIn'] == "reguser")
        echo "<h6>Welcome " .$_SESSION['cmtloggedIn']. ", registered user!</h6>";
        ?>
</div>
<div ng-app="">
  <p>Name: <input type="text" ng-model="name"></p>
  <p ng-bind="name"></p>
</div>

<div class="row">
    <div class="leftcolumn">
<?php
    $link = mysql_connect("localhost", "root", "Over7070")
        or die("ba" . mysql_error());

    // connect to database
    mysql_select_db("tlloyd5")
    or die("do". mysql_error());
    
    $query = "select * from post order by postid DESC";
 
    $result = mysql_query($query)
        or die("Failed");
    
	while($row = mysql_fetch_array($result)){
            echo "<div> <h2>" .$row['title']. "</h2>
            <h5> By: " .$row['userid']. " on " .$row['date']. "</h5>
            <div class=\"card\" id=\"Tayo_Reed1\">
            <p>" .$row['content']. "</p></div></div>
	    <div>
	    <a href=\"http://codd.cs.gsu.edu/~tlloyd5/projects/mockupproject2/comment.php?postid=" .$row['postid']. "\" style=\"color: #dadee5;\">Comment</a></div>";
	
	$postid =  $row['postid'];
//	echo $postid;
	$cmtquery = "select * from comment where postid= '$postid' order by postid DESC";
	$cmtresult =  mysql_query($cmtquery)
        	or die("Failed");
	
		while($row2 = mysql_fetch_array($cmtresult)){
	    		echo "<div style=\"border: white 1px solid; padding-left: 10px; margin-left: 10px;\"><h5>" .$row2['title']. 
			"<br/>&nbsp&nbsp&nbsp&nbsp-" .$row2['userid']. "</h5>
			<div class=\"card\">
			<p style=\"font-size: 10px;\">" .$row2['content']. "</p></div></div>";
		}
 	    
	}
	mysql_close();
?>
<div>
      <h2>Tanaja, William</h2>
      <h5>From our developers</h5>
      <div class="card" >
      <p>First Blog!</p>
	<p>Hello and welcome to our blog!</p>
    </div>
    </div>
  </div>

   <div class="rightcolumn">
         <div>
      <h2>The Refreshing taste of coffee</h2>
      <h5>Yumm!</h5>
      <div class="card" ><a href="https://en.wikipedia.org/wiki/Coffee"><img src="coffee.jpg" alt="coffee" id="coffee"></a>
      <p>Why Do We Drink it?</p>
      <p>ras in sagittis tortor, vitae congue diam. Donec ac velit finibus, blandit mauris nec, tincidunt magna. Praesent suscipit orci lobortis, faucibus turpis eget, molestie orci. Suspendisse interdum viverra libero quis laoreet. Vestibulum fermentum orci id convallis varius. Cras rhoncus rhoncus semper. Fusce sit amet augue non mauris faucibus bibendum id vel ex.

Nam a venenatis lectus. Nulla blandit feugiat erat eget porttitor. Sed urna justo, sollicitudin sit amet orci a, vulputate interdum eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ut ante in sem euismod venenatis. Donec lobortis purus ut augue hendrerit lacinia. Donec ut feugiat metus. Curabitur quis vulputate mauris. Vestibulum varius ullamcorper dignissim. Integer ultrices ante sed molestie ultrices. Sed iaculis ligula urna. Nulla facilisi. Suspendisse et bibendum lectus. Quisque sodales feugiat lacus, eget scelerisque felis tristique ac. Nullam tristique velit neque, eu tincidunt turpis congue vel. Nullam rhoncus dui sit amet nulla faucibus, eget gravida dolor faucibus.</p>
    </div>
    </div>
          <div>
      <h2>The Refreshing taste of coffee</h2>
      <h5>Yumm!</h5>
      <div class="card" ><a href="https://en.wikipedia.org/wiki/Coffee"><img src="coffee.jpg" alt="coffee" id="coffee"></a>
      <p>Why Do We Drink it?</p>
      <p>ras in sagittis tortor, vitae congue diam. Donec ac velit finibus, blandit mauris nec, tincidunt magna. Praesent suscipit orci lobortis, faucibus turpis eget, molestie orci. Suspendisse interdum viverra libero quis laoreet. Vestibulum fermentum orci id convallis varius. Cras rhoncus rhoncus semper. Fusce sit amet augue non mauris faucibus bibendum id vel ex.

Nam a venenatis lectus. Nulla blandit feugiat erat eget porttitor. Sed urna justo, sollicitudin sit amet orci a, vulputate interdum eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ut ante in sem euismod venenatis. Donec lobortis purus ut augue hendrerit lacinia. Donec ut feugiat metus. Curabitur quis vulputate mauris. Vestibulum varius ullamcorper dignissim. Integer ultrices ante sed molestie ultrices. Sed iaculis ligula urna. Nulla facilisi. Suspendisse et bibendum lectus. Quisque sodales feugiat lacus, eget scelerisque felis tristique ac. Nullam tristique velit neque, eu tincidunt turpis congue vel. Nullam rhoncus dui sit amet nulla faucibus, eget gravida dolor faucibus.</p>
    </div>
    </div>
</div>
 <div class="beforefooter">

</div>

</tr>
<tr>
<div class="footer">
  <h2>Follow us at these links!</h2>
           <div class="footer-social">
             <a href="https://www.facebook.com/GeorgiaStateUniversity"  target="_blank"><span class="footer-facebook">F</span></a>
             <a href="https://twitter.com/georgiastateu" target="_blank"><span class="footer-twitter">T</span></a>
             <a href="https://www.linkedin.com/edu/georgia-state-university-18163" target="_blank"><span class="footer-linkedin">L</span></a>
             <a href="http://instagram.com/georgiastateuniversity" target="_blank"><span class="footer-instagram">I</span></a>
             <a href="https://www.flickr.com/photos/georgiastate" target="_blank"><span class="footer-flickr">fl</span></a>
             <a href="https://www.youtube.com/channel/UCpDtOZmGitIVXytVrjJL7LQ" target="_blank"><span class="footer-youtube">y</span></a>
             <a href="http://vimeo.com/georgiastate" target="_blank"><span class="footer-vimeo">V</span></a>
           </div>

</div>
</tr>

	</table>




</body>
</html>

