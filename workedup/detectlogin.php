
<?php


if(isset($_SESSION['loggedUser'])){
	if($_SESSION['loggedUser']['userType']=="A")
	{
		// admin
		echo "<ul>";
		echo "<li><a href=adminmenu.php>Admin Menu</a></li>";
		echo "<li><a href=addproduct.php>Add Product</a></li>";
		echo "<li><a href=editstock.php>Edit Stock</a></li>";

	}else if($_SESSION['loggedUser']['userType']=="C"){
		// customer
		echo "<ul>";
		echo "<li><a href=index.php>Index</a></li>";
		echo "<li><a href=basket.php>My Basket</a></li>";
	}
}else{
	// guest user
	echo "<ul>";
	echo "<li><a href=index.php>Index</a></li>";
	echo "<li><a href=basket.php>My Basket</a></li>";
	echo "<li><a href=register.php>Register</a></li>";
	echo "<li><a href=login.php>Login</a></li>";
}

 ?>
</ul>

<?php
//if the session variable user id is set i.e. if the user has gone successfully through getlogin.php
if(isset($_SESSION['loggedUser']))
{


	echo "<ul>";


	echo "<div class=userInfoDiv>";
	echo "<img src=Images/userImg.png class=userPic>";
	//display full name i.e first name and aurname and id number aligned on the right
	echo "<a style=font-size:13px>";
	echo $_SESSION['loggedUser']['firstName']." ".$_SESSION['loggedUser']['lastName'];
	echo "<a style=font-size:13px;color:#ffc410;>";
	echo " # ".$_SESSION['loggedUser']['c_userid']."&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<a href=logout.php><img src=Images/logout.png class=logoutButton></a>";
	echo "</a>&nbsp;";
		echo "</div>";

	echo "</ul>";
}

?>
