<?php

	echo "Email Address,First,Last\n";
	foreach($members as $member) {
		//loop for each member and write a line
		echo $member['Member']['email'].',';
		echo $member['Member']['first_name'].',';
		echo $member['Member']['last_name']."\n";
	}//end foreach

?>