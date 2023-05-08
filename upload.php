<?php

$dsn = "mysql:host=localhost; dbname=xxx; charset=utf8";
$username = "xxx";
$password = "xxx";

try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

    if (isset($_POST['upload'])) { //送信ボタンが押された場合
        $image = uniqid(mt_rand(), true); //ファイル名をユニーク化
        $image .= '.'.substr(strrchr($_FILES['image']['name'], '.'), 1); //アップロードされたファイルの拡張子を取得
        $file = "images/$images";
        $sql = "INSERT INTO images(name) VALUES (:image)";
        $stmt = $dbn->prepare($sql);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);

        if(!empty($_FILES['image']['name'])) { //ファイルが選択されていれば$imageにファイル名を代入
            move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image); //imagesディレクトリにファイル保存

            if(exif_imagetype($type)) { //画像ファイルかのチェック
                $message = '画像をアップロード';
                $stmt->execute();
            } else {
                $message = '画像ファイルではありません';
            }
        }
    }

?>


<h1>画像のアップロード</h1>

<!-- 送信ボタンが押された場合 -->
<?php if (isset($_POST['upload'])): ?>
<p><?php echo $message; ?></p>
<p><a href="image.php">画面表示へ</a></p>
<?php else: ?>
<form method="post" enctype="multipart/form-data">
    <p>アップロード画像</p>
    <input type="file" name="image">
    <button>
        <input type="submit" name="upload" value="送信する">
    </button>
</form>
<?php endif; ?>