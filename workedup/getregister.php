<?php

session_start();

include("db.php");

//create a variable called $pagename which contains the actual name of the page
$pagename="Registration Confirmation";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

//Capture the details entered in the all the fields of the form using the $_POST superglobal variable
//Store these details into a set of new variables
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$address = $_POST['address'];
$postCode = $_POST['postCode'];
$telNo = $_POST['telNo'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// mysql_errno();
$errNo;

// for email validation
$reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

// check for empty fields
if(empty($fName) || empty($lName) || empty($address) || empty($postCode) || empty($telNo) || empty($email) || empty($password) || empty($confirmPassword) )
{
	// one of the fields is empty
	// error
	echo "<p>All fields are compulsory<br/>Go back to <b><a href=register.php>Register</a></b></p>";
}

// validate email
else if (!preg_match($reg, $email)) {
	// error
	echo "<p>Email not valid<br/>Go back to <b><a href=register.php>Register</a></b></p>";
}

// check for password confirmation
else if($password != $confirmPassword)
{
	//if the 2 entered passwords do not match
	//Display error passwords not matching message
	//Display a link back to register page
	echo "<p>Password confirmation mismatch<br/>Go back to <b><a href=register.php>Register</a></b></p>";
}

// all the validations are passed
else
{
	//Write SQL query to insert a new user into users table and execute SQL query
	//Execute INSERT INTO SQL query
	//Write SQL query to insert a new user into users table and execute SQL query
	//The SQL code for inserting a new record is
	$insertSQL="INSERT INTO users (UsersType, UsersFName, UsersLName, UsersAddress,UsersPostCode,UsersTelNo,UsersEmail,UsersPassword)
VALUES ('C','".$fName."','".$lName."','".$address."','".$postCode."','".$telNo."','".$email."','".$password."')";

	//Execute the INSERT INTO SQL query
	$exeinsertSQL=mysql_query($insertSQL) ;

	//Retrieve the error number using mysql_errno. If the error detector returns the number 0, everything is fine
	if(mysql_errno()==0)
	{
		//Display registration confirmation message
		//Display a link to login page
		echo "<p>Registration Successful!</p>";
		echo "<a href=login.php><button class=button>Login</button></a>";
	}
	//if the error detector does not return the number 0, there is a problem
	else
	{
		//Display generic error message
		//if the error detector returned the number 1062 i.e. unique constraint on the email is breached
//(meaning that the user entered an email which already existed)
		if(mysql_errno()==1062)
		{
			//Display email already taken error message
			//Display a link back to register page
			echo "<p>Specified email has been already taken! Please <b><a href=register.php>Re-fill the registration form</a></b> with a valid email</p>";
		}
	}
}



//include head layout
include("footfile.html");
?>
