$(document).ready(function(){

    $('#event_name').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"/events/fetch",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                    $('#eventList').fadeIn();
                    $('#eventList').html(data);
                }
            });
        }
    });

    $(document).on('click', 'li', function(){
        $('#event_name').val($(this).text());
        $('#eventList').fadeOut();
    });

});
