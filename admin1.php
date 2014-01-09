<?php
include 'vlogin.php';
echo "User ".$user;
if(strcmp($user,"Admin")!=0)
	header('Location: index');
$qno=$_POST['qno'];
$qlevel=$_POST['qlevel'];
$qstatement=$_POST['qstatement'];
$ans=$_POST['ans'];
echo "<br/>";
//echo $_FILES['image']['type'];//file_get_contents($_POST['image']);
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
echo "<br/>";
$hostname_localhost ="localhost";
$database_localhost ="gordian_beta";
$username_localhost ="gordian_beta";
$password_localhost ="gordianknot!@#";
$con = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_localhost, $con);
$query_search = "select * from ques where qno=".$qno." and qlevel = ".$qlevel.";";
echo $query_search."<br/>";
$query_exec = mysql_query($query_search) or die(mysql_error());
$rows=mysql_num_rows($query_exec);
if($rows==0)
{
  echo $qno."<br />";  
  echo $qlevel."<br />";  
  echo $qstatement."<br />";  
  echo $ans."<br />";  
  echo $image."<br />";  
	$query_search = "insert into ques values ('$qno', '$qlevel', '$qstatement', '$ans', '$image')";
	echo $query_search."<br/>";
	$query_exec = mysql_query($query_search) or die(mysql_error());
}
else
{
	$query_search = "update ques set qstatement='" .$qstatement. "',ans='" .$ans. "',image='".$image ."'where qno = ".$qno." and qlevel = ".$qlevel.";";
	echo $query_search."<br/>";
	$query_exec = mysql_query($query_search) or die(mysql_error());
}
?>
