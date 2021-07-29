<?php

include('functions.php');
$pdo = connect_to_db();
// var_dump($_FILES);
// exit;
if (
    // 活動日
    !isset($_POST['activites_date']) || $_POST['activites_date'] == '' ||
    // 活動名
    !isset($_POST['activites_name']) || $_POST['activites_name'] == '' ||
    // コメント
    !isset($_POST['comment']) || $_POST['comment'] == ''
    // 活動id
    // !isset($_POST['id']) || $_POST['id'] == ''

) {
    echo json_encode(["error_msg" => "auth no input"]);
    exit();
}

// var_dump($_POST);
// exit;

// 活動日
$activites_date = $_POST['activites_date'];
// 活動名
$activites_name = $_POST['activites_name'];
// コメント
$comment = $_POST['comment'];
// 活動id
// $id = 1; //$_POST['id'];



// $dbn = 'mysql:dbname=gsacf_d08_10;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit();
// }

$img = $_FILES['img']['name'];
$img_data = "";

if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
    // 送信時OK
    // 送信されてきたファイルの情報を取得
    $uploaded_file_name = $_FILES['img']['name'];
    $temp_path = $_FILES['img']['tmp_name'];
    $directory_path = 'upload/';
    // ファイル名の準備
    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
    $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
    $filename_to_save = $directory_path . $unique_name;
    if (is_uploaded_file($temp_path)) {
        // ここでtmpファイルを移動する
        // var_dump($temp_path);
        // var_dump($filename_to_save);
        // exit();
        if (move_uploaded_file($temp_path, $filename_to_save)) {
            chmod($filename_to_save, 0644);
            $img_data = $filename_to_save;
        } else {
            exit('Error:アップロードできませんでした');
        }
    } else {
        exit('Error：画像がありません');
    }
} else {
    // 送信時エラー
    exit('Error:画像が送信されていません');
}

// var_dump($filename_to_save);
// exit();


$sql = 'INSERT INTO t_activites(id, activites_date, activites_name, comment, img,is_deleted, created_at, updated_at)VALUES(NULL, :activites_date, :activites_name, :comment, :img, 0, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':activites_date', $activites_date, PDO::PARAM_STR);
$stmt->bindValue(':activites_name', $activites_name, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':img', $img_data, PDO::PARAM_STR);

$status = $stmt->execute();
// var_dump($status);
// exit();


if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:activites_read.php");
    exit();
}
