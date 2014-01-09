<?php

$dest = '/~gordian_beta/test/';
$scoreboard = '/~gordian_beta/test/scoreboard/';
//$base_url = 'http://felicity.iiit.ac.in/threads/';

//$now = new DateTime();

//header("Location: $dest");
if ($_SERVER['REQUEST_URI'] != $dest && $_SERVER['REQUEST_URI'] != $scoreboard )
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
        <!-- <span class="logo"><a href="<?php echo $base_url; ?>"><img src="<?php echo $base_url; ?>images/logo.png" alt="Threads Logo"></a></span> -->
        <span class="logo"><a href="http://felicity.iiit.ac.in/threads/"><img src="<?php echo $base_url; ?>images/logo.png" alt="Threads Logo"></a></span>

            <?php if(! $logged_in): ?>
    
        <span class="lgsu">
	<a id="loginButton" class="invert" href="javascript:void(0)" onclick="togglelogin()">Log in</a> 
          / 
          <a class="invert" href="http://felicity.iiit.ac.in/threads/register">Register</a>
		  </span>
		<div class="loginbox out">
		<?php $url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
		<iframe src="http://felicity.iiit.ac.in/cas/login?service=http://felicity.iiit.ac.in/threads/refresh.php" height="175"></iframe>
    <div><a href='/threads/forgot_password'>Forgot username/password?</a></div>
		</div>
			  <?php else: ?>
	  <?php $desti = $_SERVER['REQUEST_URI'];
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
     $url = str_replace("index.php","",$url);
      ?>
    <span class="lgsuin" style="font-size: 0.9em;"><?php echo 'Welcome, ' . $user . '. <a href="http://felicity.iiit.ac.in/threads/logout.php?destination=' . $url  .'">Logout</a>' . '<a href="http://felicity.iiit.ac.in/threads/change_passwd/">, Change Password</a>' ; ?></span>
          <?php endif; ?>
        <span class="links">
          <a href="http://felicity.iiit.ac.in/threads/events">Events</a>
          <a href="http://felicity.iiit.ac.in/threads/sponsors">Sponsors</a>
          <a href="http://felicity.iiit.ac.in/threads/contact">Contact Us</a>
        </span>
</div>
