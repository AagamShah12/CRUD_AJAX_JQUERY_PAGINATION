<center>
<form name="register" id="register-form">
<table align=center>
<tr>
	<td><b>ENROLLMENT :-</b></td>
	<td> <input type="text" name="enroll" value=""/><br/><br/></td>
	<td class="invalid_enroll"></td>
</tr>
<tr>
	<td><b>NAME :-</b></td>
	<td><input type="text" name="name" value=""/><br/><br/></td>
	<td class="invalid_name"></td>
</tr>
	<tr>	
	<td><b>CONTACT :- </b></td>
	<td><input type="text" name="contact"  value="" /><br/><br/></td>
	<td class="invalid_contact"></td>
</tr>
<tr>
	<td><b>EMAIL :- </b></td>
	<td><input type="text" name="email"  value="" /><br/><br/></td>
	<td class="invalid_email"></td>
</tr>
<tr>
	<td><center><input type="submit" value="SAVE"></center></td>
	<td><center><input type="reset" value="RESET"></center></td>
	<td></td>
</tr>		
</table>
	<input type="hidden" name="activePage" value="<?= $_POST['activePage'] ?>">
</form>
</center>
<script type="text/javascript">
	create("#register-form");
</script>