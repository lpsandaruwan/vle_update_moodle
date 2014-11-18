<?php
  
  require_once('../../config.php');
  include('execute.php');
  
  $PAGE->set_context(get_system_context());
  $PAGE->set_pagelayout('standard');
  $PAGE->set_title("Result storage");
  $PAGE->set_heading("Result sheets ");
  //$PAGE->set_url($CFG->wwwroot.'/blank_page.php');

  
  echo $OUTPUT->header();
  
    $subjectid=$_POST["subjectid"];
  $credits=$_POST["credits"];
  $file=$_POST["file"];
  
  if(!isset($_POST['submit'])){
  
?>

<form method="post" action="<?php echo $PHP_SELF;?>">
  Subject ID</br><input type="text" size="12" maxlength="12" name="subjectid"></br></br>
  Total number of credits</br><input type="text" size="2" maxlength="2" name="credits"></br></br>
  Select the .xlsx file</br><input type="file" name="file" /></br></br>
  <input type="submit" value="Submit" name="submit">
</form>

  
<?}
  else{
  execute($file, $subjectid, $credits);
  }
  echo $OUTPUT->footer();
?>
