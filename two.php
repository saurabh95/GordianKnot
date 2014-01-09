<?php
include_once  'masthead.php';
session_start();
if($logged_in!=true)
{
	    header('Location: index');
}
$hostname_localhost ="localhost";
$database_localhost ="gordian_beta";
$username_localhost ="gordian_beta";
$password_localhost ="gordianknot!@#";
$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
    or  
trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_localhost, $con);

function checkSolved($l, $q)
{
global $user;
$query_search="select * from qsolved where sbyuser='" . $user . "' and qlevel='" .  $l . "' and qno = '" .$q . "';";
//echo $query_search;
$query_exec = mysql_query($query_search) or die(mysql_error());
$rows=mysql_num_rows($query_exec);
if($rows==1)
	return true;
else
	return false;
}
