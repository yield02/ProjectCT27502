function deleteCart(BorrowDetailID, CartID) {
    $.ajax({
        url: "/delete/cart/book",
        type: "POST",
        data: {
            BorrowDetailID,
            CartID
        },
        success: function(response) {
            $(`#rowCart${BorrowDetailID}`).remove();
            alert(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}