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
	$('title').html("<?= $data['Name'] ?>-Details");
</script>
<table border=1>
	<tr>
		<th>Enrollment No</th>
		<td id="enroll"><?= $data['Enrollment'] ?></td>
	</tr>
	<tr>
		<th>Name</th>
		<td id="name"><?= $data['Name'] ?></td>
	</tr>
	<tr>
		<th>Contact</th>
		<td id="contact"><?= $data['Contact'] ?></td>
	</tr>
	<tr>
		<th>Email</th>
		<td id="email"><?= $data['Email'] ?></td>
	</tr>
	<tr>
		<th>Created At</th>
		<td id="created_at"><?= cal_date($data['created_at']) ?></td>
	</tr>
	<tr>
		<th>Updated At</th>
		<td id="updated_at"><?= cal_date($data['updated_at']) ?></td>
	</tr>
</table>
<?php
	}
	else
	{
		echo '<h1>Invalid Page Request</h1>';
	}
?>