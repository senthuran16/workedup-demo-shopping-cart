<?php

session_start();

//create a variable called $pagename which contains the actual name of the page
$pagename="Customer Registration";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2 align=center>".$pagename."</h2>";
echo "<p align=center> Register yourself with workedUp";

?>


<form name="frmUserRegistration" action="getregister.php" method="post">

	<table class="formTable" align=center>

		<tr>
			<td><input name="fName" placeholder="First Name" type="text" size="50"></td>
		</tr>

		<tr>
			<td><input name="lName" placeholder="Last Name" type="text" size="50"></td>
		</tr>

		<tr>
			<td><input name="address" placeholder="Address" type="text" size="50"></td>
		</tr>

		<tr>
			<td><input name="postCode" placeholder="Post Code" type="text" size="50"></td>
		</tr>

		<tr>
			<td><input name="telNo" placeholder="Telephone Number" type="text" size="50"></td>
		</tr>

		<tr>
			<td><input name="email" placeholder="Email" type="text" size="50"></td>
		</tr>

		<tr>
			<td><input name="password" placeholder="Password" type="password" size="50"></td>
		</tr>

		<tr>
			<td><input name="confirmPassword" placeholder="Confirm Password" type="password" size="50"></td>
		</tr>

		<tr>

			<th>
				<div style="width:70%;display:block;float:left;text-align:left">
					<input name="btnRegister" type="submit" class="button" value="Register" style="width:97%">
				</div>
				<div style="width:30%;display:block;float:left;text-align:right">
					<input name="btnRegister" type="reset" class="buttonBlack" value="Clear" style="width:100%">
				</div>
			</th>
		</tr>


	</table>

</form>


<?php
//include head layout
include("footfile.html");
?>
