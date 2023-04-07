

$(document).ready(function(){

    $('#editCategoryForm').submit(function(event){
         event.preventDefault();
         var formData = new FormData(this);
         $.ajax({
             url: "/edit/category",
             type: "POST",
             processData:false,
             contentType: false,
             data: formData,
             success: function(response) {
                console.log(response);
                 $("#cResult").html(response);
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 console.log(errorThrown);
             }
         });
     });
 });