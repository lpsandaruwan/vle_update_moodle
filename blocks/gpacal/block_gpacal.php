<?php
class block_gpacal extends block_base {
    public function init() {
        $this->title = "GPA";//get_string('gpacal', 'block_gpacal');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    
    public function get_content() {
    global $USER, $DB;
    
    if (!isloggedin() or isguestuser()) {
      return '';      // Never useful unless you are logged in as real users
    }
    
    if ($this->content !== null) {
      return $this->content;
    }
    if(($USER->username)=='admin'){
    
    
    $this->content         =  new stdClass;
    $this->content->text   ="Admin panel";
    return $this->content;}
    else{
      include 'calculate.php';
      //$mycourses = enrol_get_all_users_courses($user->id, true, null, 'visible DESC, sortorder ASC';
      $this->content->text .="Current GPA   ";
      $this->content->text .=calculate($USER->username);
    
    }
  }
}   // Here's the closing bracket for the class definition