<?php
require_once '../src/BookController.php';

if ($_GET['id']) {
    $bookController = new BookController();
    $bookController->deleteBook($_GET['id']);
    header("Location: index.php");
}
?>