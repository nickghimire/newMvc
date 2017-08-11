<?php include("../controller/manageForm.php");
	$res = getAll();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple Login Form</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<button id="showForm">Add New</button>
<form method="POST" id="formData" style="display:none">
	<input type="text" name="name" placeholder="Enter your name">
	<input type="email" name="email" placeholder="Enter your email">
	<input type="phone" name="phone" placeholder="Enter your phone">
	<input type="submit" >
	

</form>
<table>
	<thead>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php
		$u =0;
		foreach($res as $r){
			$u++;
			?>
			<tr>
				<td><?=$u?></td>
				<td><?=$r->name?></td>
				<td><?=$r->email?></td>
				<td><?=$r->phone?></td>
				<td><a href="./edit.php?id=<?=$r->id?>">Edit</a>Delete</td>
			</tr>
			<?php
			}?>
		
	</tbody>
</table>

</body>
</html>
<script>
	$("#showForm").on('click',function(e){
		e.preventDefault();
		$("#formData").show();
	})

	$("#formData").on('submit',function(e){
		e.preventDefault();
		var data =$("#formData").serialize();

		$.ajax({
			url:"./../controller/manageForm.php",
			data:data,
			type:'post',
			success:function(data){
				$('#formData')[0].reset();
				location.reload(true);
			},
			error:function(data){
				console.log(data)

			}
		})
	})

</script>