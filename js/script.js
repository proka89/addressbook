$(document).ready(function(){

  $('.delete').click(function(){
    var id = $(this).attr('id');
    var ele = $(this).closest('tr');

    $.ajax({
       url: '../delete_contact.php',
       type: 'POST',
       data: { id:id },
       success: function(data){
        ele.fadeOut().remove(); 
       }
    });
  });
});
