<?php
include_once 'vlogin.php';
session_start();
if($logged_in!=true)
{
 header('Location: index.php');
}
$qlevel=$_POST['qlevel'];
$qno=$_POST['qno'];
$ans=$_POST['ans'];
$purl=$_POST['purl'];
$username=$user;
$hostname_localhost ="localhost";
$database_localhost ="gordian_beta";
$username_localhost ="gordian_beta";
$password_localhost ="gordianknot!@#";
$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_localhost, $con);
$query_search="select ans from ques where qno='".$qno."' and qlevel='".$qlevel."';";
$query_exec = mysql_query($query_search) or die(mysql_error());
$res=mysql_fetch_assoc($query_exec);
$time=getdate();
$time=$time['hours'].":".$time['minutes'].":".$time['seconds'];
$time=(string)$time;
$date= time();
$date=date('Y/m/d',$date);
$date=(string)$date;
if($ans==$res['ans'])
{
$query_search = "insert into qsolved values (  '".$qno."' , '".$qlevel."' ,'" .$date. "','" .$time. "','".$username."');";
echo $query_search;
$query_exec = mysql_query($query_search) or die(mysql_error());
     header('Location: '.$purl."&check=1");
}
else
{
header('Location: '.$purl."&check=0");
//echo "incorrect";
}
?>
