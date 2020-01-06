function addToFavourites(itemid) {
    // var user_id = userid;
    var item_id = itemid;

    $.ajax({
        type: 'post',
        url: '/event/favorite',
        data: {
            // 'user_id': user_id,
            'item_id': item_id,
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
}

function deleteFromFavourites(itemid) {
    // var user_id = userid;
    var item_id = itemid;

    $.ajax({
        type: 'post',
        url: '/event/unfavorite',
        data: {
            // 'user_id': user_id,
            'item_id': item_id,
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
}