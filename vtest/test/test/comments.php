<?php
include_once 'vlogin.php';
session_start();
if($logged_in!=true)
{
 header('Location: index.php');
}
$purl=$_POST['purl'];
$qno=$_POST['qno'];
$qlevel=$_POST['qlevel'];
$username=$user;
$cstring=$_POST['cstring'];
$time=getdate();
$time=$time['hours'].":".$time['minutes'].":".$time['seconds'];
$time=(string)$time;
$date= time();
$date=date('Y/m/d',$date);
$date=(string)$date;
$hostname_localhost ="localhost";
$database_localhost ="gordian_beta";
$username_localhost ="gordian_beta";
$password_localhost ="gordianknot!@#";
$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_localhost, $con);

$query_search = "insert into comments values (" .$qno. "," .$qlevel. ",'" .$date. "','" .$time. "','".$cstring."','".$username."');";
$query_exec = mysql_query($query_search) or die(mysql_error());

//echo $query_search;
header('Location: '.$purl);
?>

