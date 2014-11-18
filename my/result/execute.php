<?php
  include "database.php";
  include "PHPExcel.php";
  include 'PHPExcel/IOFactory.php';


  function execute($file, $subjectid, $credits){
    $o=new database();
    $o->connectDB("localhost", "root", "", "ugvle_data");
    $o->createTable($subjectid);
    //$o->insertData('SCS101', 'CS129', 'A+');
    //$o->insertCredits('SCS101', 3);
  
  
    /** load the Excel file**/
    $objReader = PHPExcel_IOFactory::createReader("Excel2007");
    $objReader->setReadDataOnly(true);
    $objPHPExcel = $objReader->load($file);

    //load all result values to 'data' array
    $data =  array();
    $worksheet = $objPHPExcel->getActiveSheet();
    foreach ($worksheet->getRowIterator() as $row) {
      $cellIterator = $row->getCellIterator();
      $cellIterator->setIterateOnlyExistingCells(false);
      foreach ($cellIterator as $cell) {
	$data[$cell->getRow()][$cell->getColumn()] = $cell->getValue();
      }
    }
  
    //insert values to table which named as subject id
    foreach($data as $item){
      $o->insertData($subjectid, $item['A'], $item['B']);
    }
    
    //insert the number of credits for the given subject id
    $o->insertCredits($subjectid,intval($credits));
    unset($objReader);
    unset($objPHPExcel);
    return 'done';
  }
  