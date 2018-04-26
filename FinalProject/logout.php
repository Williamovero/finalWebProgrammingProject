<?php
session_start();
session_destroy();
echo "You've been logged out. Page will redirect in 5 seconds. <br/> Click <a href=\"project2_1.php\">here<a/> to skip";
header('Refresh:5; URL=project2_1.php');
?>
