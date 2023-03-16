<h1>Home page</h1>

<?php
include '../../index.php';

use App\Book;
use App\User;



$book = new Book($PDO);
$books = $book->getall();





?>



<!-- Form tìm kiếm -->
<form action="index.php" method="get">
  <input type="text" name="search" placeholder="Nhập từ khóa" >
  <button type="submit">Tìm kiếm</button>
</form>

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



