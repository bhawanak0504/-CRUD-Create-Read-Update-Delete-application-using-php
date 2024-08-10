<?php
require_once '../src/BookController.php';

$bookController = new BookController();

if ($_POST) {
    $bookController->updateBook($_POST['id'], $_POST['title'], $_POST['author'], $_POST['published_year']);
    header("Location: index.php");
} else {
    $id = $_GET['id'];
    $result = $bookController->getAllBooks();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        if ($row['id'] == $id) {
            $book = $row;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Update Book</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Update Book</h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $book['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control" value="<?php echo $book['author']; ?>" required>
            </div>
            <div class="form-group">
                <label for="published_year">Published Year</label>
                <input type="number" name="published_year" class="form-control" value="<?php echo $book['published_year']; ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>