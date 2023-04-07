function addCart(BookID) {
    $.ajax({
        url: "/add/cart",
        type: "POST",
        data: {
            BookID
        },
        success: function(response) {
            console.log(response);
            alert(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}