<?php

session_start();

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

include("db.php");

//create a variable called $pagename which contains the actual name of the page
$pagename="Ordering Basket";

@$newprodid = $_POST['h_prodid'];
@$reququantity = $_POST['prodQuantity'];

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

echo "<br>";

//Initialise basket session variable (store 0 in cell indexed 0)
$_SESSION['basket']['0'] = 0;

//initialise total and subtotal to 0
$total=0;
$subtotal=0;

$lastIndex=0;

// check whether any prodQuantity is being sent through post request
if(isset($_POST['prodQuantity']) ){

	// a new product as key value pair

	$_SESSION['basket'][$newprodid] = $reququantity;
	$lastIndex=$newprodid;
	echo "<p> Your basket has been updated </p>";
}else{

	// display only if at least one item exists
	if($lastIndex != 0){
			echo "<p> Existing Basket </p>";
	}


}

// table

echo "<table class=basket>";

echo "<tr>";
echo "<th colspan=2>Product</th>";
echo "<th align=right>Price</th>";
echo "<th align=center>Quantity</th>";
echo "<th align=right>Subtotal</th>";
echo "</tr>";

//for each iteration of the loop through the session array
foreach($_SESSION['basket'] as $key => $value){
	//if there is an index other than 0 i.e. if there is at least one item in basket
	if($key != 0){
		// retrieve the product details from db and display basket

			// execute basket query
			$prodSQL="select prodId, prodName, prodPicName, prodDescrip , prodPrice, prodQuantity from product where prodId=".$key;

			//execute SQL query
			$exeprodSQL=mysql_query($prodSQL) or die(mysql_error());

			//create array of records & populate it with result of the execution of the SQL query
			$thearrayprod=mysql_fetch_array($exeprodSQL);

			// show table row
			echo "<tr>";
			echo "<td align=center width=10 style=border:none>";
			echo "<img class=productImageBasket src=".$thearrayprod['prodPicName']." width=100>";
			echo "</td>";
			echo "<td style=border:none><b>";
			echo "&nbsp;&nbsp;&nbsp;".$thearrayprod['prodName'];
			echo "</b>";
			echo "</td>";
			echo "<td align=right>";
			echo "$ ".$thearrayprod['prodPrice'];
			echo "</td>";
			echo "<td align=center>";
			echo $_SESSION['basket'][$thearrayprod['prodId']];
			echo "</td>";
			$subtotal = $thearrayprod['prodPrice'] * $_SESSION['basket'][$key];
			echo "<td align=right>";
			echo "$ ".$subtotal;
			echo "</td>";
			$total += $subtotal;
			$subtotal=0;

			echo "</tr>";

		//store the last index of the array in a local variable
		$lastIndex = $key;
	}

}

// displaying total
echo "<tr style=border-bottom:none>";
echo "<td colspan=5 align=right>";
echo "<h2>TOTAL &nbsp;: &nbsp;&nbsp;&nbsp;$ ".$total." </h2>";
echo "</td>";
echo "</tr>";

echo "</table>";


//if the last index is 0 i.e. there is only a 0 index in the basket i.e. if there are no items in basket
if($lastIndex==0){
	// Display an empty basket message
	echo "<p> Your basket is empty <br/><br/>";
	echo "<a href=index.php><button class=button>Start Shopping</button></a>";
	echo "</p>";
}

// echo "<br>";


// if user is not logged in
if(!isset($_SESSION['loggedUser']))
{

	if($lastIndex!=0){
		// clear basket button
		echo "<a href=clearBasket.php><button class=buttonBlack>Clear Basket</button></a>";
		echo "<br/>";
	}

	echo "<p>";
	echo "<b><a href='register.php'>Register</a></b> with workedUp";
	echo "<br>";
	echo "<b><a href='login.php'>Login</a></b> to workedUp";
	echo "</p>";
}
else
{
	//  user is logged in

	if($lastIndex!=0){
		// clear basket button
		echo "<a href=checkout.php><button class=button>Checkout</button></a>&nbsp;&nbsp;";
		echo "<a href=clearBasket.php><button class=buttonBlack>Clear Basket</button></a>";
		echo "<br/>";
		echo "<br/>";
	}

}


//include head layout
include("footfile.html");
?>
