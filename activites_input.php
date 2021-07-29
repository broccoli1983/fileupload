<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/about.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>えころじー | 活動実績登録画面</title>
</head>

<body class="bg-light">
    <div class="bg-white m-5 p-3 rounded">
        <div class="text-center">
            <form action="activites_create.php" method="POST" enctype="multipart/form-data">
                <a class="text-secondary" href="activites_read.php">一覧画面</a>
                <div class="mt-4 mb-4">
                    <h1>活動実績登録</h1>
                </div>
                <div class="mt-4 fs-4">
                    <input placeholder="活動日" type="text" name="activites_name" class="border border-info border-2 rounded">
                </div>
                <div class="mt-4 fs-4">
                    <input placeholder="活動名" type="text" name="activites_date" class="border border-info border-2 rounded">
                </div>
                <div class="mt-4 fs-4">
                    <input placeholder="コメント" type="text" name="comment" class="border border-info border-2 rounded">
                </div>
                <div class="mt-4 fs-4">
                    <input type="file" name="img" accept="image/*">
                </div>
                <div>
                    <input type="hidden" name="id">
                </div>
                <div class="mt-4 fs-4">
                    <button type="submit" class="btn btn-info text-white">送信</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>