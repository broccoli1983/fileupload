<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/inquiry_input.css">
    <title>えころじー | お問い合わせフォーム</title>
</head>

<!-- <body class="bg-light"> -->

<body>
    <header bg-light id="header">
        <a href="#section_about">
            <img src="img/minilogo.png" alt="logo" />
        </a>
        <div class="menu">
            <nav>
                <ul id="g-navi">
                    <li class="navitext"><a href="#section_about">8COLOGYについて</a></li>
                    <li class="navitext"><a href="#section_infog">数字でみる8COLOGY</a></li>
                    <li class="navitext"><a href="#section_howto">リサイクルのやり方</a></li>
                    <li>
                        <div class="popup_wrap">
                            <input id="trigger" type="checkbox">
                            <div class="popup_overlay">
                                <label for="trigger" class="popup_trigger"></label>
                                <div class="popup_content">
                                    <label for="trigger" class="close_btn">×</label>
                                    <p>QRコードをスキャンするとLINEの友だちに追加されます<br>
                                        <img src="https://qr-official.line.me/sid/M/266kegaz.png"><br>
                                        QRコードをスキャンするには、LINEアプリのコードリーダーをご利用ください。
                                    </p>
                                </div>
                            </div>
                        </div>
                        <label for="trigger" class="open_btn">ログイン</label>
                    </li>

                </ul>
            </nav>
        </div>
    </header>
    <div class="bg-white m-8 p-4 rounded">
        <div class="text-center">
            <div class="mt-4 p-5">
                <h1>お問い合わせフォーム</h1>
            </div>
            <form action="inquiry_create.php" method="POST">
                <a class="text-secondary" href="top.php">TOPページ</a>
                <div class="mt-4">
                    <input type="text" name="last_name" placeholder="姓" required class="p-2 rounded border-1" style="width: 250px;">
                    <input type="text" name="first_name" placeholder="名" required class="p-2 rounded border-1" style="width: 250px;">
                </div>
                <div class="mt-4">
                    <input type="text" name="tel" placeholder="電話番号" required class="p-2 rounded border-1" style="width: 500px;">
                </div>
                <div class="mt-4">
                    <!-- pattern=emailのバリデーション -->
                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" placeholder="メールアドレス" required class="p-2 rounded border-1" style="width: 500px;">
                </div>
                <div class="mt-4">
                    <input type="text" name="subject" placeholder="件名" required class="p-2 rounded border-1" style="width: 500px;">
                </div>
                <div class="mt-4">
                    <input type="text" name="message" placeholder="お問い合わせ内容" required class="p-2 rounded border-1" style="width: 500px;">
                </div>
                <div class="mt-4">
                    <input type="hidden" name="id">
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-info text-white" style="width: 500px;">送信する</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>