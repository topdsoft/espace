<?php
// debug($members);
	echo "Email Address,First,Last\n";
	foreach($members as $member) {
		//loop for each member and write a line
		echo $member['email'].',';
		echo $member['first_name'].',';
		echo $member['last_name']."\n";
	}//end foreach

?>