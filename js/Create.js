function create(formTarget) {
	$("td[class^='invalid_']").attr('style','color:red');
	$(formTarget).submit(function(event){
		event.preventDefault();
		
		$.ajax({
			type	:'POST',
			url		:'pages/Insert.php',
			data	:$(this).serialize(),
			dataType:'json',
			beforeSend : function() {
				$("td[class^='invalid_']").html('');
				$('#page-messages').html('');
			},
			success: function(data) {
				//$('div.message').html('in success function');
				if(data.errors) {
					for(var key in data.errors) {
						$("td.invalid_" + key).html(data.errors[key]);
					}
				}				
				if(data.success)
				{	
					var activePage=$("input[name='activePage']").val();
					doAjax({
						page 	: "pages/Records.php",
						title	: "Manage Students",
						header 	: "Student Details",
						actions	: "<button onclick=registration()>Create</button><br/><br/>",
						messages: data.message,
						target 	: "#main-table-body",
						footer	: "",
						pageContainer: "#page-grid",
						activePage	: activePage
					});
				}
			},
			failure : function() {
				alert("Something went wrong");
			},
			complete : function() {
					
			}
		});
	});
}