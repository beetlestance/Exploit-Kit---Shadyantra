
$(window).load(function(){

  $('.containmain').slideDown(700);

});

$(window).ready(function(){
  $(".topform , .bottomform").focus(function() {
    $(this).css({'background-image': 'none'});
});
  
  
  if ($('.topform').is(':empty')){
  
  $(".topform").focusout(function(){
   imageUrl = 'http://www.flaticon.com/png/256/16612.png';
    $(this).css('background-image', 'url(' + imageUrl + ')'); 
  });
    
  } else if ($('.topform').not(':empty')){
  
     $(this).css('background-image', 'none'); 
    
  }
  
  
    $(".bottomform").focusout(function(){
   imageUrl = 'http://www.flaticon.com/png/256/25239.png';
    $(this).css('background-image', 'url(' + imageUrl + ')'); 
  });
 
  $('.close').click(function(){
    $('.containmain').slideUp(function(){
   
    
      $('.close').text("Open").addClass("not");
    
    
    });
                                
                               
    
    
  
  });
  
  
  $("#close").click(function(){
  
    if ($( "#close" ).hasClass( "not" )){
      $('.containmain').slideDown(function(){
  
    $('.close').text("Close").removeClass("not");
  });
 
  }
  
  });
  
  
  
  
  
});