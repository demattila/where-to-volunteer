$(document).ready(function(){
    function showSearchEvents(data){
        $list = $('#eventList');
        $list.empty()
        $list.show();
        for (let val of data) {
            $option = '<li class="option searched_event"><a href="/events/' + val.id + '"><h6><b>'+ val.title + '</b></h6></a></li>';
            $list.append($option);
        }
    }

    $('#event_name').keyup(function(){
        var query = $(this).val();
        if(query !== '' && query.length > 2)
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"/events/getSearchEvents",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                    showSearchEvents(data);
                }
            });
        }
        else{
            $('#eventList').empty();
            $('#eventList').hide();
        }
    });

    $(document).click(function(){
        $('#eventList').hide();
    });

});
