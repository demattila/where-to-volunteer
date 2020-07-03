window.addToFavourites = function (itemid) {
    var item_id = itemid;

    $.ajax({
        type: 'post',
        url: '/event/favorite',
        data: {
            // 'user_id': user_id,
            'item_id': item_id,
            _token: '{{csrf_token()}}'
        },
        success: function () {
            // hide add button
            $('#addfavourites' + item_id).hide();
            // show delete button
            $('#deletefavourite' + item_id).show();
        },
        error: function (XMLHttpRequest) {
            // handle error
        }
    });
};

window.deleteFromFavourites = function (itemid) {
    var item_id = itemid;

    $.ajax({
        type: 'post',
        url: '/event/unfavorite',
        data: {
            // 'user_id': user_id,
            'item_id': item_id,
            _token: '{{csrf_token()}}'
        },
        success: function () {
            // show add button
            $('#addfavourites' + item_id).show();
            // hide delete button
            $('#deletefavourite' + item_id).hide();
        },
        error: function (XMLHttpRequest) {
            // handle error
        }
    });
};
