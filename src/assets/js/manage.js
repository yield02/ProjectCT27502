$(document).ready(function() {
    $("#book #searchBook").hide();
    $("#book #searchUser").hide();
    $("#category").hide();
    $("#user").hide();

    $("#book-btn").click(function() {
        $("#book #searchBook").hide();
        $("#book #searchUser").hide();
        $("#book").show();
        $("#category").hide();
        $("#user").hide();
    });

    $("#category-btn").click(function() {
        $("#book #searchBook").hide();
        $("#book #searchUser").hide();
        $("#book").hide();
        $("#category").show();
        $("#user").hide();
    });


    $("#user-btn").click(function() {
        $("#book #searchBook").hide();
        $("#book #searchUser").hide();
        $("#book").hide();
        $("#category").hide();
        $("#user").show();
    });


});




function SearchBook(Title) {
    clearTimeout(this.timeout);
    return this.timeout = setTimeout(function() {
        if(Title != '') {

            $.ajax({
                url: "/book/searchTitle/" + Title,
                type: "GET",
                success: function(response) {
                    var data = JSON.parse(response);
                    if(data.length > 0) {
                        
                        
                        let html = data.map((item) => (
                            `
                            <tr>
                                <td width="20%">${item.Title}</td>
                                <td>${item.Author}</td>
                                <td>${item.Publisher}</td>
                                <td width="8%">${item.PublishDate}</td>
                                <td>${item.ISBN}</td>
                                <td class="text-center">${item.Quantity}</td>
                                <td width="9%">${item.CategoryName}</td>
                                <td>${item.Description}</td>
                                <td class="align-middle" width="5%">
                                    <a href=""
                                        class="btn btn-warning"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Edit" class="fa-solid fa-pencil"></i> Sửa
                                    </a>


                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#book${item.BookID}" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Delete" class="fa-solid fa-trash"> </i>Xóa
                                    </button>
                                    
                                    <div class="modal fade" id="book${item.BookID}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xóa ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" onClick="deleteBook(${item.bookID})" class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            `
                        ))
                        
                        $("#book #searchBook").html(html.join(''));
                        $("#book #showBook").hide();
                        $("#book #searchBook").show();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
            
        }
        else {
            $("#book #searchBook").hide();
            $("#book #showBook").show();
        }
    }, 500);
}

function deleteBook(bookID) {

    $.ajax({
        url: `book/delete/${bookID}`,
        type: "DELETE",
        success: function(response) {
            $(`#rowBook${bookID}`).remove();
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

}


function deleteCategory(id) {

    $.ajax({
        url: `/delete/category/${id}`,
        type: "DELETE",
        success: function(response) {
            $(`#rowCategory${id}`).remove();
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

}



function SearchUser(userName) {

    clearTimeout(this.timeout);
    console.log(userName);
    return this.timeout = setTimeout(function() {
        if(userName != '') {

            $.ajax({
                url: "/searchUsername/" + userName,
                type: "GET",
                success: function(response) {
                    
                    var data = JSON.parse(response);
                    if(data.length > 0) {

                        let html = data.map(item => (
                            `<tr id="rowUser${item.UserID}">
                                <td>${item.Username}</td>
                                <td>${item.Email}</td>
                                <td>${item.Fullname}</td>
                                <td>${item.Address}</td>
                                <td>${item.Phone}</td>
                                <td class="align-middle" width="5%">
                                    <a href=""
                                        class="btn btn-warning"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Edit" class="fa-solid fa-pencil"></i> Sửa</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#User${item.UserID}"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">
                                        <i alt="Delete" class="fa-solid fa-trash"> </i>Xóa
                                    </button>

                                    <div class="modal fade" id="User${item.UserID}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xóa ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button"
                                                        onClick="deleteUser(${item.UserID})"
                                                        class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>`
                        ))
                        
                        $("#user #searchUser").html(html.join(''));
                        $("#user #userShow").hide();
                        $("#user #searchUser").show();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
            
        }
        else {
            $("#user #searchUser").hide();
            $("#user #userShow").show();
        }
    }, 500);
}



function deleteUser(id) {

    $.ajax({
        url: `/delete/user/${id}`,
        type: "DELETE",
        success: function(response) {
            $(`#rowUser${id}`).remove();
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

} 
 



// $(document).ready(function() {
//     new WOW().init();
//     $('#contacts').DataTable();
//     $('button[name="delete-contact"]').on('click', function(e) {
//         e.preventDefault();
//         const form = $(this).closest('form');
//         const nameTd = $(this).closest('tr').find('td:first');
//         if (nameTd.length > 0) {
//             $('.modal-body').html(
//                 `Do you want to delete "${nameTd.text()}"?`
//             );
//         }
//         $('#delete-confirm').modal({
//                 backdrop: 'static',
//                 keyboard: false
//             })
//             .one('click', '#delete', function() {
//                 form.trigger('submit');
//             });
//     });
// });