Pusher.logToConsole = true;

var pusher = new Pusher('8fa3cad6dcc20526ad09', {
    cluster: 'eu',
    forceTLS: true
});

var userId;
$.ajax({
    type: "GET",
    url: "/GetCurrentUserId",
    // dataType: "text",
    async: false,
    success: function(data){
        userId = data;
    }
});

var channel = pusher.subscribe('my-channel'+ userId);

channel.bind('apply_response',notify);

var heightCounter = 10;

function notify(data) {

    // if(data.volunteerId == userId){
        var yourPosition = {
            my: "left bottom",
            at: "left+10 bottom-"+heightCounter
        };
        var elem = $('<div></div>');
        // elem.html();
        $('<a href="/dashboard" style="font-size: 16px"></a>', {
            class : 'inner'
        }).html(data.message).appendTo( elem );
        elem.dialog({
            create: function(event) {
                $(event.target).parent().css('position', 'fixed');
            },
            dialogClass: "no-close noTitleStuff fixed-dialog",
            autoOpen: true,
            title: data.event,
            // modal: true,
            position:yourPosition,
            minWidth: 300,
            draggable:false,
            resizable: false,
            show : { effect: "fade", duration: 1000},
            hide: { effect: "fade", duration: 1000 },
            close: function() { heightCounter-=20; }

        });
        // .prev(".ui-dialog-titlebar").css("background","#7FFF00")
        heightCounter+=20;
    // }
}
