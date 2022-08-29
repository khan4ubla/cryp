<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' . $avatar_name;
        if ($avatar_path) {
            unlink($avatar_path);
        }
    }
    //


    //
    $delete_user_query = "DELETE FROM users WHERE id=$id";
    $delete_user_result = mysqli_query($connection, $query);
    if (mysqli_errno($connection)) {
        $_SESSION['delete-user'] = "Coudn't delete '{$user['firstname']} '{$user['lastname']}'";
    } else {
        $_SESSION['delete-user-success'] = "User '{$user['firstname']} '{$user['lastname']}' Deleted successfully";
    }
}
header('location:' . ROOT_URL . 'admin/manage-users.php');
die();
