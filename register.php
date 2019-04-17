<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<title>
			coolstufz.net
		</title>
		
		<link rel="stylesheet" type="text/css" href="style.css">
		<?php require("source/add.php");?>
	
	</head>
<body>
	<?php include("banner.php"); ?>
	<?php echo(file_get_contents("link.txt")); ?>
		<div class="block1">
			<h1>Register</h1>
			<h2><?php main(); ?></h2>
			<form action="/register.php" method="post">
			<input type="text" name="username" class="input" value="username"></br>
			<input type="password" name="password" class="input" value="password"></br>
			<input type="submit" value="submit" class="submit">
		</div>
		<br>
	</form>
</body>
</html>
