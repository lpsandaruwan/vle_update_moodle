<?php

class block_sheets extends block_base {
    public function init() {
        $this->title = "Result sheet upload";
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    
    public function get_content() {
    global $CFG, $USER, $DB, $OUTPUT, $PAGE, $ENROLMENT;
    
    if (!isloggedin() or isguestuser()) {
      return '';      // Never useful unless you are logged in as real users
    }
    
    if ($this->content !== null) {
      return $this->content;
    }
 
    $this->content         =  new stdClass;
    $this->content->text   ='Test';
    

    
    return $this->content;
  }
}   // Here's the closing bracket for the class definition