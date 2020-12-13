function update(formTarget){
		$("td[class^='invalid_']").attr('style','color:red');
		//$('input').focus(function(){$("td[class^='invalid_']").html('');});		
	$(formTarget).submit(function(event){
		
		event.preventDefault();
		
		$.ajax({
			type	:'POST',
			url		:'pages/Update_query.php',
			data	:$(this).serialize(),	
			dataType:'json',
			beforeSend : function() {
				$("td[class^='invalid_']").html('');
			},
			success: function(data) {
				//$('div.message').html('in success function');
				if(data.errors) {
					for(var key in data.errors) {
						$("td.invalid_" + key).html(data.errors[key]);
					}
				}
				$('#page-messages').html(data.message);
				if(data.success)
				{
					if(back=='grid'){
						doAjax({
							page 	: "pages/Records.php",
							title	: "Manage Students",
							header 	: "Student Details",
							actions	: "<button onclick=registration()>Create</button><br/><br/>",
							target 	: "#main-table-body",
							footer	: "",
							pageContainer: "#page-grid",
							activePage	: activePage
						});
					}
					if(back=='read'){
						doAjax({
							page 	: "pages/Read.php",
							header 	: "Student Personal Details",
							actions	: "<button data-id="+data.ID+" data-name="+data.name+" pno="+activePage+" back='grid' onclick=Back(this)>Back</button>"+
										"<button data-id="+data.ID+" data-name="+data.name+" pno="+activePage+" back='read' onclick=update_student(this)>Update</button>"+
										"<button data-id="+data.ID+" data-name="+data.name+" onclick=delete1(this)>Delete</button>",
							target 	: "#page-read",
							id		: data.ID,
							pageContainer: "#page-read"
						});
					}
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