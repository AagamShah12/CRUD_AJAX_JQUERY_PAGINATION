<?php
	if(!empty($_POST))
	{	
		$id=$_POST['id'];
		$name=$_POST['name'];

		chdir(dirname(__DIR__));
		require 'library/Database.php';
		$pdo=Database::connect();
		$sql="DELETE from info where ID=?";
		$q=$pdo->prepare($sql);
		$q->execute(array($id));
		$flag=true;
		Database::disconnect();
		echo $flag;
	}
	else
	{
		echo false;
	}
?>
