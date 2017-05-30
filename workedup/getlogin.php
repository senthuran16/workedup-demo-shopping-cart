<?php

session_start();

include("db.php");

//create a variable called $pagename which contains the actual name of the page
$pagename="Login Confirmation";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

//Capture the details entered in the form using the $_POST superglobal variable
//Store these details into a set of new variables, one for email and one for password
$email = $_POST['email'];
$password = $_POST['password'];

//if any of the variables is empty
if(empty($email) || empty($password))
{
  //Display an error message
  //Display a link back to the login page
  echo "<p>Your form is incomplete<br/>Please fill in all the required details<br/>Go back to <b><a href=login.php>Login</a></b></p>";
}
//else
else{

	//SQL query to retrieve the record from the users table for which the email stored in
	//database table matches the email entered in the form (if there is one).
  $SQL="select * from users where UsersEmail='".$email."'";

	//Execute query and store result in array.
  $exeSQL=mysql_query($SQL) or die (mysql_error());


	//if email from array i.e. retrieved from DB doesn't match email entered in form
  if (!($user=mysql_fetch_array($exeSQL)))
  {
		//Display an error message
	  //Display a link back to the login page
    echo "<p>Sorry, the email you entered was not recognized<br/>";
    echo "Go back to <b><a href=login.php>Login</a></b></p>";
    echo "or <b><a href=register.php>Register</a></b> with workedUp</p>";

  }
  // else (which means if email from array i.e. retrieved from DB matches email entered in form)
  else{
		//if password from array i.e. retrieved from DB doesn't match password entered in form
    if(!($user['UsersPassword'] == $password))
    {
  			//Display an error message
  		  //Display a link back to the login page
        echo "<p>Sorry, the password you entered is not valid<br/>Go back to <b><a href=login.php>Login</a></b></p>";
    }
    else
    {


      //create a session variable for this customer who has just logged in
      //store his/her id, first name and surname in this session variable.
      $_SESSION['loggedUser']['c_userid'] = $user['userId'];
      // store user type
      $_SESSION['loggedUser']['userType'] = $user['UsersType'];
      //For the user id create $_SESSION['c_userid'] and inside allocate the user id from the array of records.
      //Do the same for the first name and the surname.
      $_SESSION['loggedUser']['firstName'] = $user['UsersFName'];
      $_SESSION['loggedUser']['lastName'] = $user['UsersLName'];
      //Display a greeting using the full name i.e. first name and surname stored in the session variable
      echo "<b>Hello, ".$_SESSION['loggedUser']['firstName']." ".$_SESSION['loggedUser']['lastName']."</b>";

      // customer logged in
      if($_SESSION['loggedUser']['userType']=="C"){
        // else (which means if password from array i.e. retrieved from DB matches password entered in form_
    		// Display a confirmation message and the email address
        echo "<p>You have successfully logged in with ".$email."!</p>";
    		// Display a link back to the index to allow the user to continue shopping
        echo "<p>To continue shopping <b><a href=index.php>Product Index</a></b></br>";
    		// Display a link to the basket to allow the user to view the content of the basket
        echo "To view your basket <b><a href=basket.php>My Basket</a></b></p>";
      }else if($_SESSION['loggedUser']['userType']=="A"){
        echo "<p>You have successfully logged in as an Administrator!</p>";
    		echo "<a href=index.php><button class=button>Admin Menu</button></a>";
      }


    }
  }
}

//include head layout
include("footfile.html");
?>
