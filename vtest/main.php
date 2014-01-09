<html>
<head>
<title>Gordion-Knot</title>
<body style="margin:0;padding:0;">
</head>
<br/><br/>


<link rel="stylesheet" type="text/css" href="css/style.css">
<div id="levels">
<form method="GET" action='' id='form1' name='form1'>
<button name="qlevel" value="1">Level 1</button>
<button name="qlevel" value="2">Level 2</button>
<button name="qlevel" value="3">Level 3</button>
<button name="qlevel" value="4">Level 4</button>
<button name="qlevel" value="5">Level 5</button>
</form>
</div>





<?php
include_once 'vlogin.php';
session_start();
/*if(!isset($_SESSION['username']))
{
 header('Location: index.html');
}*/
if($logged_in!=true)
{
	header('Location: index.php');
}
else
{
//	echo $user."is logged in";
}
//$username=$_SESSION['username'];
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
for($level=1;$level<=5;$level++)
{
$query_search="select * from qsolved where sbyuser='".$user."' and qlevel=".$level.";";
$query_exec = mysql_query($query_search) or die(mysql_error());
$rows=mysql_num_rows($query_exec);
//echo $rows;
$solved[$level]=$rows;
}
for($level=1;$level<=5;$level++)
{
//echo "<div id='s".$level."'>".$solved[$level]."</div>"; //do it hidden while using jquery 
//echo "<br/>";
}
?>


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<div id="output">
<?php
if(!isset($_GET['qlevel']))   {
	echo "<center><h2>Click on the level you want to start with</h2></center>";
}
else {	
	echo "<div id='menu' style='height:100%;width:20%;float:left;'>";
	echo "<form id='form2' method='get' action='' name='form2'>";
	echo  "<input type='hidden' name='qlevel' value='".$_GET['qlevel']."'/>";
	for($i=1;$i<=5;$i++)     {
		echo "<button name='qno' value=$i>Question $i</button><br/>";
	}
	echo "</form>";
	echo "</div>";
	if(!isset($_GET['qno'])) {
                echo "Welcome to Level : ".$_GET['qlevel']."<br/>";
                echo "The Description about the Level<br/>";
                echo "Please select a Question !";
        }
	else    {
		require 'ShowComments.php';
		require 'ShowQues.php';
		echo "<b>Question No : ".$_GET['qno']."</b><br/>"."Description of Question";
		$question=new showques();
		$question->show($_GET['qno'],$_GET['qlevel']);
		if(isset($_GET['check'])){
                                if((int)$_GET['check']==0){
                                        echo "<br><b>Wrong Answer</b><br>";        
                                }
				else
					echo "<br><b>Correct Answer</b><br>";
                        }
		$query_search="select * from qsolved where sbyuser='".$user."' and qlevel='".$_GET['qlevel']."' and qno='".$_GET['qno']."';";
		//echo $query_search;
		$query_exec = mysql_query($query_search) or die(mysql_error());
		$rows=mysql_num_rows($query_exec);
		if((int)$rows==1)
			echo "<b>You have already solved the Question</b><br/><br/>";
		else {
			echo "<form id='form3' name='form3' method='post' action='checkcorrect.php'>";
			echo "<input type='text' name='ans' placeholder='Enter your answer here'>";
			echo "<input type='hidden' name='qno' value='".$_GET['qno']."'>".
                        	"<input type='hidden' name='qlevel' value='".$_GET['qlevel']."'>";
			echo "<input type='hidden' name='purl' value='".$_SERVER['REQUEST_URI']."'/>";
			echo "<br/><input type=\"submit\" value=\"Submit\"><br/></div>";
			echo "</form>";
		}
		$comments=new ShowComments();
		$comments->show($_GET['qno'],$_GET['qlevel']);
		echo "<br/><br/><b>Add Comment</b>";
		echo "<form action='comments.php' id='form2' name='form2' method='post'>".
			"<input type='hidden' name='qno' value='".$_GET['qno']."'>".
			"<input type='hidden' name='qlevel' value='".$_GET['qlevel']."'>";
		echo "<input type='hidden' name='purl' value='".$_SERVER['REQUEST_URI']."'/>";
		echo "<textarea name='cstring' placeholder='Add Comment here' rows='4' cols='50'></textarea>";
		echo "<br/><button>Submit</button>";
		echo "</form>";
	}
}
?>
</div>
</div>
</body>
</html>






































