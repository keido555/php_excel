<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// スプレッドシート作成
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// 値とセルを指定
$sheet->setCellValue('B1', '英語');
$sheet->setCellValue('C1', '数学');
$sheet->setCellValue('A2', 'Aさん');
$sheet->setCellValue('A3', 'Bさん');
$sheet->setCellValue('B2', '90');
$sheet->setCellValue('B3', '80');
$sheet->setCellValue('C2', '70');
$sheet->setCellValue('C3', '95');

// Excelファイル書き出し
$writer = new Xlsx($spreadsheet);
$writer->save('score.xlsx');

?>