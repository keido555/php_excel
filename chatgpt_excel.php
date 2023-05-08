<?php

// PHPExcelライブラリを読み込む
require_once 'PHPExcel/PHPExcel.php';

// アップロードされたExcelファイルの情報を取得する
$uploadedFile = $_FILES['excel_file']['tmp_name'];

// Excelファイルを読み込む
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load($uploadedFile);

// Excelファイルの1番目のシートを取得する
$worksheet = $objPHPExcel->getSheet(0);

// Excelファイルの行数と列数を取得する
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

// Excelファイルの内容を出力する
echo "<table border='1'>";
    for ($row = 1; $row <= $highestRow; ++$row) { echo "<tr>" ; for ($col=0; $col < $highestColumnIndex; ++$col) {
        $cellValue=$worksheet->getCellByColumnAndRow($col, $row)->getValue();
        echo "<td>$cellValue</td>";
        }
        echo "</tr>";
        }
        echo "</table>";

?>

<!-- 上記の例では、アップロードされたExcelファイルの情報を取得し、PHPExcelライブラリを使用してファイルを読み込み、
1番目のシートの内容をHTMLのテーブル形式で出力しています。行数と列数も取得しています。
必要に応じて、これらの情報を使ってデータベースに保存するなどの処理を追加できます。 -->