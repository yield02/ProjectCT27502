

$(document).ready(function(){

    $('#editBookForm').submit(function(event){
         event.preventDefault();
         var formData = new FormData(this);
         $.ajax({
             url: "/edit/book",
             type: "POST",
             processData:false,
             contentType: false,
             data: formData,
             success: function(response) {
                console.log(response);
                //  $("#bResult").html(response);
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 console.log(errorThrown);
             }
         });
     });
 });