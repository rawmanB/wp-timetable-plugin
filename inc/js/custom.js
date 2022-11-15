jQuery(function($){

  $('.single_class').click(function(evt){
  evt.preventDefault();
  
    var title = $(this).data('title');
    var desc = $(this).data('desc');
    var time = $(this).data('time');
    var html = '<div class="class_overlay"><div class="close closepopup">&times;</div><div class="popup"><div class="content"><h2>'+title+'</h2><p>'+desc+'</p></div><div class="pop_up_time"><div class="popup_times"><span class="clock"></span><div class="time_wrap"><p>'+time+'</p></div></div><div class="add_to_google_button btn btn--primary"><a href="#"><span>+</span>ADD TO GOOGLE CALENDER</a></div></div></div></div><div id="bodyfit_overlay"></div>'
  
    $('.class_overlay .content h2').text(title)
    $('.class_overlay .content p').text(desc)
    $('.class_overlay .pop_up_time .time_wrap p').text(time)
    $('#main-content').prepend(html);
    $('.closepopup').on('click',function(){
      $('.class_overlay').remove()
      $('#bodyfit_overlay').remove();
    });
    $('#bodyfit_overlay').on('click',function(){
      $('.class_overlay').remove()
      $('#bodyfit_overlay').remove();
    })	
  
  });
  
  $('.schedule').each(function(){
    get_highest_number_of_col($(this));
  });
  
  function get_highest_number_of_col(variable){
    var arr = [];
    var class_table = variable.find('.class_table');
    
    $(class_table).each(function(){
      var number = $(this).find('.single_class').length;
      arr.push(number);
    })
    var highest = (arr[arr.indexOf(Math.max(...arr))]);  
    var html = '<div class="single_class empty_single_class"></div>'
    
    $(class_table).each(function(){
      var number = $(this).find('.single_class').length;
      var diff = highest-number;
  
      for(i=0; i<diff; i++){
        $(this).append(html);
      }
      })
  }
  })