<?php
include 'vlogin.php';
if(strcmp($user,"Admin")!=0)
   header('Location: index');
?>
<form action="admin1.php" method="POST" enctype="multipart/form-data">
	Question Number : <input name="qno" type="text"/><br/>
	Level : <input name="qlevel" type="text"/><br/>
	Question Statement : <textarea name="qstatement"></textarea><br/>
	Answer : <textarea name="ans" type="text" maxlength="3200"></textarea><br/>
  Upload Image <input type="file" name="image" />
	<input type="Submit" value="Submit">
</form>



<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
Wanna Check Comments
<a href="checkcomments">Check Comments</a>
