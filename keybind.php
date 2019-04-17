<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<title>
			coolstufz.net
		</title>
		
		<link rel="stylesheet" type="text/css" href="/style.css">

	
	</head>
<body>
<?php include("banner.php"); ?>
<?php echo (file_get_contents("link.txt"));?>
	<div class="block1">
		<form>
		<input type="radio" name="1val" class="input_k">up</input> <p class="output" style="display:inline;">w</p><br>
		<input type="radio" name="1val" class="input_k">down</input> <p class="output" style="display:inline;">s</p></br>
		<input type="radio" name="1val" class="input_k">left</input> <p class="output" style="display:inline;">a</p></br>
		<input type="radio" name="1val" class="input_k">right</input> <p class="output" style="display:inline;">d</p></br>
		</form>	
		<button class="submit" onclick="update_keys();" >DONE!<button>
		
	</div>
<script>
var inputs = document.getElementsByClassName("input_k");
var outputs = document.getElementsByClassName("output");
var keyCodes = new Array(inputs.length);
document.onkeydown = function update_values(e) 
{
	for (var i = 0; i < inputs.length; i++)
	{
		if (inputs[i].checked)
		{
			outputs[i].innerHTML = e.key;
			keyCodes[i] = e.keyCode;
			alert(keyCodes[i]);
		}	
	}
}
function update_keys()
{
	var query = '/updatekeys.php?';
	for (var i = 0; i < keyCodes.length;i++)
	{
		if (keyCodes[i])
		{
			query+=i.toString() + '=' + keyCodes[i].toString();
			if (i != keyCodes.length - 1)
			{
				query+='&';
			}
		}
	}
	window.location=query;
}
</script>
</body>
</html>
