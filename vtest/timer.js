$(document).ready(function() {
  updateTime();
  setInterval(updateTime, 1000);
 });

function updateTime()
{
  var now = Date.now();
  var start = new Date(2013,11,31,18,0,0);
  var end = new Date(2014,0,4,0,0,0);
  var state = '';
  var delta;
  if(now < start)
  {
    state = 'Event starts in ';
    delta = start - now;
  }
  else
  {
    state = 'Event ends in ';
    delta = end - now;
  }
  delta=Math.floor(delta/1000);
  var days = Math.floor(delta / 86400);
  var hours = Math.floor(delta / 3600) % 24;
  var minutes = Math.floor(delta / 60) % 60;
  var seconds = delta % 60;
  $('#timer').remove();
  var display = ('<div class="pull-right well" id="timer">' + state + days + ((days == 1) ? ' day, ' : ' days, ') + hours + ((hours == 1) ?  ' hour' : ' hours')+ ' and ' + minutes + ((minutes == 1) ? ' minute.' : ' minutes.'));
  $('.container').prepend(display);
  }
