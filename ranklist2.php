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
	$query_search1="select count(*) as questionsolved, sbyuser from qsolved where sbyuser!='Admin' GROUP BY sbyuser ORDER BY count(*) DESC, MAX(CONCAT(DATE(sdate),stime))";
	$query_exec1 = mysql_query($query_search1) or die(mysql_error());
	$rows=mysql_num_rows($query_exec1);
//	echo $rows;


	$host = '10.4.3.65';
	$user = 'Users';
	$pass = '!us3R!@#';
	$con1 = mysql_connect($host, $user, $pass);
	if(!$con1)
	{
		    die("Could not connect: " . mysql_error());
	}
	mysql_select_db("Users", $con1) or die("Could not use db" . mysql_error());

		echo '<table class="table table-striped table-hover">';
		echo "<thead><tr><th>Rank</th><th>Username&nbsp;&nbsp;  <th>Full Name</th></th><th>Questions Solved</th></tr></thead>";
		$rank=0;
		while($res = mysql_fetch_assoc($query_exec1)) {
//			$questions[]=$res['qstatement'];
			$rank++;
			echo "<tr>";
			echo "<td>".$rank."</td>";
			echo "<td>".$res['sbyuser']."</td>";
			$query_search = "select first_name,last_name from info where username='".$res['sbyuser']."';";
			$query_exec = mysql_query($query_search) or die(mysql_error());
			$name=mysql_fetch_assoc($query_exec);
			echo "<td>".$name['first_name']."  ".$name['last_name']."</td>";
			echo "<td>".$res['questionsolved']."</td>";
			echo "<td>".$res['sdate']." ".$res['totaltime']."</td>";
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
