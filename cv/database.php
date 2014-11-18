<?php

	$con=new mysqli("localhost","root","","ugvle_data");
	
	if(mysqli_connect_errno()){
		echo "Database connection failed.";
	}
	
	
      
      function dataCheck($table, $userid){
      $con=mysqli_connect("localhost","root","","ugvle_data");
	$tbquery="SELECT data FROM '$table' WHERE userid='$userid'";
	if($data=mysqli_query($con, $tbquery))echo"work";
	print_r($data);
	return $data;
      }
      /**
      public function storeData($table, $userid, $dataType, $data){
	
      }
      
      public function getData($table, $userid, $dataType){
	
      }**/
  

   echo (dataCheck("highlights", "2012cs1"));
  
  ?>