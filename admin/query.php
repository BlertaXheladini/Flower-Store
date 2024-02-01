<?php
include '../connection.php';

function logAdminAction( $action, $target) {
    global $conn;

    $admin_id = 9;
    $action = mysqli_real_escape_string($conn, $action);
    $target = mysqli_real_escape_string($conn, $target);

    $timestamp = date('Y-m-d H:i:s');

    $sql = "INSERT INTO admin (admin_id, action, target, timestamp) VALUES ('$admin_id', '$action', '$target', '$timestamp')";
    $conn->query($sql);
}
?>

