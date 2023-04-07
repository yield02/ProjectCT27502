

$(document).ready(function(){

   $('#bookAdd').submit(function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "/add/book",
            type: "POST",
            processData:false,
            contentType: false,
            data: formData,
            // data: {
            //     Title: $("#bTitle").val(),
            //     Author: $("#Author").val(),
            //     Publisher: $("#Publisher").val(),
            //     PublishDate: $("#PublishDate").val(),
            //     ISBN: $("#ISBN").val(),
            //     Quantity: $("#Quantity").val(),
            //     CategoryID: $("#CategoryID").val(),
            //     Description: $("#bDescription").val(),
            //     Img: $("#img")[0].files[0],
            // },
            success: function(response) {
                $("#bResult").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

    $('#categoryAdd').submit(function(event){
        
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "/add/category",
            type: "POST",
            processData:false,
            contentType: false,
            data: formData,
            success: function(response) {
                $("#cResult").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });


});