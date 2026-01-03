<?php
include "db.php";

$title = $_POST['title'];
$author = $_POST['author'];
$quantity = $_POST['quantity'];

mysqli_query($conn, "INSERT INTO books (title, author, quantity)
VALUES ('$title', '$author', '$quantity')");

header("Location: index.php");
?>
