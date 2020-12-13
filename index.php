<!DOCTYPE html>
	<head>
		<title></title>
		<script src="js/jquery.min.js"></script>		
		<script src="js/app.js"></script>
		<script src="js/Create.js"></script>
		<script src="js/Update.js"></script>
	
	</head>
	<body>
		<center>
			<header>
				<h1 id="page-header">Loading...</h1>
				<div id="page-actions">Loading...</div>
				<h3 id="page-messages"></h3>
			</header>
			
			<div id="page-grid" class="pages">
				<?php require_once("pages/Grid.php");?>			
			</div>
			<div id="page-registration" class="pages">	</div>
			<div id="page-read" class="pages">	</div>
			<div id="page-update" class="pages"></div>		
			
			<footer>				
				
			</footer>
		</center>
	</body>
</html>