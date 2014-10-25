<?php
  class database{
    var $username, $host, $pwd, $dbname;
    
      public function connectDB($username, $hostname, $passwd, $dbname){
	$this->username=$username;
	$this->hostname=$hostname;
	$this->passwd=$passwd;
	$this->dbname=$dbname;
	
	$this->mysqli=new mysqli($this->username, $this->hostname, $this->passwd, $this->dbname);
	
	if($this->mysqli->connect_error){
	  die('Error : mysqi:connect_errno').$this->mysqli->conn;
	}
      }
      
      public function createTable($tbname){
	$createTable="CREATE TABLE $tbname(
	  userid VARCHAR (10) NOT NULL PRIMARY KEY,
	  grade VARCHAR (2) NOT NULL
	  )";
	$tbQuery=mysqli_query($this->mysqli,$createTable);
      }
  
      public function insertData($tbname, $id, $grd){
	$insertGrade="INSERT INTO $tbname(userid, grade) VALUES ('$id', '$grd')";
	if($tbQuery=mysqli_query($this->mysqli, $insertGrade)){echo 'User '.$id.' result '.$grd.' updated.</br>';}
	else{die(mysqli_error($this->mysqli));}
      }
      
      public function insertCredits($subjectid, $number){
	$insertValue="INSERT INTO credits(subid, number) VALUES('$subjectid', $number)";
	if($tbQuery=mysqli_query($this->mysqli, $insertValue)){echo "done!";}
	else{die(mysqli_error($this->mysqli));}
      }
  }