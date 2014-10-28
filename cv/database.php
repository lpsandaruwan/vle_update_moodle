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
      
      
      public function storeData($table, $userid, $dataType, $data){
	
      }
      
      public function getData($table, $userid, $dataType){
	
      }
  }