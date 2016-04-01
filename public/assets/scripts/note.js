$(function() {    
   
    $('.notic').click(function(){
        $id = $(this).prev().val();  
        $('#wide').css('display','block');
        $('#ordernote').focus();
        $('.order_id').val($id);
    });
    $('.close').add(".closebox").click(function(){
        $('#wide').css('display','none');
        $('#show').css('display','none');
        $('#ordernote').val('');
    });
   
   $('.show_note').click(function(){
        $('#show').css('display','block');
        $content = $(this).attr('content');
        $id      = $(this).attr('note_id');
        $('#note_content').val($content);
        $('#note_id').val($id);
        $('.note_id').val($id);
   });

   $('.show_warning').click(function(){
        $('#warning_show').css('display','block');
        $content = $(this).attr('content');
   });
   
});
