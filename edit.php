<?php
include "db.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM books WHERE book_id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $quantity = $_POST['quantity'];

    mysqli_query($conn, "UPDATE books SET title='$title', author='$author', quantity='$quantity' WHERE book_id=$id");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h2>Edit Book</h2>
    <form method="POST" action="">
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
        <input type="text" name="author" value="<?php echo $row['author']; ?>" required>
        <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" min="1" required>
        <button type="submit" name="update_book">Update Book</button>
    </form>
    <br>
    <a href="index.php">Back to Main Page</a>
</body>
</html>
