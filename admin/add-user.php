<?php connect(); ?>
<?php if (get_user_level($_SESSION['userid']) > 2): ?>

<div id="title-header"><div id="title-text">Quick User Add +</div></div>
<div id="large-content">
	<?php add_user(); ?>
	<table width="700" border="0" cellspacing="1" cellpadding="1" align="center">
		<tr>
			<th>User Name</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>User level</th>
			<th>Password</th>
			<th>Enabled</th>
			<th></th>
		</tr>
		<tr>
			<form method="post" onSubmit="return add_user_validate();"/>
				<td><input name="username" type="text" class="med"/></td>
				<td><input name="firstname" type="text" class="med"/></td>
				<td><input name="lastname" type="text" class="med"/></td>
				<td>
					<SELECT NAME="userlevel">
						<OPTION VALUE="">Choose Option...</OPTION>
						<OPTION VALUE="admin">admin</OPTION>
						<OPTION VALUE="user">user</OPTION>
						<OPTION VALUE="god">god</OPTION>
					</SELECT>
				</td>
				<td><input name="password" type="password" class="med"/></td>
				<td>
					<SELECT NAME="enabled">
						<OPTION VALUE="">Choose Option...</OPTION>
						<OPTION VALUE="1">Yes</OPTION>
						<OPTION VALUE="0">No</OPTION>
					</SELECT>
				</td>
				<td align="right">
					<input name="adduser" type="submit" value="Add User" />
				</td>
			</form>
		</tr>
	</table>
</div>

<?php endif; ?>