<?php
session_start();
include "../db/db.php";

// Session check
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../html/login.html");
    exit;
}

// DELETE USER
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM Users WHERE user_id='$id'";
    $conn->query($sql);
    header("Location: manage_users.php");
    exit;
}

// EDIT USER - FETCH DATA
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $edit_sql = "SELECT * FROM Users WHERE user_id='$edit_id'";
    $edit_result = $conn->query($edit_sql);
    $edit_row = $edit_result->fetch_assoc();
}

// UPDATE USER
if (isset($_POST['update_user'])) {

    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_type = $_POST['user_type'];

    $update_sql = "UPDATE Users SET 
                   name='$name',
                   email='$email',
                   phone='$phone',
                   user_type='$user_type'
                   WHERE user_id='$id'";

    $conn->query($update_sql);
    header("Location: manage_users.php");
    exit;
}

// Fetch all users
$sql = "SELECT * FROM Users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="../css/manage_users.css">
</head>
<body>

<div class="container">
    <h2>All Users (Buyers & Sellers)</h2>

    
    <a class="back" href="dashboard.php">Back to Dashboard</a>

    <?php if (isset($_GET['edit_id'])) { ?>
        <div class="edit-box">
            <h3>Edit User</h3>
            <form method="post" action="manage_users.php">
                <input type="hidden" name="user_id" value="<?= $edit_row['user_id'] ?>">

                <label>Name</label>
                <input type="text" name="name" value="<?= $edit_row['name'] ?>" required>

                <label>Email</label>
                <input type="text" name="email" value="<?= $edit_row['email'] ?>" required>

                <label>Phone</label>
                <input type="text" name="phone" value="<?= $edit_row['phone'] ?>" required>

                <label>User Type</label>
                <select name="user_type" required>
                    <option value="Buyer" <?= $edit_row['user_type']=='Buyer' ? 'selected' : '' ?>>Buyer</option>
                    <option value="Seller" <?= $edit_row['user_type']=='Seller' ? 'selected' : '' ?>>Seller</option>
                </select>

                <button type="submit" name="update_user">Update User</button>
            </form>
        </div>
    <?php } ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Type</th>
            <th>Action</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['user_id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['user_type'] ?></td>
            <td>
                <a class="edit" href="manage_users.php?edit_id=<?= $row['user_id'] ?>">Edit</a>
                <a class="delete" href="manage_users.php?delete_id=<?= $row['user_id'] ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>

    </table>
</div>

</body>
</html>
