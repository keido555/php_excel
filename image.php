<?php

$dsn = "mysql:host=localhost; dbname=xxx; charset=utf8";
$username = "xxx";
$password = "xxx";
$id = rand(1,5);

try {
    $dsn = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "SELECT * FROM images WHERE id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$image = $stmt->fetch();

?>

<h1>画像表示</h1>
<img src="images/<?php echo $image['name']; ?>" alt="image" width="300" height="300">
<a href="upload.php">画像アップロード</a>