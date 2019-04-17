<?php
//function and global definitions

	function c_log($str)
	{
		echo('<script>console.log("' . $str . '");</script>');
	}

	
	$GLOBALS['delimit']=Array('a','-','*','/','d');
	function roll($x,$y)
	{
		$ret_val=0;
		for ($i=0;$i<$x;$i++)
		{
			$ret_val+=mt_rand(1,$y);
		}
		return $ret_val;
	}
	function choose_opp($x,$y,$d)
	{
		switch($d)
		{
			case 'd':
				return roll(parse($x),parse($y));
			case '/':
				return parse($x)/parse($y);
			case '*':
				return parse($x)*parse($y);
			case '-':
				return parse($x)-parse($y);
			case 'a':
				return parse($x)+parse($y);
		}
	}
	function parse($roll)
	{
		//this is the array that we store the values into
		$ret_vals=Array();
		//look for any of our delimters, and if we find them set up the arguments for the next iteration of the function
		for ($i=0;$i < sizeof($GLOBALS['delimit']);$i++)
		{
			for ($j=0;$j<strlen($roll);$j++)
			{
				if ($roll[$j]==$GLOBALS['delimit'][$i])
				{
					//echo("FOUND " . $GLOBALS['delimit'][$i] . "!<br>");
					$const=False;
					$ret_vals=explode($GLOBALS['delimit'][$i],$roll,2);
				       	return choose_opp($ret_vals[0],$ret_vals[1],$GLOBALS['delimit'][$i]);
				}
			}
		}
		//we did not find a delimiter in our string, so we had to have found a constant
		//exit the recursion sequence
		return (float)$roll;
	}

?>
