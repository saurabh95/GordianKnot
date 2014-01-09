<?php
//include_once 'vlogin.php';
class ShowQues {
function show($qno,$qlevel,$user)   { 
//	echo $qno;
//	$qlevel=$_GET['qlevel'];
//	$qno=$_GET['qno'];
//	$user=$_GET['user'];
//	echo $qlevel;
//	echo $qno;
//	echo $user;

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
		$query_search1="select * from qsolved where sbyuser='".$user."' and qlevel=".$level.";";
		$query_exec1 = mysql_query($query_search1) or die(mysql_error());
		$rows=mysql_num_rows($query_exec1);
		//echo $rows;
		$solved[$level]=$rows;
	}
	$ctr=0;
	for($level=1;$level<$qlevel;$level++)
	{
		$ctr+=$solved[$level];
		if($ctr<3*$level)			//3 is the number of questions whic the user needs to solve to proceed to the next level
			break;
	}
	if($level!=$qlevel)
	{
		echo "<div><h2>You are not qualified to enter this level</h2></div>";
	}
	else
	{



		$query_search = "select * from ques where qlevel = '".$qlevel."' and qno = '".$qno."' ;";
		//echo $query_search;
		$query_exec = mysql_query($query_search) or die(mysql_error());
		$questions=array();
		while($res = mysql_fetch_assoc($query_exec)) {
			$questions[]=$res['qstatement'];
			//	echo $res['qstatement'];
		}
		$rows = mysql_num_rows($query_exec);
		for($i=1;$i<=$rows;$i++)
		{
			echo "<div class='".$qlevel."' id='".$i."'>Q".$i."  ".$questions[$i-1]."<br/><br/>";
	//		echo "<input type=\"text\" placeholder=\"Enter your answer here\"><br/><br/>";
		}
	//	echo "<br/><br/><input type=\"submit\" value=\"Submit\"><br/></div>";

		//echo $query_exec;
		 if(isset($_GET['check'])){
                                if((int)$_GET['check']==0){
                                        echo "<br><b>Wrong Answer</b><br>";
                                }
                                else
                                        echo "<br><b>Correct Answer</b><br>";
                        }
		 $query_search="select * from qsolved where sbyuser='".$user."' and qlevel='".$_GET['qlevel']."' and qno='".$_GET['qno']."';";
               // echo $query_search;
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
}
?>
