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

$qlevel=sanitize($_POST['qlevel']);
$qno=sanitize($_POST['qno']);
$ans=sanitize($_POST['ans']);

$purl = 'http://felicity.iiit.ac.in/~gordian_beta/test/main.php?qlevel='.$qlevel.'&qno='.$qno;
/*if(!isset($_POST['submit']))
{
	header('Location: '.$purl."&check=0");
  exit();
}*/

if($ans == null || $ans == '') 
{
	header('Location: '.$purl."&check=0");
  exit();
}

$purl=$_POST['purl'];
$username=$user;
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
	//echo "hi ".$ans;
}
?>
