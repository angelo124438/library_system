<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Library Management System</h1>

<form action="add_book.php" method="POST" onsubmit="return validateForm()">
    <input type="text" name="title" placeholder="Book Title" id="title">
    <input type="text" name="author" placeholder="Author" id="author">
    <input type="number" name="quantity" placeholder="Quantity">
    <button type="submit">Add Book</button>
</form>

<table>
<tr>
    <th>Title</th>
    <th>Author</th>
    <th>Quantity</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM books");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['title']}</td>
        <td>{$row['author']}</td>
        <td>{$row['quantity']}</td>
    </tr>";
}
?>
</table>

<script src="script.js"></script>
</body>
</html>
