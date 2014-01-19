<div id="title-header"><div id="title-text">Search Results</div></div>
<div id="large-content">
	<table width="750" border="0" cellspacing="0" cellpadding="1" align="center">
		<tr>
			<th>Name</th>
			<th>Contact</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Actions</th>
		</tr>
		<tr>
			<td colspan="5"><hr /></td>
		</tr>
		<?php 
		$get_customers = search_customers();
		$inc = 1;
		while($cust = mysql_fetch_array($get_customers)) {
			$cust_id = $cust['cust_id'];
			$name = $cust['name'];
			$contact = $cust['contact'];
			$phone = $cust['phone'];
			$email = $cust['email'];
		?>
			<tr <?php
				if($inc % 2 == 1){echo 'bgcolor="#DFFFDF"';}
				else {echo 'bgcolor="#CFDFCF"';}
				?>>
				<td><?= $name;?></td>
				<td><?= $contact;?></td>
				<td><?= $phone;?></td>
				<td><?= $email;?></td>
				<td>
					<a href="customers.php?action=edit&cust_id=<?= $cust_id;?>">Edit</a> | 
					<a href="orders.php?action=add&cust_id=<?= $cust_id;?>">New Order</a> | 
					<a href="orders.php?action=view&cust_id=<?= $cust_id;?>">List Orders</a>
				</td>
			</tr>
		<?php 
			$inc++;
		}
		?>
	</table>
</div>
