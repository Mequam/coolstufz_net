<html>
<head>
	<title>coolstufz.net</title>
	<link rel="stylesheet" type="text/css" href="/style.css">
	<?php require("../source/dice.php");?>
	<?php 
	function output($info)
	{echo('<p class="output" style="display:inline;">'.$info ."</p>");}
	?>
</head>
	<body>
<?php
		include("../banner.php");
		echo(file_get_contents("../link.txt"));
?>
		<div class="block1">
<?php
	if (!isset($_GET['name']))
	{	
	echo '<h1>rolls</h1>	
		<form class="across">
			<input type="text" name="name" value="name" class="input">
			<br> 
			<input type="text" name="race" value="race" class="input">
			<input type="text" name="class" value="class" class="input">
			<br>
		';
			$start='<select name="stat';
			$mid = '" class="across" id="';
			$end='">
			
				<option value="str" class="input">str</option>
				<option value="dex" class="input">dex</option>
				<option value="con" class="input">con</option>
				<option value="int" class="input">int</option>
				<option value="wis" class="input">wis</option>
				<option value="cha" class="input">cha</option>
				</select><br>';
	
			for ($i=0;$i<6;$i++)
			{
				$roll = roll(3,6);
				$_SESSION['roll'. $i] = $roll; 
				output((string)roll(3,6));
				echo $start . $i . $mid . $i . $end;
			}
	}
	?>	
		<input class="submit" type="submit" value="let's play!"> 
		</form>
		</div>
	</body>
</html>
