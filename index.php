<?php 
header('Content-type: text/html; charset=utf-8');

function readExelFile($filepath){
require_once "PHPExcel.php"; //подключаем наш фреймворк
$ar=array(); // инициализируем массив
$inputFileType = PHPExcel_IOFactory::identify($filepath);  // узнаем тип файла, excel может хранить файлы в разных форматах, xls, xlsx и другие
$objReader = PHPExcel_IOFactory::createReader($inputFileType); // создаем объект для чтения файла
$objPHPExcel = $objReader->load($filepath); // загружаем данные файла в объект
$ar = $objPHPExcel->getActiveSheet()->toArray(); // выгружаем данные из объекта в массив
return $ar; //возвращаем массив
}

$file_path_excel = "lnks.xlsx";
$before_lnks = readExelFile($file_path_excel);
$i = 0;

foreach($before_lnks as $ar_colls){
$lnks_id[]  = $ar_colls[0];
$lnks_idtw[]  = $ar_colls[8];
}

$res = array_diff($lnks_id, $lnks_idtw);
foreach ($res as $keye) {
echo "<br />" . $keye . "<br />";
}

echo "<br /><br /><br /><hr>";
?>