<?php

session_start();

include("db.php");

//create a variable called $pagename which contains the actual name of the page
$pagename="Login";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2 align=center>".$pagename."</h2>";
echo "<p align=center> Please Login to continue";
?>

<form name="frmUserLogin" action="getlogin.php" method="post">

	<table class="formTable" align=center>

		<tr>
			<td><input name="email" placeholder="Email" type="text" size="40"></td>
		</tr>

		<tr>
			<td><input name="password" placeholder="Password" type="password" size="40"></td>
		</tr>

		<tr>

      <th>
        <div style="width:85%;display:block;float:left;text-align:left">
					<input name="btnRegister" type="submit" class="button" value="Login" style="width:97%">
        </div>

        <div style="width:15%;display:block;float:left;text-align:right">
					<input name="btnRegister" type="reset" class="buttonBlack" value="  " style="width:100%;">
        </div>
			</th>

		</tr>


	</table>

</form>

<?php
//include head layout
include("footfile.html");
?>
