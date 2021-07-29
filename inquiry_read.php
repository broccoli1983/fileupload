<?php

// session_start();
include("functions.php");
// check_session_id();

// $user_id = $_SESSION['user_id'];
$pdo = connect_to_db();

$sql = 'SELECT * FROM t_inquiry WHERE is_deleted = 0';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/inquiry_read.css">
    <title>お問い合わせ一覧画面</title>
</head>

<body>
    <h3>お問い合わせ一覧</h3>
    <div class="container">
        <div id="output"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        //お問い合わせ一覧
        const data = <?= json_encode($result) ?>;
        const output_data = []; //空の配列にプッシュする
        data.forEach(function(x) {
            output_data.push(`
        <div class="inquirys">
        <div class="my-3" >
        <form action="inquiry_delete.php" method="get">
        <button type="submit" class="card" style="color: black; " >
        <div class="list">
            <div class="card-body text-start" >
            <h2 class="card-title" id="name">名前:${x.last_name} ${x.first_name}</h2>
            <h2 class="card-title" id="tel">電話番号:${x.tel}</h2>
            <h2 class="card-title" id="email">メールアドレス:${x.email}</h2>
            <h2 class="card-title" id="subject">件名:${x.subject}</h2>   
            <h2 class="card-title" id="message">お問い合わせ内容:${x.message}</h2>  
            <input name="id" type="hidden" value="${x.id}">
            </div>
        </div>
        </button>  
        </div>
        </form>
        </div>
        </div>
        `)
        });
        $("#output").html(output_data);
        //お問い合わせの挿入ここまで
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"> </script>

</body>

</html>