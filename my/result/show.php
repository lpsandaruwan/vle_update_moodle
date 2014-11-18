<?php
  require_once('../../config.php');
  include('getResults.php');
  
  $PAGE->set_context(get_system_context());
  $PAGE->set_pagelayout('standard');
  $PAGE->set_title("Course report");
  $PAGE->set_heading("Course Report");
  
  echo $OUTPUT->header();
  
  $subjectid=$_POST["subjectid"];
  
  if(!isset($_POST['submit'])){
  
?>

<form method="post" action="<?php echo $PHP_SELF;?>">
  Subject ID</br><input type="text" size="12" maxlength="12" name="subjectid"></br></br>
  <input type="submit" value="Submit" name="submit">
</form>

<?}
  else{
    getResults($subjectid);
  }
  echo $OUTPUT->footer();
?>
