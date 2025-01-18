<?php
include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <?php include 'user_header.php'; ?>

    <section class="about_cont">
        <img src="about1.jpg" alt="">
        <div class="about_descript">
            <h2>Why Pick Us?</h2>
            <p>
            With our broad choice of books covering multiple genres, you'll find the ideal read to satiate your needs. Our educated group of dedicated book aficionados is always available to make personalized recommendations and direct you to undiscovered gems. We take pleasure in creating an inclusive community by providing interesting events such as book clubs and author meet-ups. Furthermore, our streamlined online presence enables you to browse, explore, and order books from the comfort of your own home, ensuring secure transactions and prompt delivery. Customer satisfaction is our first priority at Librarium. We are committed to providing outstanding service and immediately addressing any questions or issues. Join us in celebrating the ability of books to inspire, educate, and entertain. Let us be your reliable companion on your literary journeys.
            </p>
        </div>
    </section>

    <section class="questions_cont">
        <div class="questions">
            <h2>Have Any Queries?</h2>
            <p>At Librarium, we value your satisfaction and strive to provide exceptional customer service. If you have any questions, concerns, or inquiries, our dedicated team is here to assist you every step of the way.</p>
            <button class="product_btn" onclick="window.location.href='contact.php'">Contact Us</button>

        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="https://kit.fontawesome.com/eedbcd0c96.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>