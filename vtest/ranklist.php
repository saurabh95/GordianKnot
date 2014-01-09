<?php
class ranklist {
function show()   { 
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
	$query_search1="select SUM(stime) as totaltime, count(*) as questionsolved, sbyuser from qsolved GROUP BY sbyuser ORDER BY count(*) DESC,stime";
	$query_exec1 = mysql_query($query_search1) or die(mysql_error());
	$rows=mysql_num_rows($query_exec1);
//	echo $rows;



		$query_search = "select * from ques where qlevel = '".$qlevel."' ;";
		//echo $query_search;
		$query_exec = mysql_query($query_search) or die(mysql_error());
		$questions=array();
		echo "<table>";
		echo "<thead><tr><th>Username&nbsp;&nbsp;  </th><th>Questions Solved</th><th>Total Time(in seconds)</th></tr></thead>";
		while($res = mysql_fetch_assoc($query_exec1)) {
//			$questions[]=$res['qstatement'];
			echo "<tr>";
			echo "<td>".$res['sbyuser']."</td>";
		//	echo "<br/>";
			echo "<td>".$res['questionsolved']."</td>";
			echo "<td>".$res['totaltime']."</td>";
		//	echo "<br/><br/>";
			echo "</tr>";
			//	echo $res['qstatement'];
		}
		echo "</table>";
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
?>
<?
	$ranks= new ranklist();
	$ranks->show();
?>
