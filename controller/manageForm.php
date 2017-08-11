<?php
include("./../model/user.php");

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
	$user = new User();
	$user->setName($_POST['name']);
	$user->setEmail($_POST['email']);
	$user->setPhone($_POST['phone']);
	if(isset($_POST['id'])){
		$user->setId($_POST['id']);
		if($user->setEdit()){
			return true;
		}else{
			return false;
		}
	}else{

	if($user->save()){
		echo "Successfull";
	}else{
		echo"<script>alert('Something went Wrong');
		window.location.href='../views/index.php';
		</script>";
	}
}
}
function getAll(){
	$user = new User();
	if($res = $user->getAll()){
		return $res;
	}else{
		return false;
	}
}

function edit($id){
	$user = new User();
	$user->setId($id);
	if($res = $user->getEdit()){
		return $res;
		header('Location:./index.php');
	}
	return false;
}
?>