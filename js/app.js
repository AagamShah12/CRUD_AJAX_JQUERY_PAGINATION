function doAjax(data)
{
	$.ajax({
		url		: 'library/LoadPage.php',
		type	: 'POST',
		data 	: {
			page 	: data.page,
			id		: data.id,
			activePage	: data.activePage,
			back	: data.back
		},
		beforeSend: function() {
			$(".pages").hide();
			$("#page-messages").html('');
			
			if(data.title) {
				$('title').html(data.title);
			}			
			if(data.header) {
				$('#page-header').html(data.header);
			}			
			if(data.actions) {
				$('#page-actions').html(data.actions);
			}
			if(data.messages) {
				$('#page-messages').html(data.messages);
			}
			if(data.footer) {
				$('#page-footer').html(data.footer);
			}
		},
		success	:	function(response) {
						
			$(data.target).html(response);			
			$(data.pageContainer).show();
			
			$('#page-messages').html(data.messages);
			//$("#page-messages").show();
		}
	});
}
function Back(button)
{
	id=button.getAttribute('data-id');
	name=button.getAttribute('data-name');
	activePage=button.getAttribute('pno');
	back=button.getAttribute('back');
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
		actions	: "<button data-id="+id+" data-name="+name+" pno="+activePage+" back='grid' onclick=Back(this)>Back</button>"+
					"<button data-id="+id+" data-name="+name+" pno="+activePage+" back='read' onclick=update_student(this)>Update</button>"+
					"<button data-id="+id+" data-name="+name+" pno="+activePage+" onclick=delete1(this)>Delete</button>",
		target 	: "#page-read",
		id		: id,
		pageContainer: "#page-read"
		});
	}
}

function read(button)
{
	id=button.getAttribute('data-id');
	name=button.getAttribute('data-name');
	activePage=button.getAttribute('pno');
	back=button.getAttribute('back');
	
	doAjax({
		page 	: "pages/Read.php",
		header 	: "Student Personal Details",
		actions	: "<button data-id="+id+" data-name="+name+" pno="+activePage+" back="+back+" onclick=Back(this)>Back</button>"+
					"<button data-id="+id+" data-name="+name+" pno="+activePage+" back='read' onclick=update_student(this)>Update</button>"+
					"<button data-id="+id+" data-name="+name+" pno="+activePage+" onclick=delete1(this)>Delete</button>",
		target 	: "#page-read",
		id		: id,
		pageContainer: "#page-read"
	});
}

function update_student(button)
{
	id=button.getAttribute('data-id');
	name=button.getAttribute('data-name');
	activePage=button.getAttribute('pno');
	back=button.getAttribute('back');
	doAjax({
		page	:	"pages/Update.php",
		header	:	"Update Details",
		actions	:	"<button data-id="+id+" data-name="+name+" pno="+activePage+" back="+back+" onclick=Back(this)>Back</button>"+
					"<button data-id="+id+" data-name="+name+" pno="+activePage+" onclick=delete1(this)>Delete</button>",
		target	:	"#page-update",
		pageContainer:"#page-update",
		id		:	id,
		activePage: activePage,
		back	:	back
	});
}
function delete1(button)
{
	var id=button.getAttribute('data-id');
	var name=button.getAttribute('data-name');
	$("#del_"+id).html("<center>Are you sure you want to Delete?"+
					"<br/><button data-id="+id+" data-name="+name+" onclick=del_record(this)>Yes</button>"+
					"<button data-id="+id+" data-name="+name+" onclick=del_cancle(this)>No</button></center>");
}
function del_record(button){
	var id=button.getAttribute('data-id');
	var name=button.getAttribute('data-name');
	activePage=button.getAttribute('pno');
	$.ajax({
		type	:	'POST',
		url		:	'pages/Delete.php',
		data	:	{id,name},
		success : function(response) {
			if(response == true) {
				doAjax({
					page 	: "pages/Records.php",
					title	: "Manage Students",
					header 	: "Student Details",
					actions	: "<button onclick=registration()>Create</button>",
					messages: name+", Your Information successfully Deleted.",
					target 	: "#main-table-body",
					footer	: "",
					pageContainer: "#page-grid",
					activePage	: activePage-1
				});
			}
			else {
				alert("Something went wrong !!!");
			}
		}
	});
}
function del_cancle(button){
	var id=button.getAttribute('data-id');
	var name=button.getAttribute('data-name');
	$("#del_"+id).html("<button data-id="+id+" data-name="+name+" onclick=delete1(this)>Delete</button>");		
}