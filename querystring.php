<?php
  // Define database query
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to MySQL server.');
   $query = "SELECT sandboxswipe.work_visit.tutorID as ID,sandboxswipe.tutor.imgPath as image,sandboxswipe.tutor_ability.CourseID as TCourseID, sandboxswipe.student.FirstName as FirstName,sandboxswipe.student.LastName as LastName FROM sandboxswipe.work_visit,sandboxswipe.tutor_ability,sandboxswipe.tutor,sandboxswipe.student where 
   sandboxswipe.work_visit.tutorID =sandboxswipe.tutor.tutorID AND
   sandboxswipe.tutor_ability.tutorID= sandboxswipe.work_visit.tutorID AND
   sandboxswipe.tutor.studentHash = sandboxswipe.student.studentHash AND
   sandboxswipe.work_visit.startTime >0 AND sandboxswipe.work_visit.endTime =0";
?>
