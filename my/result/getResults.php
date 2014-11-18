<?php
  function getResults($subjectid){
	$con=mysqli_connect("localhost","root","","ugvle_data");
	
	if(mysqli_connect_errno()){
		echo "Database connection failed.";
	}

	if($readCredits=mysqli_query($con,"SELECT * FROM $subjectid")){echo "<h1>".$subjectid."</h1>";}
	else{echo "Result sheet hasn't been uploaded yet or check whether the Course ID is correct.";}
	
	 echo "<table id='display'>";
	
	
	while($row=mysqli_fetch_assoc($readCredits)){
	  //echo "<br>";
	  echo "<tr><td>";
	  echo $row['userid']."<br></td>";
	  echo "<td>".$row['grade']."<br></td>";    
	  echo "</tr>";
	
	}
	
	echo "</table>";
	//print_r($subjectCredits);
	//foreach($subjectCredits as $key->$index){
	//echo $key;
	//}
}
  