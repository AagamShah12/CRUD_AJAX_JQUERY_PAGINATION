<?php	

$activePage=$_POST['activePage'];

$pdo=Database::connect();

$sql='select * from info';
$total_records=$pdo->prepare($sql);
$total_records->execute();
$total_records=$total_records->rowCount();
$limit=3;
$totalPages=$total_records/$limit;
$totalPages=ceil($totalPages);
$start=($activePage-1)*$limit;

$sql='select * from info ORDER BY Enrollment LIMIT '.$start.','.$limit;
$records=$pdo->query($sql);

Database::disconnect();


if(empty($records)) { ?>
<tr>
	<td colspan="9" align="center">No Records Found.</td>
</tr>
<?php
}
else{
	foreach($records as $row) { ?>
	<tr>
		<td><?php echo $row['Enrollment']; ?></td>
		<td><?php echo $row['Name']; ?></td>
		<td><?php echo $row['Contact']; ?></td>
		<td><?php echo $row['Email']; ?></td>
		<td><?php echo cal_date($row['created_at']); ?></td>
		<td><?php echo cal_date($row['updated_at']); ?></td>
		<td><button data-id="<?=$row['ID']?>" data-name="<?=$row['Name']?>" pno="<?=$activePage?>" back="grid" onclick="read(this)">Read</button></td>
		<td><button data-id="<?=$row['ID']?>" data-name="<?=$row['Name']?>" pno="<?=$activePage?>" back="grid" onclick="update_student(this)">Update</button></td>
		<td><div id="del_<?=$row['ID']?>"><button data-id="<?=$row['ID']?>" data-name="<?=$row['Name']?>" onclick="delete1(this)">Delete</button></div></td>
	</tr>
<?php
	}
}
?>