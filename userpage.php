<?php
include_once 'vlogin.php';
session_start();
if($logged_in!=true)
{
	header('Location: index.php');
}
$username=$user;
$host = '10.4.3.65';
$user = 'Users';
$pass = '!us3R!@#';
$con = mysql_connect($host, $user, $pass);
if(!$con)
{
	die("Could not connect: " . mysql_error());
}
mysql_select_db("Users", $con) or die("Could not use db" . mysql_error());

$query = "select first_name,last_name,country,email,affiliation from info where username='".$username."';";
##echo $query;
$query_exec = mysql_query($query) or die(mysql_error());
$res = mysql_fetch_assoc($query_exec);
echo "Name: ".$res['first_name']." ".$res['last_name']."<br/>";
echo "Nick: ".$username."<br/>";
echo "Affiliation: ".$res['affiliation']."<br/>";
$hostname_localhost ="localhost";
$database_localhost ="gordian_beta";
$username_localhost ="gordian_beta";
$password_localhost ="gordianknot!@#";
$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
	or
	trigger_error(mysql_error(),E_USER_ERROR);
	mysql_select_db($database_localhost, $con);
	$solved=array();
	$level=1;
	for($level=0;$level<8;$level++)
{
	$query_search1="select * from qsolved where sbyuser='".$username."' and qlevel=".$level.";";
	$query_exec1 = mysql_query($query_search1) or die(mysql_error());
	$rows=mysql_num_rows($query_exec1);
	//echo $rows;
	$solved[$level]=$rows;
}

echo "<br/>";
echo "No of questions solved in level 0: ".$solved[0]."<br/>";
echo "No of questions solved in level 1: ".$solved[1]."<br/>";
echo "No of questions solved in level 2: ".$solved[2]."<br/>";
echo "No of questions solved in level 3: ".$solved[3]."<br/>";
echo "No of questions solved in level 4: ".$solved[4]."<br/>";
echo "No of questions solved in level 5: ".$solved[5]."<br/>";
echo "No of questions solved in level 6: ".$solved[6]."<br/>";
echo "No of questions solved in level 7: ".$solved[7]."<br/>";
?>
