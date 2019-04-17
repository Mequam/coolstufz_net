<html>
<head>
	<title>
		coolstufz.net
	</title>
	<link rel="stylesheet" type="text/css" href="/style.css">
	<?php require("../source/dice.php");?>
</head>
<body>
<?php include("../banner.php"); ?>
<?php echo (file_get_contents("../link.txt")); ?>
<div class="block1">
<form action="roll.php" method="get">
	<input type="text" name="roll" class="input" value="1d6"><br>
	<input type="submit" class="submit" value="ROLL!">
</form>
<div class="output" style="margin-left:45%;">
		<?php
		//the main rotine for the webpage
			if (!($_GET['roll']===NULL))
			{
				echo parse($_GET['roll']);
			}
	
		?>
	</div>
</div>
</body>
</html>
