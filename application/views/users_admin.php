<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="/assets/style_users.css">
</head>
<body>
	<div id="wrapper">
		<h1>Admin Page</h1>
		<h2 class='green'>Welcome back <?= $this->session->userdata('first_name'); ?>!</h2>
		<p class='right'><button><a class='button' href='/users/logout'>Log Out</a></button></p>
		<h3>Add New Product to Database</h3>
		<p class='green'><?= $this->session->flashdata('message'); ?></p>
		<span class='red'><?= $this->session->flashdata('error'); ?></span>
		<form action ='/items/addProduct' enctype='multipart/form-data' method='post'>
			<div class='row'>
				<label for='name'>Product Name: </label>
				<input type='text' name='name'>
			</div>
			<div class='row'>
				<label for='description'>Product Description: </label>
				<input type='text' name='description'>
			</div>
			<div class='row'>
				<label for='price'>Product Price: </label>
				<input type='text' name='price'>
			</div>
			<input type="file" name="userfile" size="20">
			<input type='submit' value='Enter into Database'>
		</form>
	</div>
	<div id='products'>
		<?= "<p class='green'>{$this->session->flashdata('messages')}</p>"; ?>
		<table>
			<thead>
				<tr>
					<th class='normal'>Product Name</th>
					<th class='wide'>Description</th>
					<th class='narrow'>Price</th>
					<th class='normal'>Dated Added</th>
					<th class='narrow'>Action</th>
				</tr>
			</thead>
			<tbody>
		<?php
			foreach($items as $item)
			{
				$date = date('M jS Y, g:ia', strtotime($item['created_at']));
				echo "<tr>
						<td>{$item['name']}</td>
						<td>{$item['description']}</td>
						<td>\${$item['price']}</td>
						<td>{$date}</td>
						<td><a href='/items/confirm_remove/{$item['id']}'>Remove</a></td>
					</tr>";
			}
			echo "</tbody>
			</table>"
		?>
	</div>
</body>
</html>