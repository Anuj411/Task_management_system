<!DOCTYPE html>
<html>
<head>
    <title>Change password - Task management system</title>
	<script>
		@if(session()->has('err'))
            alert("{{ session()->get('err') }}");
        @endif
		function validate_pass(){
			var pass1 = document.getElementById('new_pass').value;
			var pass2 = document.getElementById('con_pass').value;
			if(pass1 != pass2){
				alert('Password and confirm password are not same !!!');
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
    @include('header')
    <section>
        <div class="container">
            <h1>Change password</h1>
			<form action="{{ url('/') }}/post_changepass" method="post" onsubmit="return validate_pass()">
				@csrf
				<table align="center">
					<tr>
						<th style="width:150px">Old password : </th>
						<td><input type="password" name="old_pass" placeholder="Enter old password" required /></td>
					</tr>
					<tr>
						<th>New password : </th>
						<td><input type="password" name="new_pass" id="new_pass" placeholder="Enter new password" required /></td>
					</tr>
					<tr>
						<th>Confirm password : </th>
						<td><input type="password" name="con_pass" id="con_pass" placeholder="Enter confirm password" required /></td>
					</tr>
					<tr>
						<td></td>
						<td><br><input type="submit" value="Change password" /></td>
					</tr>
				</table>
			</form>
        </div>
    </section>
</body>
</html>