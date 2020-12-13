<table border="1">			
	<thead>
		<tr>
			<th>Enrollment No</th>
			<th>Name</th>
			<th>Contact</th>
			<th>Email</th>
			<th>Created at</th>
			<th>Updated at</th>
			<th colspan=3>Action</th>
		</tr>
	</thead>
	<tbody id="main-table-body">
		<tr>
			<td colspan="7" align="center">Loading...</td>
		</tr>
	</tbody>	
</table>
<footer>
	<?php	require_once("Grid/pagination_aagam.php");	?>
</footer>
<script type="text/javascript">
	doAjax({
		page 	: "pages/Records.php",
		title	: "Manage Students",
		header 	: "Student Details",
		actions	: "<button onclick=registration()>Create</button>",
		target 	: "#main-table-body",
		footer	: "",
		pageContainer: "#page-grid",
		activePage	: <?=$activePage?>
	});
	
	function registration()
	{
		doAjax({
			page	:	"pages/Create.php",
			title	:	"Registration",
			header	:	"Registration",
			actions	:	"<button pno=<?=$activePage?> back='grid' onclick=Back(this)>Back</button>",
			target	:	"#page-registration",
			pageContainer:"#page-registration",
			activePage	: <?=$activePage?>
		});
	} 
</script>