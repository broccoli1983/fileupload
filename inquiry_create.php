<?php

include('functions.php');
$pdo = connect_to_db();
// var_dump($_POST);
// exit;
if (
    // 姓
    !isset($_POST['last_name']) || $_POST['last_name'] == '' ||
    // 名
    !isset($_POST['first_name']) || $_POST['first_name'] == '' ||
    // 電話番号
    !isset($_POST['tel']) || $_POST['tel'] == '' ||
    // メールアドレス
    !isset($_POST['email']) || $_POST['email'] == '' ||
    // 件名
    !isset($_POST['subject']) || $_POST['subject'] == '' ||
    // お問い合わせ内容
    !isset($_POST['message']) || $_POST['message'] == ''
) {
    echo json_encode(["error_msg" => "auth no input"]);
    exit();
}

// var_dump($_POST);
// exit;

// 姓
$last_name = $_POST['last_name'];
// 名
$first_name = $_POST['first_name'];
// 電話番号
$tel = $_POST['tel'];
// メールアドレス
$email = $_POST['email'];
// 件名
$subject = $_POST['subject'];
// お問い合わせ内容
$message = $_POST['message'];

// var_dump($message);
// exit();

// $dbn = 'mysql:dbname=gsacf_d08_10;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit();
// }

$sql = 'INSERT INTO t_inquiry(id, last_name, first_name, tel, email, subject, message, created_at, is_deleted)VALUES(NULL, :last_name, :first_name, :tel, :email, :subject, :message, sysdate(), 0)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
$stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_INT);
$stmt->bindValue(':subject', $subject, PDO::PARAM_STR);
$stmt->bindValue(':message', $message, PDO::PARAM_STR);

$status = $stmt->execute();
// var_dump($status);
// exit();


if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:inquiry_read.php");
    exit();
}
