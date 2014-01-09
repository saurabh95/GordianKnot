<?php
class ShowComments{
	function show() {
		//echo "This is coming from ShowComments.php";
		$qno=$_GET['qno'];
		$qlevel=$_GET['qlevel'];
		$hostname_localhost ="localhost";
		$database_localhost ="gordian_beta";
		$username_localhost ="gordian_beta";
		$password_localhost ="gordianknot!@#";
		$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
		or
		trigger_error(mysql_error(),E_USER_ERROR);
		mysql_select_db($database_localhost, $con);
		$query_search = "select * from comments where qno = '".$qno."' and qlevel='".$qlevel."'and admin_flag=1 order by cdate , ctime;";
		$query_exec = mysql_query($query_search) or die(mysql_error());
		$comments=array();
		$ctr=0;
		while($res = mysql_fetch_assoc($query_exec)) {
	   		if($ctr==0)
	   			echo "<br/><b>Comments</b><br/><br/>";
	   		$ctr=1;
           		$comments[]=$res['cstring'];
           		echo $res['username']." [ ";
	   		echo $res['cdate']."  ";
	   		echo $res['ctime']." ] : ";
           		echo $res['cstring'];
			echo "<br/>";
       		}
		//echo $query_search;
	}
}
?>

