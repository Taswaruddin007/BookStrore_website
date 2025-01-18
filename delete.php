<?php
require_once('config.php');

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    // Delete the book from the database
    $sql = "DELETE FROM books WHERE `Book_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $book_id);

    if ($stmt->execute()) {
        echo "Book deleted successfully!";
        header("Location: admin_book_page.php");
        exit;
    } else {
        echo "Error deleting book!";
    }
} else {
    echo "Invalid request!";
}
?>
