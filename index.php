<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<title>
			coolstufz.net
		</title>
		
		<link rel="stylesheet" type="text/css" href="style.css">

	
	</head>
<body>
<?php
  include("banner.php");
  echo (file_get_contents("link.txt"));
  //session_start();
?>
<div class="groupblock">
	<div class="block1">
	<h2>Message of the day</h2>
	<p>
	<?php
		echo(file_get_contents("m_o_d.txt"));
	?>
	</p>
	</div>
	<br>
<?php
	if (!isset($_SESSION['uname']))	
	{
	echo ('
	<div class="block1">
		<h1>login</h1>
	<form action="/login.php" method="post">
		<input type="text" name="username" class="input" value="username"></br>
		<input type="password" name="password" class="input" value="password"></br>
		<input type="submit" value="login" class="submit">
		<br>
	</form>
	</div>
	');
	}
?>
</div>
</body>
</html>
