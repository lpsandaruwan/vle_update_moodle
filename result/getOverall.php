<?php
  function getOverall($data){
	$con=mysqli_connect("localhost","root","","ugvle_data");
	
	if(mysqli_connect_errno()){
		echo "Database connection failed.";
	}
	
	
	/// read number of credits and store them in an array
	$readCredits=mysqli_query($con,"SELECT subid,number FROM credits");

	
	while($row=mysqli_fetch_assoc($readCredits)){
		$subjectCredits[$row['subid']]=$row['number'];
	}
	
	$enrolledid=array('SCS0001', 'SCS0002', 'SCS0003', 'SCS0004', 'SCS0005');
	
     
	$userid=$data;
	
	if($userid=='admin'||$userid=='manager1'){
	  echo "admin panel"; 
	}
	echo "<h1>".$userid." Overall report"."</h1>";
	echo "<table id='display'>";
	/// read grades for each subject and store them in an array
	foreach($enrolledid as $subject){
	  echo "<tr><td>";
	  echo $subject."<br></td>";
	//echo $userid;
	  $getGrade="SELECT * FROM $subject WHERE userid='$userid'";
	  if($loaded=(mysqli_fetch_row(mysqli_query($con,$getGrade))));//{}
	  //else{ echo mysqli_errno($con);}
	  echo "<td>".$loaded[1]."<br></td>"; 
	  echo "</tr>";
	}
	echo "</table>";
}
