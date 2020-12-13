<?php     
	if(!empty($_POST))
	{		
		require_once('Validate_Update.php');
		if($data['success'])
		{
			$pdo = Database::connect();
			$sql = "UPDATE info SET Enrollment=?,Name=?,Contact=?,Email=?,updated_at=NOW() where ID=?";
			$q = $pdo->prepare($sql);
			$q->execute(array($enroll,$name,$contact,$email,$id)) or die("helllo");
			Database::disconnect(); 
			$data['message']=$name.", Your details successfully Updated";
			echo json_encode($data);
		}
		else
		{
			echo json_encode($data);
		}
	}
	else
	{
		echo '<h1>Invalid Page Request</h1>';
	}
?>