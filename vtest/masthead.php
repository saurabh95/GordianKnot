<?php

$dest = '/~gordian_beta/test/';

//$now = new DateTime();
if ($_SERVER['REQUEST_URI'] != $dest )
if (false)//time() <  1388831400) 
	{
		header("Location: $dest");
		exit();
	}
include_once 'include.php';
include_once 'vlogin.php';
?>
  
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-46377629-1']);
   _gaq.push(['_setCookiePath', '/threads']);  
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

    </script>
      <div class="masthead dark">
        <span class="logo"><a href="<?php echo $base_url; ?>"><img src="<?php echo $base_url; ?>images/logo.png" alt="Threads Logo"></a></span>

            <?php if(! $logged_in): ?>
    
        <span class="lgsu">
	<a id="loginButton" class="invert" href="javascript:void(0)" onclick="togglelogin()">Log in</a> 
          / 
          <a class="invert" href="<?php echo $base_url; ?>register">Register</a>
		  </span>
		<div class="loginbox out">
		<?php $url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
		<iframe src="http://felicity.iiit.ac.in/cas/login?service=http://felicity.iiit.ac.in/threads/refresh.php" height="175"></iframe>
		</div>
			  <?php else: ?>
	  <?php $desti = $_SERVER['REQUEST_URI'];
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
     $url = str_replace("index.php","",$url);
      ?>
    <span class="lgsuin"><?php echo 'Welcome, ' . $user . '. <a href="http://felicity.iiit.ac.in/threads/logout.php?destination=' . $url  .'">Logout</a>' ; ?></span>
          <?php endif; ?>
        <span class="links">
          <a href="<?php echo $base_url; ?>events">Events</a>
          <a href="<?php echo $base_url; ?>sponsors">Sponsors</a>
          <a href="<?php echo $base_url; ?>contact">Contact Us</a>
        </span>
</div>
