<?php include_once 'include.php'; ?><!DOCTYPE html>
<html>
<head>
<title>Gordion-Knot</title>
<link rel="stylesheet" href="<?php echo $base_url; ?>styles/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>styles/bootstrap-responsive.min.css">
<?php include_once 'includer.php'; ?>
<style>
body {
  color: #ddd;
}
textarea {
  resize: none;
}
p {
  margin: 0 0 10px;
}
</style>
</head>
<body>
<div class="content-wrapper">
<?php include_once 'masthead.php'; ?>
<div class="container">
<?php include_once 'navbar.php'; ?>
</div>
<div class="container">
<?php
session_start();
if($logged_in!=true)
{
	header('Location: index');
  exit();
}
$username=$user;
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
$query_search="select * from qsolved where sbyuser='".$user."' and qlevel=".$level.";";
$query_exec = mysql_query($query_search) or die(mysql_error());
$rows=mysql_num_rows($query_exec);
//echo $rows;
$solved[$level]=$rows;
}
for($level=1;$level<=5;$level++)
{
}
?>
<div id="output">
<?php
if(!isset($_GET['qlevel']))   {
  header('Location: dash');
  exit();
}
else {	
		if(!isset($_GET['qno'])) {
         //       echo "Welcome to Level : ".$_GET['qlevel']."<br/>";
         //       echo "The Description about the Level<br/>";
         //       echo "Please select a Question !";
        }
	else    {
		require 'ShowComments.php';
		require 'ShowQues.php';

		if($_GET['qno']>5 or $_GET['qlevel']>8)
			 header('Location: main');
		echo<<<_END
    <div class="tabbable tabs-left">
    <ul class="nav nav-tabs">
_END;
    for ($i=1;$i<=5;++$i)
      echo '<li' .  (($i == $_GET[qno]) ? ' class="active" ' : '') . '><a href="?qlevel=' . $_GET[qlevel] . '&qno= ' . $i  . '">Question ' . $i  . '</a></li>';
}
}?>
  </ul>
    <div class="tab-content">
    <div class="tab-pane active">
		
		<?php 
    echo "<h1>Level ". $_GET['qlevel'] . "</h1><h2>Question ".$_GET['qno']."</h2>";
    $question=new showques();
    $question->show($_GET['qno'],$_GET['qlevel'],$user);
    ?>
    </div>
    </div>
    </div>
</div>
</div>
</div>
<div class="footer-wrapper">
<?php include_once 'footer.php'; ?></div>
</body>
</html>
