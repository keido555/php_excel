<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        $mode = "input";
        if (isset($_POST["back"]) && $_POST["back"]) {
            // 何もしない
        } else if (isset($_POST["confirm"]) && $_POST["confirm"] ){
            $mode = "confirm";
        } else if(isset($_POST["send"]) && $_POST["send"]) {
            $mode = "send";
        }
    ?>

    <?php 
        session_start();
        $mode = "input";
        if (isset($_POST["back"]) && $_POST["back"]) {
            // 何もしない
        } else if(isset($_POST["confirm"]) && $_POST["confirm"]) {
            $_SESSION["fullname"] = $_POST["fullname"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["message"] = $_POST["message"];
            $mode = "confirm";
        } else if (isset($_POST["send"]) && $_POST["send"]) {
            $mode = "send";
        } else {
            $_SESSION = array();
        }
    ?>

    <?php if ($mode == "input") { ?>
    <!-- 入力画面 -->
    <form action="./contactform.php" method="post">
        名前 <input type="text" name="fullname" value="">
        Eメール <input type="email" name="email" value="">
        本文 <textarea name="message" id="" cols="" rows=""></textarea>
        <input type="submit" name="confirm" value="確認" class="button">
    </form>
    <?php } else if($mode == "confirm"){ ?>
    <!-- 確認画面 -->
    <form action="./cotactform.php" method="post">
        名前 <?php echo $_POST["fullname"] ?>
        Eメール <?php echo $_POST["email"] ?>
        本文 <?php echo nl2br($_POST["message"]) ?>
        <input type="submit" name="back" value="戻る" />
        <input type="submit" name="send" value="送信" />
    </form>
    <?php } else { ?>
    <!-- 確認画面 -->
    <?php } ?>
</body>

</html>