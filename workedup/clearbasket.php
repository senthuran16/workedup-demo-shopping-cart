<?php

// start session
session_start();

//unset the shopping basket session array
unset($_SESSION['basket']);

//create a variable called $pagename which contains the actual name of the page
$pagename="Clear Basket";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

//Display cleared basket message
echo "<p> Ordering basket now clear </p>";

//include head layout
include("footfile.html");
?>
