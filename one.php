<?php
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

function checkAllowed($inlevel)
{
  global $user;
  $qlevel=$inlevel;
  for($level=0;$level<=$qlevel;$level++)
  {   
    $query_search1="select * from qsolved where sbyuser='".$user."' and qlevel=".$level.";";
    $query_exec1 = mysql_query($query_search1) or die(mysql_error());
    $rows=mysql_num_rows($query_exec1);
    //echo $rows;
    $solved[$level]=$rows;
  }   
  /*$ctr=0;
  for($level=0;$level<=$qlevel;$level++)
  {   
    $ctr+=$solved[$level];
    if($ctr<3*($level+1))           
      break;
  }   */

  if($qlevel == 0)
    return $solved[$qlevel];

  else if($qlevel == 1)
  {
    if($solved[0] >= 3)
      return $solved[$qlevel];
    else
      return -1;
  }

  else
  {
    if($solved[$qlevel-1] + $solved[$qlevel-2] >= 6)
      return $solved[$qlevel];
    else
      return -1;
  }
}
