<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<title>
			coolstufz.net
		</title>
		
		<link rel="stylesheet" type="text/css" href="/style.css">
		<?php require("source/add.php");?>
	
	</head>
<body>
<?php include("banner.php");?>
<?php echo (file_get_contents("link.txt"));?>
	<div class="block1">
<?php
	$uname = $_POST['username'];
	$pass = $_POST['password'];
	if (isset($uname) and isset($pass))
	{
		$conn = pg_connect("host=localhost dbname=powsite user=postgres");
		$pass = hash("sha256",$pass);
		//I dont trust this very much
		if (white_l($uname) == 1 and isset($pass))
		{
			$q_r = pg_query($conn,"SELECT pass FROM users WHERE uname='" . $uname . "'");
			$fetched=pg_fetch_array($q_r);
			if ($pass == $fetched[0])
			{
				echo "<h1> Welcome to coolstufz.net, <b>" . $uname . "</b>!</h1>";
				session_start();
				$_SESSION['uname']=$uname;
			}
			else
			{
				echo "<h1>YOU SHALL NOT PASS!</h1><p>username or password invalid</p>";
			}

		}
		else
		{
			// username contains invalid charicters
			echo("username contains invalid charicters!");
		}
	}	
	else
	{
			//we dont have a username and password
			echo("<h1>username and password are required fields</h1>");
	}
?>
	<form method="post">
		<input type="text" name="username" value="username" class="input"><br>
		<input type="password" name="password" value="password" class="input"><br>
		<input type="submit" value="login" class="input">
	</form>
	</div>
</body>
</html>
