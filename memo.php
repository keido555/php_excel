<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>メモ</p>

    <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
        <input type="text" name="personal_name"><br /><br />
        <textarea name="contents" id="text_area" cols="40" rows="10"></textarea><br /><br />
        <input type="submit" name="btn1" value="記録する">
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        writeDate();
    }

    readData();

    function readData() {
        $memo_file = "memo.txt";

        $fp = fopen($memo_file, "rb");

        if ($fp) {
            if(flock($fp, LOCK_SH)){
                while(!feof($fp)) {
                    $buffer = fgets($fp);
                    print($buffer);
                }
                flock($fp, LOCK_UN);
            } else {
                print("記録に失敗");
            }
        }
        fclose($fp);
    }

    function writeData() {
        $personal_name = $_POST['personal_name'];
        $contents = $_POST['contents'];
        $contents = nl2br($contents);

        $data = "<hr>\r\n";
        $data = $data."<p>投稿者:".$personal_name."</p>\r\n";
        $data = $data."<p>内容：</p>\r\n";
        $data = $data."<p>".$contents."</p>\r\n";

        $memo_file = "memo.txt";

        $fp = fopen($memo_file, "ab");
        if($fp){
            if(fopen($fp, LOCK_EX)){
                if(fwrite($fp, $data) === FALSE){
                    print("ファイル書き込みに失敗");
                }
                flock($fp, LOCK_UN);
            } else {
                print("ファイルロックに失敗");
            }
        }
        fclose($fp);
    }

    ?>
</body>

</html>