<?php
require_once 'config/database.php';
require_once 'src/Book.php';

class BookController {
    private $db;
    private $book;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->book = new Book($this->db);
    }

    public function createBook($title, $author, $published_year) {
        $this->book->title = $title;
        $this->book->author = $author;
        $this->book->published_year = $published_year;
        return $this->book->create();
    }

    public function getAllBooks() {
        return $this->book->readAll();
    }

    public function updateBook($id, $title, $author, $published_year) {
        $this->book->id = $id;
        $this->book->title = $title;
        $this->book->author = $author;
        $this->book->published_year = $published_year;
        return $this->book->update();
    }

    public function deleteBook($id) {
        $this->book->id = $id;
        return $this->book->delete();
    }
}
?>