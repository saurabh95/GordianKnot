<?php include_once 'include.php'; ?><!DOCTYPE html>
<html>
<head>
  <title>Scoreboard | Gordian Knot</title>
  <link rel="stylesheet" href="<?php echo $base_url; ?>styles/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>styles/bootstrap-responsive.min.css">
  <?php include_once 'includer.php'; ?>
<style>
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
<?php include_once 'navbar.php';?>
<div class="container">
<?php include_once 'ranklist2.php'; ?>
</div>
</div>
<div class="footer-wrapper">
<?php include_once 'footer.php'; ?>
</div>
</body>
</html>
