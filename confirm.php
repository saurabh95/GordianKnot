<?php
include_once 'vlogin.php';
session_start();
if($logged_in!=true)
{
 header('Location: index');
}
$qno=$_POST['qno'];
$qlevel=$_POST['qlevel'];
$username=$_POST['username'];
$cstring=$_POST['cstring'];
$hostname_localhost ="localhost";
$database_localhost ="gordian_beta";
$username_localhost ="gordian_beta";
$password_localhost ="gordianknot!@#";
$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_localhost, $con);

$query_search = "update comments set admin_flag=1 where qno='".$qno."'and qlevel='".$qlevel."' and cstring='".$cstring."'and username='".$username."';";
$query_exec = mysql_query($query_search) or die(mysql_error());

//echo $query_search;
header('Location: checkcomments.php');
?>

