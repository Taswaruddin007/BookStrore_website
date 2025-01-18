<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Background gradient for the page */
        body {
            background: linear-gradient(to right,rgba(241, 241, 245, 0.06),rgb(245, 246, 244));
            min-height: 100vh;
        }

        /* Styling for the main container */
        .container {
            background: linear-gradient(to right,rgb(172, 187, 229),rgb(156, 156, 232));
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Table styling */
        .table {
            background-color: white;
            border-radius: 10px;
            max-width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <?php
    include 'admin_header.php';
    ?>

<br><br><br>
<section>
    <div class="container mt-5">
        <h4 class="mb-3">All Books</h4>
        <a href='add.php?id=$book_id' class='btn btn-success' style="margin-left: 85%;">Add New Book</a><br><br>
        <table class="table table-bordered shadow">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Book ID</th>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Published Date</th>
                    <th>Genre</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch books from the database
                $sql = "SELECT * FROM books"; // Update 'books' to match your table name
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $title = $row['Title'] ?? 'N/A';
                        $book_id = $row['Book_id'] ?? 'N/A';
                        $isbn = $row['ISBN'] ?? 'N/A';
                        $author = $row['Author'] ?? 'N/A';
                        $publisher = $row['Publisher'] ?? 'N/A';
                        $published_date = $row['Published_Date'] ?? 'N/A';
                        $genre = $row['Genre'] ?? 'N/A';
                        $description = $row['Description'] ?? 'N/A';
                        $price = $row['Price'] ?? 'N/A';
                        $stock_quantity = $row['Stock_Quantity'] ?? 'N/A';

                        echo "<tr>
                            <td>$title</td>
                            <td>$book_id</td>
                            <td>$isbn</td>
                            <td>$author</td>
                            <td>$publisher</td>
                            <td>$published_date</td>
                            <td>$genre</td>
                            <td>$description</td>
                            <td>$price</td>
                            <td>$stock_quantity</td>
                            <td>
                                <a href='edit.php?id=$book_id' class='btn btn-warning'>Edit</a>
                                <a href='delete.php?id=$book_id' class='btn btn-danger'>Delete</a>
                                </div>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
</body>
</html>





   

        