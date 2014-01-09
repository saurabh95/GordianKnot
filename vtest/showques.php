<?php
class showques {
function show(qno,qlevel)   { 
//$qlevel=$_GET['qlevel'];
	$hostname_localhost ="localhost";
	$database_localhost ="gordian_beta";
	$username_localhost ="gordian_beta";
	$password_localhost ="gordianknot!@#";
	$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
	or
	trigger_error(mysql_error(),E_USER_ERROR);
	mysql_select_db($database_localhost, $con);

	$solved=array();
	$level=1;
	for($level=1;$level<=5;$level++)
	{
		$query_search1="select * from qsolved where sbyuser='".$_SESSION['username']."' and qlevel=".$level.";";
		$query_exec1 = mysql_query($query_search1) or die(mysql_error());
		$rows=mysql_num_rows($query_exec1);
		//echo $rows;
		$solved[$level]=$rows;
	}
	for($level=1;$level<$qlevel;$level++)
	{
		if($solved[$level]<3)			//3 is the number of questions whic the user needs to solve to proceed to the next level
			break;
	}
	if($level!=$qlevel)
	{
		echo "<div><h2>You are not qualified to enter this level</h2></div>";
	}
	else
	{



		$query_search = "select * from ques where qlevel = '".$qlevel."' ;";
		//echo $query_search;
		$query_exec = mysql_query($query_search) or die(mysql_error());
		$questions=array();
		while($res = mysql_fetch_assoc($query_exec)) {
			$questions[]=$res['qstatement'];
			//	echo $res['qstatement'];
		}
		$rows = mysql_num_rows($query_exec);
		for($i=1;$i<=$rows;$i++)
		{
//			echo "<div class='".$qlevel."' id='".$i."'>Q".$i."  ".$questions[$i-1]."<br/><br/>";
		//	echo "<input type=\"text\" placeholder=\"Enter your answer here\">";
		}
		//echo "<br/><input type=\"submit\" value=\"Submit\"><br/></div>";
		//echo $query_exec;
		
	}
	}
}
?>
