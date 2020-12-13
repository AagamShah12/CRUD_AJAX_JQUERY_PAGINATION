<?php
		
	$errors         = array();
	$data           = array();
	//print_r($_POST); die;
 
        $enroll = $_POST['enroll'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        
		function test_input($data)
		{
			$data=trim($data);
			$data=strip_tags($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			$data=filter_var($data, FILTER_SANITIZE_STRING);
			$data=filter_var($data, FILTER_SANITIZE_STRIPPED);
			return $data;
		}
		
		$enroll=filter_var($enroll,FILTER_SANITIZE_NUMBER_INT);
		$contact=filter_var($contact,FILTER_SANITIZE_NUMBER_INT);
		$name=test_input($name);	

		chdir(dirname(__DIR__));
		require 'library/Database.php';
		$pdo=Database::connect();
		
        if (empty($enroll)) {
            $errors['enroll'] = 'Please enter Enrollment';
        }
		else{
			if(strlen($enroll)!=12||!filter_var($enroll,FILTER_VALIDATE_FLOAT))    //or is_numeric
			{	$errors['enroll'] = 'Enrollment must be 12 digit numeric only.';}
			else
			{
				//$pdo=Database::connect();
				$sql='select count(*) from info where Enrollment='.$enroll;
				$ans=$pdo->query($sql);
				//print_r($ans->fetchColumn());
				if($ans->fetchColumn()==1)
					$errors['enroll']='This Enrollment is Already Exists';
				//Database::disconnect();
			}
		}
     
        if (empty($name)) {
            $errors['name'] = 'Please enter Name';
        }
		else{
			if(!(preg_match("/^[A-Za-z\s]+$/",$name))){
				$errors['name'] = 'Please enter valid Name';}
			if(strlen($name)>20){
				$errors['name'] = 'You can enter maximum 20 letters';}
		}
		
        if (empty($email)) {
            $errors['email'] = 'Please enter Email Address';
        } 
		else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) )
		{   $errors['email'] = 'Please enter a valid Email Address';}
		else
			{				
				//$pdo=Database::connect();
				$sql=$pdo->prepare('select * from info where Email=?');
				$sql->execute(array($email));
				//print_r($sql->rowCount());
				if($sql->rowCount()==1)
					$errors['email']='This Email is Already Exists';
				//Database::disconnect();
			}
    
        if (empty($contact)) {
            $errors['contact'] = 'Please enter Contact Number';
        }
		else{
			if(strlen($contact)!=10||!(preg_match('/^[0-9]/',$contact))){
				$errors['contact'] = 'Please enter valid 10 digit numeric Contact Number';
			}			
			else
			{
				//$pdo=Database::connect();
				$sql='select count(*) from info where Contact='.$contact;
				$ans=$pdo->query($sql);
				if($ans->fetchColumn()==1)
					$errors['contact']='This Contact is Already Exists';
				//Database::disconnect();
			}
		}
		Database::disconnect();

		 if ( ! empty($errors)) {
        // if there are items in our errors array, return those errors
			$data['success'] = false;
			$data['errors']  = $errors;
		} 
		else {
        // if there are no errors process our form, then return a message
        // show a message of success and provide a true success variable
			$data['success'] = true;
		}
		
		// return all our data to an AJAX call
		//echo json_encode($data); 
		//exit();    
?>