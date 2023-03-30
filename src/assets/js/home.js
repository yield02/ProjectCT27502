$(document).ready(function() {



    //search Render


    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(
        tooltipTriggerEl));

    $('#search-form').submit(function(event) {
        event.preventDefault();
        var searchQuery = $('input[name="search"]').val();
        var pageSize = 8;
        $.ajax({
            url: '/book/searchTitle/' + searchQuery,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    var html =
                        "<h1 class='d-flex justify-content-center align-items-center my-5'>Tìm kiếm từ '" +
                        searchQuery + "' </h1>";
                    html += "<p>Tìm thấy " + data.length + " kết quả.</p>";
                    var numPages = Math.ceil(data.length / pageSize);
                    var currentPage = 1;
                    var start = (currentPage - 1) * pageSize;
                    var end = start + pageSize;
                    var pageData = data.slice(start, end);
                    html += pageData.map(function(item, index) {
                        console.log(item);
                        return `<div class="col-3 p-4 border border-secondary-subtle" style="width:20;">
                            <a href="#" class="d-block"><img src="/assets/img/${item.BookID}.png" alt="newbook" class="img-fluid d-block mx-auto" style="max-width: 150px; max-height: 150px;"></a>
                            <div class="pt-2 bg-white">
                                <div class="text-uppercase fw-semibold mb-1 text-truncate "><a class="link-danger link-hover" href="#" style="font-size: .75rem;">${item.Publisher}</a>
                                </div>
                                <h5 class="h6 lh-base text-dark crop-text" style="height: 3rem;"><a class="link-dark" href="#">${item.Title}</a></h5>
                                <div class="mb-2 text-truncate"><a href="#" class="link-secondary link-hover">${item.Author}</a></div>
                                <div class="d-flex justify-content-center fw-medium fs-5">
                                    <a href="#" class="btn btn-light rounded-3 px-4">Thêm vào giỏ mượn</a>
                                </div>
                            </div>
                        </div>
                    `;
                    }).join('');
                    $('#search-result').html(html);
                    $('#content').hide();
                    $('#result').show();
                    var paginationHtml = '';
                    if (numPages > 1) {
                        paginationHtml +=
                            '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2 disabled" href="#" data-page="prev">Trang trước</a>';
                        for (var i = 1; i <= numPages; i++) {
                            if (i == currentPage) {
                                paginationHtml +=
                                    '<span class="btn btn-dark rounded-0 border border-opacity-25 me-2 current">' +
                                    i + '</span>';
                            } else {
                                paginationHtml +=
                                    '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2" href="#" data-page="' +
                                    i + '">' + i +
                                    '</a>';
                            }
                        }
                        paginationHtml +=
                            '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2" href="#" data-page="next">Trang sau</a>';
                    }
                    $('#pagination').html(paginationHtml);
                } else {
                    var html =
                        "<h1 style='margin: 20% 0;' class='d-flex justify-content-center align-items-center'>Không có kết quả.</h1>";
                    $('#search-result').html(html);
                    $('#pagination').html('');
                }
                $(document).on('click', '#pagination a', function(event) {
                    event.preventDefault();
                    var page = $(this).data('page');
                    var start, end;
                    if (page == 'prev') {
                        currentPage--;
                    } else if (page == 'next') {
                        currentPage++;
                    } else {
                        currentPage = page;
                    }
                    start = (currentPage - 1) * pageSize;
                    end = start + pageSize;
                    var pageData = data.slice(start, end);
                    var html =
                        "<h1 class='d-flex justify-content-center align-items-center my-5'>Tìm kiếm từ '" +
                        searchQuery + "' </h1>";
                    html += "<p>Tìm thấy " + data.length + " kết quả.</p>";
                    html += pageData.map(function(item, index) {
                        return `<div class="col-3 p-4 border border-secondary-subtle" style="width:20;">
                            <a href="#" class="d-block"><img src="/assets/img/${item.BookID}.png" alt="newbook" class="img-fluid d-block mx-auto" style="max-width: 150px; max-height: 150px;"></a>
                            <div class="pt-2 bg-white">
                                <div class="text-uppercase fw-semibold mb-1 text-truncate "><a class="link-danger link-hover" href="#" style="font-size: .75rem;">${item.Publisher}</a>
                                </div>
                                <h5 class="h6 lh-base text-dark crop-text" style="height: 3rem;"><a class="link-dark" href="#">${item.Title}</a></h5>
                                <div class="mb-2 text-truncate"><a href="#" class="link-secondary link-hover">${item.Author}</a></div>
                                <div class="d-flex justify-content-center fw-medium fs-5">
                                    <a href="#" class="btn btn-light rounded-3 px-4">Thêm vào giỏ mượn</a>
                                </div>
                            </div>
                        </div>
                    `;
                    }).join('');
                    $('#search-result').html(html);
                    // update pagination
                    var paginationHtml = '';
                    if (numPages > 1) {
                        paginationHtml +=
                            '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2" href="#" data-page="prev">Trang trước</a>';
                        for (var i = 1; i <= numPages; i++) {
                            if (i == currentPage) {
                                paginationHtml +=
                                    '<span class="btn btn-dark rounded-0 border border-opacity-25 me-2 current">' +
                                    i +
                                    '</span>';
                            } else {
                                paginationHtml +=
                                    '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2" href="#" data-page="' +
                                    i +
                                    '">' + i + '</a>';
                            }
                        }
                        paginationHtml +=
                            '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2" href="#" data-page="next">Trang sau</a>';
                    }
                    $('#pagination').html(paginationHtml);
                    if (currentPage == 1) {
                        $('#pagination a[data-page="prev"]').addClass('disabled');
                    }
                    if (currentPage == numPages) {
                        $('#pagination a[data-page="next"]').addClass('disabled');
                    }
                });
            }
        });
    });



});

