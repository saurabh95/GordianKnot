<!DOCTYPE html>
<html>
<head>
<title>Gordian Knot | Threads</title>
<?php include_once 'includer.php'; ?>
<style>
body {
	background-color: rgb(2,22,35);
}
h1, h2 {
	text-align: center;
	font-family: Electrolize, sans-serif;
	color: #ddd;
}
h1 {
	font-weight: bold;
	font-size: 5em;
	line-height: 1.25em;
	color: #f5f5f5;
	margin-top: 0.5em;
}
h2 {
	font-weight: lighter;
	font-size: 2.2em;
	line-height: 1.5em;
}
#notice{
	padding-top: 2em;
}
#timer {
	line-height: 1.5em;
}
.content {
	width: 80%;
	margin: auto;
}
.clearfix:after {
    content: ".";
    display: block;
    clear: both;
    visibility: hidden;
    line-height: 0;
    height: 0;
}

#counter {
	font-size: 1.3em;
	line-height: 1.2em;
}
#gotoarena:hover {
	color: #057cb8;
	text-decoration: underline;
}

#rules
{
	padding-bottom: 5%;
}

.rules-section {
}
h2#fold-rule {
        margin: 0;
        line-height: 1;
        display: inline-block;
    }
    #fold-rule {
    }
    #fold-arrow {
        float: right;
        margin: 0;
        line-height: 1;
        font-family: sans-serif;
        font-weight: light;
    }
    #fold-clicker {
       cursor: pointer;
    } 
    #fold-arrow img {
        height: 50px;
        width: 50px;
    }
    #rules {
        display: none;
	color: #ddd;      
  }
    #rules ol {
        padding: 10px 0 5px 0;
	font-family: 'Rokkitt', serif;
	font-size: 1.5em;
    }
    #rules li {
	margin: 5px;
	padding-bottom: 5px;
    }
     
</style>
<link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
<script type="text/javascript">
    $(document).ready(function() {
        $('#fold-clicker').click(function() {
           $('#rules').stop().slideToggle(); 
            if($('#fold-arrow img').attr('src') == 'http://felicity.iiit.ac.in/threads/images/down-arrow.png')
                $('#fold-arrow img').attr('src','http://felicity.iiit.ac.in/threads/images/up-arrow.png');
            else
                $('#fold-arrow img').attr('src', 'http://felicity.iiit.ac.in/threads/images/down-arrow.png');
           });
    });
  </script>

</head>
<body>
<div class="content-wrapper">
<?php
//include_once 'masthead.php';
?>
<div class="content">
<div id="notice">
<div style="float:right;" class="clearfix">
<?php include_once 'addevent.php'; ?>
</div>
<h1>Gordian Knot <?php  print_r($_SERVER['REQUEST_URI']);?></h1>
<h2 id="timer">Event has ended.</h2>
<h2><a href="http://felicity.iiit.ac.in/~gordian_beta/test/scoreboard">View Scoreboard</h2>
</div>

<div class="unit single span-grid rules-section">
                    <div id="fold-clicker">
                    <h2 id="fold-rule">Rules</h2>
                    <h2 class="down-arrow" id="fold-arrow"><a href="javascript:void(0)"><img alt="Down arrow" src="http://felicity.iiit.ac.in/threads/images/down-arrow.png"></a></h2>
                       <hr>
                    </div>
                        <div id="rules">
			  <ol>
			  	<li>This is an individual event.</li>
				<li>All problems will require mathematical reasoning and will be reducible to a simple method with which the answer can be computed. We assume the use of computers even though most of the problems can also be solved on pen &amp; paper with little more effort.</li>
				<li>Answers to all the problems will necessarily be a non-negative integer with no trailing zeros. Answer will not contain a decimal point or any other special character. Integers will contain no more than 3200 digits in all cases.</li>
				<li>There are 8 levels, containing 5 questions each. Level 0 is initially unlocked. To unlock Level 1, you need to solve at least 3 problems of Level 0. To unlock Level 2 and subsequent levels, you need to solve 6 problems out of 10 from previous two levels.</li>
				<li>There has to be a gap of at least 2 minutes between two consecutive submissions of the same problem.</li>
				<li>Each problem has equal weightage. Though there is no time penalty, tie-breaking will be done by the time of last successful submission.</li>
				<li>For any doubts/queries you can post comments, which will be moderated.</li>
				<li>Hints (if any) for a particular question will be released through comments by Admin.</li>
				<li>If you are facing any issues, you can contact us at gordianknot@felicity.iiit.ac.in.</li>
	
			  </ol>
                        </div>
                </div>

</div>
</div>
<?
include("footer.php");
?>

<script>
$(document).ready(function() {
  updateTime();
  setInterval(updateTime, 1000);
  if (window.location.hash == '#rules')
     $('#rules').show(); 
});

function updateTime()
{
  return;
  var d = new Date;
  
   var utc = d.getTime() + (d.getTimezoneOffset() * 60000);

    // create new Date object for different city
    // using supplied offset
    var nd = new Date(utc + (3600000*5.5));

  var now = nd;


  var start = new Date(2014,0,4,16,45,0);
  var end = new Date(2014,0,5,19,45,0);
  var state = '';
  var delta;
  if(now < start)
  {
    state = 'Event starts on 4th Jan \'14 at 1645 hours (IST).<br><a id="gotoarena" href="http://www.timeanddate.com/worldclock/fixedtime.html?msg=Gordian+Knot&iso=20140104T16&p1=771">Check in your time zone.</a><br>';
    delta = start - now;
  }
  else
  {
    state = 'We have added fresh problems.</br>The contest is about to end.</br>So, gear up!</br>Please login to enter the arena.</br><a id="gotoarena" href="http://felicity.iiit.ac.in/~gordian_beta/test/dash.php">Go to Arena!</a><br>Event ends on 5th Jan \'14 1945 hours (IST).<br> ';
    delta = end - now;
  }
  delta=Math.floor(delta/1000);
  var days = Math.floor(delta / 86400);
  var hours = Math.floor(delta / 3600) % 48;
  var minutes = Math.floor(delta / 60) % 60;
  var seconds = delta % 60;
  var display = (state + '<div id="counter">' + hours + ((hours == 1) ?  ' hour, ' : ' hours, ') + minutes + ((minutes == 1) ? ' minute ' : ' minutes ') + 'and ' + seconds + ((seconds == 1) ? ' second' : ' seconds'));
  $('#timer').html(display + '<br>remaining for end of event.</div> <div id="prize">Total prizes worth &#8377; 20000.</div>');
  }
</script>
</body>
</html>
