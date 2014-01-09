<?php
include_once 'vlogin.php';
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

	function cleanInput($input) {
		$output = str_replace('/', '&#x2F;', $input);
		$output = htmlentities($output, ENT_QUOTES, 'UTF-8');

		return $output;
	}

function sanitize($input) {
	if (is_array($input)) {
		foreach($input as $var=>$val) {
			$output[$var] = sanitize($val);
		}
	}
	else {
		if (get_magic_quotes_gpc()) {
			$input = stripslashes($input);
		}
		$input  = cleanInput($input);
		$output = mysql_real_escape_string($input);
	}
	return $output; 
}   

if(!isset($_POST['submit']))
{
	header('Location: main');
}

$purl=$_POST['purl'];
$qno=$_POST['qno'];
$qlevel=$_POST['qlevel'];
$username=sanitize($user);
$cstring=sanitize($_POST['cstring']);
$time=getdate();
$time=$time['hours'].":".$time['minutes'].":".$time['seconds'];
$time=(string)$time;
$date= time();
$date=date('Y/m/d',$date);
$date=(string)$date;


$query_search = "insert into comments values (" .$qno. "," .$qlevel. ",'" .$date. "','" .$time. "','".$cstring."','".$username."',0);";
$query_exec = mysql_query($query_search) or die(mysql_error());

//echo $query_search;
header('Location: '.$purl);
?>

