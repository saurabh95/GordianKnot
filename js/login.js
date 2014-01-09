var opened=false;
$(document).ready(function() {
    $(document).click(function() {
      if (opened) {
      opened=false;
      $('.lgsu').stop().animate({'background-color': '#111'});
      $('.loginbox').stop().slideUp();
		}
	  });
    $('loginbox').click(function(e) {
      e.stopPropagation();
    });
    $('#loginButton').click(function(e) {
        e.stopPropagation();
        if(!opened)
        {
           $('.lgsu').stop().animate({'background-color': '#1a1a1a'});
           $('.loginbox').stop().slideDown();
        }
        else {
          $('.lgsu').stop().animate({'background-color': '#111'});
          $('.loginbox').stop().slideUp();
        }
        opened=!opened;
    });
});
