<?php
include '../config/database.php';

// INSERT DATA
if (isset($_POST['Submit'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $mobile = $_POST['mobile'];

    mysqli_query(
        $conn,
        "INSERT INTO belajar (name, email, phone) 
         VALUES ('$name', '$email', '$mobile')"
    );

    echo "<p>User added successfully.</p>";
}

// SELECT DATA
$result = mysqli_query($conn, "SELECT * FROM belajar");
$id = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>

<h1>Users</h1>

<form action="" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><input type="number" name="mobile" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
    </table>
</form>

<br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $id++; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['phone']; ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>