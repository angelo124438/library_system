<?php
include "db.php";

// Handle Add Book submission
if (isset($_POST['add_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $quantity = $_POST['quantity'];

    mysqli_query($conn, "INSERT INTO books (title, author, quantity) VALUES ('$title', '$author', '$quantity')");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: 80%; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        input[type=text], input[type=number] { padding: 5px; width: 200px; margin-right: 10px; }
        button { padding: 5px 10px; }
    </style>
</head>
<body>
    <h2>Library Management System</h2>

    <!-- Add Book Form -->
    <form method="POST" action="">
        <input type="text" name="title" placeholder="Book Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="number" name="quantity" placeholder="Quantity" min="1" required>
        <button type="submit" name="add_book">Add Book</button>
    </form>

    <!-- Books Table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Quantity</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        // Fetch all books
        $result = mysqli_query($conn, "SELECT * FROM books");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['book_id']."</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['author']."</td>";
            echo "<td>".$row['quantity']."</td>";
            echo "<td><a href='edit.php?id=".$row['book_id']."'>Edit</a></td>";
            echo "<td><a href='delete.php?id=".$row['book_id']."' onclick='return confirm(\"Are you sure you want to delete this book?\")'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
