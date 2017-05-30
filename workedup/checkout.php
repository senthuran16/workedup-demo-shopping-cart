<?php

session_start();

include("db.php");

//create a variable called $pagename which contains the actual name of the page
$pagename="Checkout";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

//initialise total and subtotal to 0.
$total = 0;
$subtotal = 0;
//store the current date and time in format that is compatible with MySQL.
//use the date PHP function with the 'Y-m-d H:i:s' parameters.
//2017-03-07 06:23:24
$orderDateTime = date('Y-m-d H:i:s');

//write a SQL query to insert a new record in the order table to generate a new order number.
$query = "INSERT INTO orders VALUES('',".$_SESSION['loggedUser']['c_userid'].",'".$orderDateTime."',".$total.")";
//store the id of the user who is placing the order as well as the current date and time
//Run the SQL query.
$exequery = mysql_query($query);


//if no database error is returned i.e. if the new order was inserted correctly
if(mysql_errno()==0)
{
	//SQL query to retrieve max order number for current user (for which id matches the id in session)
	//i.e retrieve the order number of most recent order placed by current user
  $retQuery = "SELECT orderNo FROM orders WHERE userId=".$_SESSION['loggedUser']['c_userid'];
	//execute SQL query
  $exeRetQuery = mysql_query($retQuery);
	//fetch the result of the execution of the SQL statement and store it in an array
  $recentOrderNo=0;
  while($row = mysql_fetch_array($exeRetQuery)){
    $recentOrderNo = $row['orderNo'];
  }
	//store the value of this order number in a variable

	//display message to confirm that order has been placed successfully and display the order number.
  echo "<p>Your order has been placed successfully.<br/><br/><b>Order No : ".$recentOrderNo."</b></p>";

	//as for basket.php, display a table header for product name, price, quantity and subtotal

  echo "<table class=basket>";

  echo "<tr>";
  echo "<th colspan=2>Product</th>";
  echo "<th align=right>Price</th>";
  echo "<th align=center>Quantity</th>";
  echo "<th align=right>Subtotal</th>";
  echo "</tr>";


	//as for basket.php, lopp through basket session array & split content of every cell from index
  foreach($_SESSION['basket'] as $key => $value)
	{
		//same as for basket.php, SQL query to retrieve product id, name and price from product table
		//for every value of the index.
		//execute SQL query, fetch the records and store them in an array of records.
		//Calculate subtotal

		//SQL query to store details of ordered items in order_line table i.e. order number,
		//product id (index), ordered quantity (content of the session array) and subtotal

		//same as for basket.php, display the product name, price, ordered quantity and subtotal
		//increment total
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

        //SQL query to store details of ordered items in order_line table i.e. order number,
        //product id (index), ordered quantity (content of the session array) and subtotal
        $orderLineQuery = "INSERT INTO order_line VALUES('',".$recentOrderNo.",".$key.",".$value.",".$subtotal.")";

        $exeOrderLineQuery = mysql_query($orderLineQuery);

  			$subtotal=0;

  			echo "</tr>";

  		//store the last index of the array in a local variable
  		$lastIndex = $key;
  	}
	}

	//create a new table row to display the total
  echo "<tr style=border-bottom:none>";
  echo "<td colspan=5 align=right>";
  echo "<h2>TOTAL &nbsp;: &nbsp;&nbsp;&nbsp;$ ".$total." </h2>";
  echo "</td>";
  echo "</tr>";

  echo "</table>";
	//SQL update query to update the total value in the order table for this specific order
  $totalQuery = "UPDATE orders SET orderTotal=".$total." WHERE orderNo=".$recentOrderNo;
  //execute SQL query and display logout link.
  $exeTotalQuery = mysql_query($totalQuery);

  echo "<p><a href=logout.php><b>Logout</b></a></p>";
}

//else i.e. if a database error is returned, display an order error message
else
{
	//Display an error message that indicates that there has been an error with placing the order
  echo "<p>There has been an error with placing the order</p>";
}

//Unset the basket session array
unset($_SESSION['basket']);



//include head layout
include("footfile.html");
?>
