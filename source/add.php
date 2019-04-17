
<?php
function charequal($str1,$str2)
{
	//this function checks to see if two strings are equal IGNORING THE CHARACTERS REMANING IN STR1
	if(strlen($str1) < strlen($str2))
	{
		return False;
	}
	for ($i=0;$i<strlen($str2);$i++)
	{
		if ($str1[$i] != $str2[$i]){return False;}
	}
	return True;
}
function white_l($str,$list="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789")
{
	for ($i=0;$i<strlen($str);$i++)
	{
		for ($j=0;$j<strlen($list);$j++)
		{
			if ($str[$i]==$list[$j])
			{
				//there is an equal letter in the string we do not need to check this letter, so move on
				continue 2;
			}
		}
		//it made it out of the loop, so it has to contain a charicter that is not in our string
		return -1;
	}
	return 1;
}
function add_user($uname,$hash)
{
	if (white_l($uname) == -1){return -1;}

	//we should hypotheticaly never come to this point, but just in case someone figures out somthing funny
	if (white_l($hash) == -1){return -2;}
	$pgc = pg_connect("host=localhost dbname=powsite user=postgres");
	$q_r = pg_query($pgc,"SELECT uname,pass FROM users");
	
	$result = Array();	
	while ($result = pg_fetch_array($q_r))
	{
		//can we really tell them that that password exists tho?
		if ($result[1] == $hash)
		{
			return -3;
			//we cant use this password it already exists
		}		

		if ($result[0] == $uname)
		{
			return -3;
			//we cant use this username it already exists
		}
	}
	//it should be safe to add the uname and password to the db
	pg_query($pgc,"INSERT INTO users(uname,pass) VALUES('" . $uname . "','" . $hash . "')");
	return 1;
}

function main()
{
	$uname=$_POST['username'];
	$pass=$_POST['password'];
	$secret=$_POST['secret'];
	if (!isset($uname) or !isset($pass))
	{
		echo ("username and password are required fields");
		//run a routine that tells them to set their password
	}
	else if(isset($uname) and isset($pass))
	{
		$pass=hash("sha256",$pass);
		//the username and password are set
		switch(add_user($uname,$pass))
		{
			case -1:
				echo("username contains invalid charicters");
				break;
			case -2:
				echo("password contains invalid charicters");
				break;
			case -3:
				echo("username or password already exists");
				break;
			case 1:
				echo("username and password added sucessfully");
				break;


		}
	}
}
?>
