<?php

session_start();

//include a db.php file to connect to database
include ("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Index";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");

echo "<p></p>";
//display name of the page and some text
echo "<h2>".$pagename."</h2>";
echo "<p> Amazing products for your home, for your work, for you! <br><br><hr>";

echo "<div class=productsContainer>";
//create an array of records (2 dimensional variable) called $prodArray.
//populate it with the records retrieved by the SQL query previously executed.
//loop through the array i.e while the end of the array has not been reached go through it

//create a new variable containing a SQL statement retrieving names of products from the product table
$SQL="select * from product";
//Create a new variable containing the execution of the SQL query i.e. select the records or get out
$exeSQL=mysql_query($SQL) or die (mysql_error());

while ($arrayprod=mysql_fetch_array($exeSQL))
{

	echo "<div class=productThumbnail>";

	echo "<a href=prodinfo.php?u_prodid=".$arrayprod['prodId']."><img class=productImages src=".$arrayprod['prodPicName']." height=200></a>";

	echo "<br><br>";
	echo "<h2>".$arrayprod['prodName']."</h2>";
	echo "<b>$ ".$arrayprod['prodPrice']."</b>";
	echo "<br><br>";

	echo "</div>";
}

echo "</div>";
echo "<br><br>";

//include head layout
include ("footfile.html");
?>
