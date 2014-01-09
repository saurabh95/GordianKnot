<html>
<head>
<title>Gordion-Knot</title>
<link href="styles/bootstrap.min.css" rel="stylesheet"> 
<link href="styles/bootstrap-responsive.min.css" rel="stylesheet"> 

<?php include_once 'includer.php'; ?>
<script src="js/tabs.min.js"></script>
<script>
$(document).ready(function() {
	$('a[href=#tab1]').click();
	$('a[href=#tab0]').click();
});
</script>
<style>
.qbar {
  padding: 0.5em;
  border-radius: 2px;
}
.solvedq {
  background-color: #028002;
  color: white;
}
.solvedq a {
  color: white;
  text-decoration: underline;
}
.tab-pane > div > a,
.tab-pane > div > span {
	display: inline-block;
	font-size: 1.5em;
	line-height: 2em;
}
li.denied span {
  display: inline-block;
	color: #ccc;
	margin-right: -1px;
	margin-bottom: 3px;
	padding: 8px 12px;
	line-height: 20px;
	border: 1px solid transparent;
}
.container {
	background-color: rgb(30,30,30);
	background-color: rgba(0,0,0,0.2);
	padding: 1em;
	border-radius: 4px;
}
</style>
</head>
<body>
<div class="content-wrapper">
<?php include_once 'masthead.php'; ?>
<?php include_once 'navbar.php'?>
<div class="container">
<h1>Dashboard</h1>
    <div class="tabbable tabs-left">
	
    	<ul class="nav nav-tabs">
			<?php
			include_once 'one.php';
      for ($i=0;$i<8;++$i)
			{
        $solved = checkAllowed($i);
    		if($solved != -1 )
        echo '<li><a href="#tab'. $i . '" data-toggle="tab">Level ' . $i . '&nbsp;&nbsp;&nbsp;('. $solved  .  '/5)</a></li>' . "\n";
			  else echo '<li class="denied"><span>Level ' . $i . '&nbsp; (0/5)</span></li> ';
      }
			?>
		</ul>
		<div class="tab-content">
				<?php
        include_once 'two.php';
				for ($l=0;$l<=8;++$l)
				{
				echo '<div class="tab-pane active fade" id="tab' . $l . '"><h2>Level ' . $l . '</h2>' . "\n";
      for ($q=1;$q<=5;++$q)
      {
        
        if (checkSolved($l,$q)) 
          echo '    <div>' . "\n" . '<a href="main.php?qlevel=' . $l  .  '&qno=' . $q . '">Question ' . $q . '</a><span style="color: green;">, solved.</span>';
        else
          echo '    <div class="">' . "\n" . '<a href="main.php?qlevel=' . $l  .  '&qno=' . $q . '">Question ' . $q . '</a>';
        echo '</div>'  . '<hr>' . "\n"; 
      }
      echo '</div>' . "\n";
      }
      ?>
	</div>
</div>
</div>
</div>
<div class="footer-wrapper">
<?php include_once 'footer.php'; ?> 
</div>
</body>
</html>
