<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if($_POST){ ?>
    <!-- 確認画面 -->
    <form action="./cotactform.php" method="post">
        名前 <?php echo $_POST["fullname"] ?>
        Eメール <?php echo $_POST["email"] ?>
        本文 <?php echo nl2br($_POST["message"]) ?>
        <input type="submit" name="back" value="戻る" />
        <input type="submit" name="send" value="送信" />
    </form>
    <?php } else { ?>
    <!-- 入力画面 -->
    <form action="./contactform.php" method="post">
        名前 <input type="text" name="fullname" value="">
        Eメール <input type="email" name="email" value="">
        本文 <textarea name="message" id="" cols="" rows=""></textarea>
        <input type="submit" name="confirm" value="確認" class="button">
    </form>
    <?php } ?>
</body>

</html>