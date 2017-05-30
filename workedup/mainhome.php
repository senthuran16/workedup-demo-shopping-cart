<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Template";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
//echo "<h2>".$pagename."</h2>";
//echo "<p> Text Here";
// echo "<center><img src=workedup_logo.png></center>";
echo "<center><h2>Welcome to workedUP!</h2></center>";
echo "<center><p>Welcome to workedUP, an amazing place to furnish<br/>your home and/or office with unique stylish products offered at a very competitive price.</p></center>";
echo "<center><a href=index.php><button class=button>Index Page</button></a>&nbsp;&nbsp;";
echo "<a href=login.php><button class=buttonBlack>Admin Login</button></a></center>";

//include head layout
include("footfile.html");
?>
