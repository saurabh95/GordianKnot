<html>
<head>
<title>Gordion-Knot</title>
<link href="styles/bootstrap.min.css" rel="stylesheet"> 
<?php include_once 'includer.php'; ?>
<script src="js/tabs.min.js"></script>
<script>
$(document).ready(function() {
	$('a[href=#tab2]').click();
	$('a[href=#tab1]').click();
});
</script>
<style>
.tab-pane > div > a,
.tab-pane > div > span {
	display: inline-block;
	font-size: 1.5em;
	line-height: 2em;
}
li.denied span {
	color: #ccc;
	margin-right: -1px;
	margin-bottom: 3px;
	padding: 8px 12px;
	line-height: 20px;
	border: 1px solid transparent;
}
</style>
</head>
<body>

<?php include_once 'masthead.php'; ?>
<h1>Dashboard</h1>
    <div class="tabbable tabs-left">
	
    	<ul class="nav nav-tabs">
    		<li class="active"><a href="#tab1" data-toggle="tab">Level 1</a></li>
    		<li><a href="#tab2" data-toggle="tab">Level 2</a></li>
    		<li class="denied"><span>Level 3</span></li>
		</ul>
		<div class="tab-content">
		
		<div class="tab-pane active fade" id="tab1">
				<h2>Level 1</h2>
				<?php 
				for ($i=1;$i<5;++$i)
				echo '    <div><a href="main.php?qlevel=1&qno="' + $i + '>Question 1</a></div>'; 
				
				
				?>
			<!--	
				<div><a href="main.php?qlevel=1&qno=1">Question 1</a></div>
				<div><a href="main.php?qlevel=1&qno=2">Question 2</a></div>
				<div><a href="main.php?qlevel=1&qno=3">Question 3</a></div>
				<div><a href="main.php?qlevel=1&qno=4">Question 4</a></div>
				<div><a href="main.php?qlevel=1&qno=5">Question 5</a></div>
			-->
			</div>

		
		<div class="tab-pane active fade" id="tab2">
				<h2>Level 2</h2>
				<div><a href="main.php?qlevel=2&qno=1">Question 1</a></div>
				<div><a href="main.php?qlevel=2&qno=2">Question 2</a></div>
				<div><a href="main.php?qlevel=2&qno=3">Question 3</a></div>
				<div><a href="main.php?qlevel=2&qno=4">Question 4</a></div>
				<div><a href="main.php?qlevel=2&qno=5">Question 5</a></div>
			</div>
			<div class="tab-pane fade" id="tab2">
				<h2>Level 2</h2>
			</div>
		</div>

	</div>
</div>
</body>
</html>
