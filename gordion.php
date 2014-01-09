<?php
$hostname_localhost ="localhost";
$database_localhost ="Bizcolab";
$username_localhost ="root";
$password_localhost ="knowing42";
$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_localhost, $con);

$username = $_POST['username'];
$password = $_POST['password'];

$query_search = "select * from userinfo where username = '".$username."' AND password = '".$password. "'";
$query_exec = mysql_query($query_search) or die(mysql_error());
$rows = mysql_num_rows($query_exec);
//echo $rows;
 if($rows == 0) { 
 echo "No Such User Found"; 
 }
 else  {
	echo "User Found"; 
 }
?>