function renderCategory(id, name) {
    var pageSize = 8;
    $.ajax({
        url: '/book/categories/' + id,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.length > 0) {
                var html =
                    `<h1 class='d-flex justify-content-center align-items-center my-5'>${name}</h1>`;
                html += "<p>Tìm thấy " + data.length + " kết quả.</p>";
                var numPages = Math.ceil(data.length / pageSize);
                var currentPage = 1;
                var start = (currentPage - 1) * pageSize;
                var end = start + pageSize;
                var pageData = data.slice(start, end);
                html += pageData.map(function(item, index) {
                    return `<div class="col-3 p-4 border border-secondary-subtle" style="width:20;">
                        <a href="#" class="d-block"><img src="/assets/img/${item.BookID}.png" alt="newbook" class="img-fluid d-block mx-auto" style="max-width: 150px; max-height: 150px;"></a>
                        <div class="pt-2 bg-white">
                            <div class="text-uppercase fw-semibold mb-1 text-truncate "><a class="link-danger link-hover" href="#" style="font-size: .75rem;">${item.Publisher}</a>
                            </div>
                            <h5 class="h6 lh-base text-dark crop-text" style="height: 3rem;"><a class="link-dark" href="#">${item.Title}</a></h5>
                            <div class="mb-2 text-truncate"><a href="#" class="link-secondary link-hover">${item.Author}</a></div>
                            <div class="d-flex justify-content-center fw-medium fs-5">
                                <a href="#" class="btn btn-light rounded-3 px-4">Thêm vào giỏ mượn</a>
                            </div>
                        </div>
                    </div>
                `;
                }).join('');
                $('#search-result').html(html);
                $('#content').hide();
                $('#result').show();
                var paginationHtml = '';
                if (numPages > 1) {
                    paginationHtml +=
                        '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2 disabled" href="#" data-page="prev">Trang trước</a>';
                    for (var i = 1; i <= numPages; i++) {
                        if (i == currentPage) {
                            paginationHtml +=
                                '<span class="btn btn-dark rounded-0 border border-opacity-25 me-2 current">' +
                                i + '</span>';
                        } else {
                            paginationHtml +=
                                '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2" href="#" data-page="' +
                                i + '">' + i +
                                '</a>';
                        }
                    }
                    paginationHtml +=
                        '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2" href="#" data-page="next">Trang sau</a>';
                }
                $('#pagination').html(paginationHtml);
            } else {
                var html =
                    "<h1 style='margin: 20% 0;' class='d-flex justify-content-center align-items-center'>Không có kết quả.</h1>";
                $('#search-result').html(html);
                $('#pagination').html('');
            }
            $(document).on('click', '#pagination a', function(event) {
                event.preventDefault();
                var page = $(this).data('page');
                var start, end;
                if (page == 'prev') {
                    currentPage--;
                } else if (page == 'next') {
                    currentPage++;
                } else {
                    currentPage = page;
                }
                start = (currentPage - 1) * pageSize;
                end = start + pageSize;
                var pageData = data.slice(start, end);
                var html =`<h1 class='d-flex justify-content-center align-items-center my-5'>${name}</h1>`;
                html += "<p>Tìm thấy " + data.length + " kết quả.</p>";
                html += pageData.map(function(item, index) {
                    return `<div class="col-3 p-4 border border-secondary-subtle" style="width:20;">
                        <a href="#" class="d-block"><img src="/assets/img/${item.BookID}.png" alt="newbook" class="img-fluid d-block mx-auto" style="max-width: 150px; max-height: 150px;"></a>
                        <div class="pt-2 bg-white">
                            <div class="text-uppercase fw-semibold mb-1 text-truncate "><a class="link-danger link-hover" href="#" style="font-size: .75rem;">${item.Publisher}</a>
                            </div>
                            <h5 class="h6 lh-base text-dark crop-text" style="height: 3rem;"><a class="link-dark" href="#">${item.Title}</a></h5>
                            <div class="mb-2 text-truncate"><a href="#" class="link-secondary link-hover">${item.Author}</a></div>
                            <div class="d-flex justify-content-center fw-medium fs-5">
                                <a href="#" class="btn btn-light rounded-3 px-4">Thêm vào giỏ mượn</a>
                            </div>
                        </div>
                    </div>
                `;
                }).join('');
                $('#search-result').html(html);
                // update pagination
                var paginationHtml = '';
                if (numPages > 1) {
                    paginationHtml +=
                        '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2" href="#" data-page="prev">Trang trước</a>';
                    for (var i = 1; i <= numPages; i++) {
                        if (i == currentPage) {
                            paginationHtml +=
                                '<span class="btn btn-dark rounded-0 border border-opacity-25 me-2 current">' +
                                i +
                                '</span>';
                        } else {
                            paginationHtml +=
                                '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2" href="#" data-page="' +
                                i +
                                '">' + i + '</a>';
                        }
                    }
                    paginationHtml +=
                        '<a class="btn btn-outline-dark rounded-0 border border-opacity-25 me-2" href="#" data-page="next">Trang sau</a>';
                }
                $('#pagination').html(paginationHtml);
                if (currentPage == 1) {
                    $('#pagination a[data-page="prev"]').addClass('disabled');
                }
                if (currentPage == numPages) {
                    $('#pagination a[data-page="next"]').addClass('disabled');
                }
            });
        }
    });
}