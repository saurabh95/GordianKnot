<?php	

$host = '10.4.3.65';
$user = 'Users';
$pass = '!us3R!@#';
$con = mysql_connect($host, $user, $pass);
if(!$con)
{
	die("Could not connect: " . mysql_error());    
}
mysql_select_db("Users", $con) or die("Could not use db" . mysql_error());

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


if(isset($_POST['Submit']))
{	
	$errors = array();
	//print_r($_POST);
	//echo "Hello2, 169<br />";
	//print_r($_POST);
	$nameX = "/^[-'a-zA-Z]{1,64}$/i";
	$emailX = "/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i";
	$unameX="/^[a-zA-Z0-9]{1,64}$/i";
	$numberX="/^[0-9]*$/";
	$zipX = "/^[-a-zA-Z0-9]{3,10}$/";

	//print_r($_SESSION);
	//print_r($_POST);

	if(session_id() == '' || !isset($_SESSION)) {
		session_start();
	}

	$_SESSION['input'] = array();
	$first_name	= ($_POST['first_name']);

	$_SESSION['input']['fname'] = $first_name;
	if(!preg_match($nameX, $first_name))
		$errors[] = "Names can only contain alphabets, dashes (-) and apostrophes (') and must be less than 64 characters long.";
}


$user_name = cleanInput($user_name);
?>
