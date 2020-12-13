<?php
	if(!empty($_POST))
	{
		$pdo = Database::connect();
		$sql = "SELECT * FROM info where ID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($_POST['id']));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();	
?>

<script type="text/javascript">
	$('title').html("<?= $data['Name'] ?>-Update_Details");
</script>
<center>
<div class="message"></div>
<form name="Update" id="update-form">
<table align=center>
<tr>
	<td><b>ENROLLMENT :-</b></td>
	<td> <input type="text" name="enroll" value="<?= $data['Enrollment'] ?>"/><br/><br/></td>
	<td class="invalid_enroll"></td>
</tr>
<tr>
	<td><b>NAME :-</b></td>
	<td><input type="text" name="name" value="<?= $data['Name'] ?>"/><br/><br/></td>
	<td class="invalid_name"></td>
</tr>
	<tr>	
	<td><b>CONTACT :- </b></td>
	<td><input type="text" name="contact"  value="<?= $data['Contact'] ?>" /><br/><br/></td>
	<td class="invalid_contact"></td>
</tr>
<tr>
	<td><b>EMAIL :- </b></td>
	<td><input type="text" name="email"  value="<?= $data['Email'] ?>" /><br/><br/></td>
	<td class="invalid_email"></td>
</tr>
<tr>
	<td colspan=3><center><input type="submit" value="UPDATE"></center></td>
</tr>		
</table>
	<input type="hidden" name="id" value="<?= $data['ID'] ?>">
</form>
</center>
<script type="text/javascript">
	update("#update-form");
</script>
<?php
	}
	else
	{
		echo '<h1>Invalid Page Request</h1>';
	}
?>