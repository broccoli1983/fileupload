<?php
// session_start();
include("functions.php");
// check_session_id();

$id = $_GET["id"];

$pdo = connect_to_db();

$sql = 'UPDATE t_inquiry SET is_deleted = 1 WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:inquiry_read.php");
    exit();
}
