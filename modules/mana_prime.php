<?php
	session_start();
	if (isset($_SESSION['uname']))
	{
		include("../source/mana.php");
	}
	else
	{
		include("../login.php");
		echo('<div class=block1><h1>Login required for manachadamy</h1></div>');
	}
?>
