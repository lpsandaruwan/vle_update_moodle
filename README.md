vle_update_moodle
=======
-> CW= completed, working
-> CB= completed, buggy
-> CN= completed, not tested
-> NC= not completed

This update contains following custom made units,

    -/cv
    This module cotains PHP codes to display the logged in student's CV. Half of it, is automatically genarated        using     information in internal database and the other half is for the user to edit. Our goal is to generate     a standard      format for each and every student, that can be compaired by the industries easily.  status: NC
    - /result
    This module contains a excel reader, for course admins of our university to upload result sheet in excel format     and upload them into a separate database as the course admins requested. Also this separate database gives the     ability to students to see their results privately.    status: CB

and contains custom made blocks,
  - cv             /blocks/cv            Display a link to a CV, genarating half automatically itself  status: CW
  - edit_cv        /blocks/edit_cv       Display a link to edit the rest of the generated CV           status: CW
  - gpacal         /blocks/gpacal        Display the great point average value for logged in user      status: CB
  - sheets         /blocks/sheets        Display a link to upload excel result sheet                   status: CW 
  - showresults    /blocks/showresults   Display a link to view overall report for logged in student   status: CW
  - fullreport     /blocks/fullreport    Display a link to view a uploaded result sheet for lecturer   status: CW
