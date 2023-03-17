<h1>Home page</h1>

<?php
include '../../index.php';

use App\Book;
use App\User;



$book = new Book($PDO);
$books = $book->getall();

?>



<!-- Form tìm kiếm -->
<form action="" method="get" id="search-form">
    <input type="text" name="search" placeholder="Nhập từ khóa">
    <button type="submit">Tìm kiếm</button>
</form>

<!-- search result -->


<div id="search-result"></div>


<!-- Hiển thị kết quả -->
<table>
    <thead>
        <tr>
            <!--<img src="" alt="Book Cover"> -->
            <th>Title</th>
            <th>Author</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
        <tr>
            <!-- <td>< ?php echo $book->getImage(); ?></td> -->
            <td><?php echo $book->getTitle(); ?></td>
            <td><?php echo $book->getAuthor(); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#search-form').submit(function(event) {
        event.preventDefault();
        var searchQuery = $('input[name="search"]').val();
        $.ajax({
            url: '../actions/homeActions.php',
            type: 'GET',
            data: {
                search: searchQuery
            },
            dataType: 'json',
            success: (data) => {
                if (data.length > 0) {
                    var html = "<h1>Kết quả tìm kiếm</h1>"
                    html += data.map(function(item, index) {
                        console.log(item);
                        return `
                            <div>
                                <p>Title: ${item.Title}</p>
                                <p>Author: ${item.Author}</p>
                                <p>Publisher: ${item.Publisher}</p>
                            </div>
                        `;
                    })
                }

                else {
                    var html = "<h1>Không tìm thấy</h1>"
                }
                $('#search-result').html(html);
            }
        })
    })
});
</script>