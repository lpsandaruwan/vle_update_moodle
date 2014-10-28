<?php
  function calculate($data){
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
	/// read grades for each subject and store them in an array
	foreach($enrolledid as $subject){
	//echo $userid;
	  $getGrade="SELECT * FROM $subject WHERE userid='$userid'";
	  $loaded=(mysqli_fetch_row(mysqli_query($con,$getGrade)));
	  $subjectGrades[$subject]=$loaded[1];
	}
	//print_r($subjectGrades);
	
	/// calculate GP value and total credits
	$gradePoints=0.0; $totalCredits=0;
	foreach($subjectGrades as $key => $index){ 
		///echo $index." ";
		//echo $subjectCredits[$key]." ";
		if($index=='A+'){$gradePoints += 4.25*$subjectCredits[$key]; $totalCredits += $subjectCredits[$key];}
		else if($index=='A'){$gradePoints += 4*$subjectCredits[$key]; $totalCredits += $subjectCredits[$key];}
		else if($index=='A-'){$gradePoints += 3.75*$subjectCredits[$key]; $totalCredits += $subjectCredits[$key];}
		else if($index=='B+'){$gradePoints += 3.25*$subjectCredits[$key]; $totalCredits += $subjectCredits[$key];}
		else if($index=='B'){$gradePoints += 3*$subjectCredits[$key]; $totalCredits += $subjectCredits[$key];}
		else if($index=='B-'){$gradePoints += 2.75*$subjectCredits[$key]; $totalCredits += $subjectCredits[$key];}
		else if($index=='C+'){$gradePoints += 2.25*$subjectCredits[$key]; $totalCredits += $subjectCredits[$key];}
		else if($index=='C'){$gradePoints += 2*$subjectCredits[$key]; $totalCredits += $subjectCredits[$key];}
		else if($index=='C-'){$gradePoints += 1.75*$subjectCredits[$key]; $totalCredits += $subjectCredits[$key];}
		else if($index=='D+'){$gradePoints += 1.25*$subjectCredits[$key]; $totalCredits += $subjectCredits[$key];}
		else if($index=='D'){$gradePoints += 1*$subjectCredits[$key]; $totalCredits += $subjectCredits[$key];}
		else if($index=='F'){$gradePoints += 0; $totalCredits += $subjectCredits[$key];}
		else if($index=='AB'){$gradePoints += 0; $totalCredits += $subjectCredits[$key];}
		else{$gradePoints += 0;} //echo $gradePoints." ". $totalCredits;
	}
	
	/// calculate gpa
	$gpa=($gradePoints/$totalCredits);
	//echo $gpa;
	$rankTable="REPLACE INTO rank(userid, gpa) VALUES ('$userid', $gpa)";
	if(mysqli_query($con, $rankTable)){}
	else{echo mysqli_errno($con);}
	
	//$rankUpdate="SELECT userid, gpa FROM rank ORDER BY rank.gpa DESC";
	//if(mysqli_query($con, $rankUpdate)){}
	//else{echo mysqli_errno($con);}
	
	
	mysqli_close($con);
	return "<h1><font color='red' >".(number_format($gpa, 4, '.', ''))."</font></h1>";
	//return 'fine';*/
  }