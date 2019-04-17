<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<title>
			coolstufz.net
		</title>
		
		<link rel="stylesheet" type="text/css" href="style.css">

	
	</head>
<body>
<?php include("banner.php"); ?>
<?php echo (file_get_contents("link.txt"));?>
<?php
	$path='../users/' . $_SESSION['uname'] . '/prefs.txt';
	$file=fopen($path,"r+");
	$data=fgets($file);
	$splode = explode(' ',$data);
	$data = '';
	for ($i = 0;$i < count($splode);$i++)
	{
		if (isset($_GET[(string)$i]))
		{
			$splode[$i] = $_GET[(string)$i];
		}
		$data.=$splode[$i] . ' '; 
	}
	fseek($file,0);
	fwrite($file,$data);
	fclose($file);
	
?>
	<div class="block1">
	</div>
</body>
</html>
