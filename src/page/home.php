<?php

include __DIR__.'/../../bootstrap.php';

use App\Models\Book;




$book = new Book($PDO);
$books = $book->getAll();

$newestBooks = $book->getNewestBook();
$page = 'home';

require_once __DIR__ . '/../components/header.php';
require_once __DIR__ . '/../components/addCss.php';

?>

<div id="content">

    <!-- search result -->


    <div id="search-result"></div>

    <!-- Hiển thị sách mới nhất -->
    <table>
        <thead>
            <tr>
                <!--<img src="" alt="Book Cover"> -->
                <th>Title</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newestBooks as $book): ?>
            <tr>
                <!-- <td>< ?php echo $book->getImage(); ?></td> -->
                <td><?php echo $book->getTitle(); ?></td>
                <td><?php echo $book->getAuthor(); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

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


</div>

<script>
$(document).ready(function() {
    $('#search-form').submit(function(event) {
        event.preventDefault();
        var searchQuery = $('input[name="search"]').val();
        $.ajax({
            url: '/book/searchTitle/' + searchQuery,
            type: 'GET',
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
                } else {
                    var html = "<h1>Không tìm thấy</h1>"
                }
                $('#search-result').html(html);
            }
        })
    })
});
</script>

<?php
require_once __DIR__ . '/../components/footer.php';
?>