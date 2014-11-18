<?php
  
  require_once('../config.php');
  include('database.php');
  
  
  $PAGE->set_context(get_system_context());
  $PAGE->set_pagelayout('mydashboard');
  $PAGE->set_title("Curriculam Vitae");
  $PAGE->set_heading("Curriculam Vitae");
  //$PAGE->set_url($CFG->wwwroot.'/blank_page.php');
  global $USER;
  
  echo $OUTPUT->header();
  
  
  if($USER->username=='admin'){
    echo("Admin Panel");
  }
  
  else{
  
    echo("<b><div align='left'><font size='6'>".$USER->firstname." ".$USER->lastname."</font></div></b>");
    echo("<b><font size='2'>");
    
    if($USER->email!='')
      echo($USER->email);
    if($USER->phone2!='')
      echo("  |  ".$USER->phone2);
    if($USER->address!='')
      echo("  |  ".$USER->address."</font></b>");
    echo "<br><br><br><br>";
    
    
    echo("<font size='4'>Highlights</font>");
    echo "<hr color='red'>";
    //echo(highlight)
    
    echo "<br><br>";
    echo("<font size='4'>Experience</font>");
    echo "<hr color='red'>";
    
    echo "<br><br>";
    echo("<font size='4'>Education</font>");
    echo "<hr color='red'>";
    
    echo "<br><br>";
    echo("<font size='4'>Personal</font>");
    echo "<hr color='red'>";    
  }
  
  
  
  
  
  
  
  
  
  
  
  echo $OUTPUT->footer();