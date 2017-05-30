<?php

session_start();

//include a db.php file to connect to database
include ("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Product Information";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");

//retrieve the product id passed from the previous page using the $_GET superglobal variable

//store the value in a variable called $prodid
$prodid=$_GET['u_prodid'];

//query the product table to retrieve the record for which the value of the product id
//matches the product id of the product that was selected by the user
$prodSQL="select prodId, prodName, prodPicName, prodDescrip , prodPrice, prodQuantity from product where prodId=".$prodid;

//execute SQL query
$exeprodSQL=mysql_query($prodSQL) or die(mysql_error());

//create array of records & populate it with result of the execution of the SQL query
$thearrayprod=mysql_fetch_array($exeprodSQL);

echo "<div class=productContainerSolo>";

//display product image
echo "<div class=productThumbnailSolo>";
echo "<img class=productImageSolo src=".$thearrayprod['prodPicName']." width=250 >";
echo "</div>";

echo "<div class=productNameSolo>";

//display product name in capital letters
echo "<p><h2 style=font-size:170%>".strtoupper($thearrayprod['prodName'])."</h2>";

//display product price
echo "<font style=font-size:110%><b>$ ".strtoupper($thearrayprod['prodPrice'])."</b></font></p>";
echo "<br>";

//display form made of one text box and one button for user to enter quantity
//pass the product id to the next page basket.php as a hidden value
echo "<form action=basket.php method=post>";

//quantity
echo "Quantity: ";

echo "<select name=prodQuantity length=10>";

for($i=1 ; $i <= $thearrayprod['prodQuantity'] ; $i++){

echo "<option value=".$i.">";
echo $i;
echo "</option>";

}

echo "</select>";
echo "<br>";
echo "<br>";

// get last product id

//add to basket button
echo "<input class=button type=submit value='Add to Basket'>";
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "</form>";

echo "</div>";


echo "</div>";


echo "<br><br>";
echo "<div class=productDescriptionSolo>";
echo "<p>".$thearrayprod['prodDescrip']."</p>";

echo "<br>";


echo "</div>";



//include head layout
include ("footfile.html");
?>
