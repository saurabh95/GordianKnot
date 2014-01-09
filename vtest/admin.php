<?php
$qno=$_POST['qno'];
$qlevel=$_POST['qlevel'];
$qstatement=$_POST['qstatement'];
$ans=$_POST['ans'];
$hostname_localhost ="localhost";
$database_localhost ="gordian_beta";
$username_localhost ="gordian_beta";
$password_localhost ="gordianknot!@#";
$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_localhost, $con);
$query_search = "insert into ques values ("  .$qno. "," .$qlevel. ",'" .$qstatement. "','" .$ans. "');";
$query_exec = mysql_query($query_search) or die(mysql_error());
?>
