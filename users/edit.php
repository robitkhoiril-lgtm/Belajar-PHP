<?php
include '../config/database.php';

// ambil id dari URL
$id = $_GET['id'];

// ambil data lama
$result = mysqli_query($conn, "SELECT * FROM belajar WHERE id=$id");
$user = mysqli_fetch_assoc($result);

// UPDATE DATA
if (isset($_POST['Update'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $mobile = $_POST['mobile'];

    mysqli_query(
        $conn,
        "UPDATE belajar 
         SET name='$name', email='$email', phone='$mobile' 
         WHERE id=$id"
    );

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>

<form method="post">
    <table>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" 
                       value="<?= $user['name']; ?>" required>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email" 
                       value="<?= $user['email']; ?>" required>
            </td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td>
                <input type="number" name="mobile" 
                       value="<?= $user['phone']; ?>" required>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="Update" value="Update">
                <a href="index.php">Batal</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
 