<?php
$title = 'Peralatan';
spl_autoload_unregister(array('YiiBase','autoload'));
$phpExcelPath = Yii::getPathOfAlias('application.vendors.PHPExcel.Classes');
include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator($title)
->setLastModifiedBy($title)
->setTitle($title)
->setSubject($title)
->setDescription($title)
->setKeywords($title)
->setCategory($title);


// Add some data

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A2', 'No')
->setCellValue('B2', 'Kode Barang')
->setCellValue('C2', 'Nama Barang')
->setCellValue('D2', 'Stock')
->setCellValue('E2', 'Harga Sewa');

 
foreach($dataPeralatan as $key => $each ){
	$index = $key+3;
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A'.$index, $key+1)
	->setCellValue('B'.$index, $each['kode_barang'])
	->setCellValue('C'.$index, $each['nama_barang'])
	->setCellValue('D'.$index, $each['stock'])
	->setCellValue('E'.$index, $each['harga_sewa']);

}

$objPHPExcel->getActiveSheet()->setTitle($title);

$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=".$title.".xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
Yii::app()->end();

//
// Once we have finished using the library, give back the
// power to Yii...
spl_autoload_register(array('YiiBase','autoload'));