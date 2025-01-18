<?php
require_once('config.php');

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    // Fetch the book details from the database
    $sql = "SELECT * FROM books WHERE `Book_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $book_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
    } else {
        echo "Book not found!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get updated data from the form
    $title = $_POST['title'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $published_date = $_POST['published_date'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];

    // Update the book record in the database
    $update_sql = "UPDATE books 
                   SET Title = ?, ISBN = ?, Author = ?, Publisher = ?, `Published_Date` = ?, Genre = ?, Description = ?, Price = ?, `Stock_Quantity` = ? 
                   WHERE `Book_id` = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssssssssss", $title, $isbn, $author, $publisher, $published_date, $genre, $description, $price, $stock_quantity, $book_id);

    if ($update_stmt->execute()) {
        echo "Book updated successfully!";
        header("Location: admin_book_page.php");
        exit;
    } else {
        echo "Error updating book!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>

    <link rel="stylesheet" href="Edit.css">
</head>
<body>
    <form action="" method="POST">
        <label>Title:</label>
        <input type="text" name="title" value="<?= $book['Title']; ?>" required><br>
        <label>ISBN:</label>
        <input type="text" name="isbn" value="<?= $book['ISBN']; ?>" required><br>
        <label>Author:</label>
        <input type="text" name="author" value="<?= $book['Author']; ?>" required><br>
        <label>Publisher:</label>
        <input type="text" name="publisher" value="<?= $book['Publisher']; ?>" required><br>
        <label>Published Date:</label>
        <input type="date" name="published_date" value="<?= $book['Published_Date']; ?>" required><br>
        <label>Genre:</label>
        <input type="text" name="genre" value="<?= $book['Genre']; ?>" required><br>
        <label>Description:</label>
        <textarea name="description" required><?= $book['Description']; ?></textarea><br>
        <label>Price:</label>
        <input type="text" name="price" value="<?= $book['Price']; ?>" required><br>
        <label>Stock Quantity:</label>
        <input type="number" name="stock_quantity" value="<?= $book['Stock_Quantity']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
