<?php
#class checkcomments{
#	function show() {
		//echo "This is coming from ShowComments.php";
//		$qno=$_GET['qno'];
//		$qlevel=$_GET['qlevel'];
		include_once 'vlogin.php';
		if($user!="Admin")
			header('Location: main');
		$hostname_localhost ="localhost";
		$database_localhost ="gordian_beta";
		$username_localhost ="gordian_beta";
		$password_localhost ="gordianknot!@#";
		$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
		or
		trigger_error(mysql_error(),E_USER_ERROR);
		mysql_select_db($database_localhost, $con);
		$query_search = "select * from comments where admin_flag=0 order by cdate , ctime;";
		$query_exec = mysql_query($query_search) or die(mysql_error());
		$comments=array();
		$ctr=0;
		echo "<table border='1' width='1000'>";
		echo "<thead><tr><th>Validate</th><th>Username</th><th>Question Number<th>Question Level</th></th><th>Comment</th></tr></thead>";
		while($res = mysql_fetch_assoc($query_exec)) {
				echo "<form action='confirm.php' method='post'> ";
				echo "<input type='hidden' name ='username' value='".$res['username']."'>";
				echo "<input type='hidden' name ='qno' value='".$res['qno']."'>";
				echo "<input type='hidden' name ='qlevel' value='".$res['qlevel']."'>";
				echo "<input type='hidden' name ='cstring' value='".$res['cstring']."'>";
				echo "<tr>";
				echo "<td><button>Validate</button></td>";
           		echo "<td>".$res['username']."</td>";
	   			echo "<td>".$res['qno']."</td>";
	   			echo "<td>".$res['qlevel']."</td>";
           		echo "<td>".$res['cstring']."</td>";
			echo "</form>";
			echo "</tr>";
       		}
			echo "</table>";
		//echo $query_search;
#	}
#}
?>

