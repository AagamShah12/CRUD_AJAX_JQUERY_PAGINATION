<?php			
		require_once('Validate.php');

		if ($data['success']) {
			//try
			//{	
            $pdo = Database::connect();
            $sql = "INSERT INTO info (Enrollment,Name,Contact,Email,updated_at) values(?, ?, ?,?,NOW())";
            $q = $pdo->prepare($sql);
            $q->execute(array($enroll,$name,$contact,$email));
            Database::disconnect();
			$data['message']=$name.", Your details Successfully Registered";
			echo json_encode($data);
			//}
			/*catch(PDOException $e)
			{				
				if($e->getCode()==23000)
				{
					//echo $e->errorInfo[2];
					print_r($e->errorInfo);
					$errors['pdoerror']=$e->errorInfo[2];
					$data['errors']=$errors;
					$data['success']=false;
					echo json_encode($data);
					exit();
				}
			}*/
        }
		else
		{
			echo json_encode($data);
		}
?>