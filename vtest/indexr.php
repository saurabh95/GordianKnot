<?php
session_start();
$_SESSION['username']=$_POST['username'];
if(!isset($_SESSION['username']))
{
 header('Location: http://localhost/gordion/index.html');
}
$username=$_POST['username'];
$password=$_POST['password'];
$hostname_localhost ="localhost";
$database_localhost ="gordian_beta";
$username_localhost ="gordian_beta";
$password_localhost ="gordianknot!@#";
$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_localhost, $con);
$query_search = "select * from user where username = '".$username."' AND password = '".$password. "';";
$query_exec = mysql_query($query_search) or die(mysql_error());
$rows = mysql_num_rows($query_exec);
if($rows>0)
{
header('Location: main.php');
exit();
}
else
{
header('Location: http://localhost/gordion/index.html');
exit();
}

?>
