<?php 

require_once __DIR__ . '/../vendor/autoload.php';

use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$now = Carbon::now();
echo "La fecha y hora actual es: ".$now->toDateTimeString();

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Nombre');
$sheet->setCellValue('A2', 'Migue');

$writer = new Xlsx($spreadsheet);
$filename = 'excel\myExcel.xlsx';
$writer->save($filename);

echo "Se ha creado el archivo: ".$filename;
