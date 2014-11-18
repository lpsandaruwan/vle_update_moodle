<?php

class block_cv extends block_base {
    public function init() {
        $this->title = "Curriculam Vitae";
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    
    public function get_content() {
    
    if (!isloggedin() or isguestuser()) {
      return '';      // Never useful unless you are logged in as real users
    }
    
    if ($this->content !== null) {
      return $this->content;
    }
 
    $this->content         =  new stdClass;
    $this->content->text   ='<a href="cv/cv.php"><center>Curriculam Vitae</center></a>';
    
  
    
    return $this->content;
  }
}   // Here's the closing bracket for the class definition