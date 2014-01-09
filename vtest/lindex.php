<html>
<head>
<title>Gordian Knot | Threads</title>
<?php  include_once 'includer.php'; ?>
<style>
body {
	background-color: rgb(2,22,35);
}
h1, h2 {
	font-family: Electrolize, sans-serif;
	color: #ddd;
}
h1 {
	font-weight: bold;
	font-size: 5em;
	line-height: 1.25em;
	color: #f5f5f5;
	text-align: center;
}
h2 {
	font-weight: lighter;
	font-size: 1.6em;
	line-height: 1.35em;
}
.content{
	width: 80%;
	margin: auto;
}
#notice{
	padding-top: 2em;
}

#gotoarena:hover {
	color: #057cb8;
	text-decoration: underline;
}

#rules
{
	padding-bottom: 1em;
}

.rules-section {
	margin: 2em auto;
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
include("masthead.php");
?>

<div class="content">

<div id="notice">

<div style="float:right;">
<?php include_once 'addevent.php'; ?>
</div>
<h1>Gordian Knot</h1>

<h2 id="timer"></h2>
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
				<li>Answers to all the problems will necessarily be a non-negative integer with no trailing zeros. Answer will not contain a decimal point or any other special character. Integers will contain no more than 512 digits in all cases.</li>
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
 });

function updateTime()
{
  var now = Date.now();
  var start = new Date(2014,0,4,16,0,0);
  var end = new Date(2014,0,5,23,59,0);
  var state = '';
  var delta;
  if(now < start)
  {
    state = 'Event starts on 4th Jan \'14 at 1600 hours (IST).<br><a id="gotoarena" href="http://www.timeanddate.com/worldclock/fixedtime.html?msg=Gordian+Knot&iso=20140104T16&p1=771">Check in your time zone.</a><br>';
    delta = start - now;
  }
  else
  {
    state = 'Contest has started.<br><a id="gotoarena" href="">Go to Arena!</a><br>Event ends on 5th Jan \'14 2359 hours (IST).<br> ';
    delta = end - now;
  }
  delta=Math.floor(delta/1000);
  var days = Math.floor(delta / 86400);
  var hours = Math.floor(delta / 3600) % 24;
  var minutes = Math.floor(delta / 60) % 60;
  var seconds = delta % 60;
  var display = (state + '<div style="text-align: center;font-size:1.1em;line-height:1.5em;">' + days + ((days == 1) ? ' day, ' : ' days, ') + hours + ((hours == 1) ?  ' hour, ' : ' hours, ') + minutes + ((minutes == 1) ? ' minute ' : ' minutes ') + 'and ' + seconds + ((seconds == 1) ? ' second' : ' seconds'));
  $('#timer').html(display + '<br>remaining for start of event.</div><div id="prize">Total prizes worth &#8377; 20000.</div>');
  }
</script>
<link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
</body>
</html>
