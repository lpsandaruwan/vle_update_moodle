<?php
  require_once('../../config.php');
  include('getOverall.php');
  
  global $USER;
  
  $PAGE->set_context(get_system_context());
  $PAGE->set_pagelayout('standard');
  $PAGE->set_title("Overall report");
  $PAGE->set_heading("Overall Report");
  
  echo $OUTPUT->header(); 

  getOverall($USER->username);
  
  echo $OUTPUT->footer();
?>
