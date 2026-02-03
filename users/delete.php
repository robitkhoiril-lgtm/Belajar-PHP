<?php
include '../config/database.php';

$id = $_GET['id'];

// DELETE DATA
mysqli_query($conn, "DELETE FROM belajar WHERE id = $id");

header("Location: index.php");
exit();

?>