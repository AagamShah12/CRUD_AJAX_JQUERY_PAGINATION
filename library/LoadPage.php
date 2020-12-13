<?php
	if(!file_exists('Database.php')) {
		echo "No Database Connection.";
		exit;
	}

	require_once('Database.php');
	
	chdir(dirname(__DIR__));
	$page= $_POST['page'];
	require_once($page);
	
	function cal_date($date1){
		$olddate=new DateTime($date1);
		$curdate=new DateTime();
		date_timestamp_get($curdate);
		$difdate=date_diff($olddate,$curdate);
		if($difdate->format('%y')){
			if($difdate->format('%y')==1)
					echo $difdate->format('%y year ago');
			else	echo $difdate->format('%y years ago');
		}
		elseif($difdate->format('%m')){
			if($difdate->format('%m')==1)
					echo $difdate->format('%m month ago');
			else	echo $difdate->format('%m months ago');
		}
		elseif($difdate->format('%d')){
			if($difdate->format('%d')==1)
					echo $difdate->format('%d day ago');
			else	echo $difdate->format('%d days ago');
		}			
		elseif($difdate->format('%h')){
			if($difdate->format('%h')==1)
					echo $difdate->format('%h hour ago');
			else	echo $difdate->format('%h hours ago');
		}			
		elseif($difdate->format('%i')){
			if($difdate->format('%i')==1)
					echo $difdate->format('%m minute ago');
			else	echo $difdate->format('%m minutes ago');
		}			
		else
			echo 'Just now';
	}
?>