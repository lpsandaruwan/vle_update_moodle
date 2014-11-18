<?php

class block_fullreport extends block_base {
    public function init() {
        $this->title = "Overall report";
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    //
    public function get_content() {
    global $USER;
    if (!isloggedin() or isguestuser()) {
      return '';      // Never useful unless you are logged in as real users
    }
    
    if ($this->content !== null) {
      return $this->content;
    }
 
    $this->content         =  new stdClass;
    if($USER->username=='admin'||$USER->username=='manager1'){
      $this->content->text .= 'Admin panel';
    }
    else{
      $this->content->text   .='<a href="result/overall.php"><center>Click here to display overall report</center></a>';
    }
  
    
    return $this->content;
  }
}   // Here's the closing bracket for the class definition