<?php
class User{
	private $id;
	private $name;
	private $email;
	private $phone;

	function setId($id){
		$this->id =$id;
	}
	function setName($name){
		$this->name =$name;
	}
	function setEmail($email){
		$this->email =$email;
	}
	function setPhone($phone){
		$this->phone =$phone;
	}
	

	function save(){

		require("./../config/dbHelper.php");
		$conn = dbConnect();
		$sql = "INSERT INTO tbl_details(name,email,phone) VALUES (?,?,?)";
		if($stmt = $conn->prepare($sql)){
			$stmt->bind_param('sss',$this->name,$this->email,$this->phone);
			if($stmt->execute()){
				return true;
			}
		}
		return false;
	}
	function getAll(){
		require_once dirname(__FILE__)."/../config/dbHelper.php";
		$result = array();
		$conn = dbConnect();
		$sql = "SELECT id, name, email, phone from tbl_details";
		if($stmt = $conn->prepare($sql)){
			if($stmt->execute()){
				$stmt->store_result();
				$stmt->bind_result($id, $name,$email,$phone);
				while($stmt->fetch()){
					$res = (object)array();
					$res->id = $id;
					$res->name = $name;
					$res->email = $email;
					$res->phone = $phone;

					$result[] = $res;

				}
				return $result;
			}
		}
		return false;
	}

	function getEdit(){
		require_once dirname(__FILE__)."/../config/dbHelper.php";
		$result = array();
		$conn = dbConnect();
		$sql="SELECT id,name, email, phone from tbl_details where id=?";
		if($stmt = $conn->prepare($sql)){
			$stmt->bind_param('i',$this->id);
			if($stmt->execute()){
				$stmt->store_result();
				$stmt->bind_result($id,$name,$email,$phone);
				while($stmt->fetch()){
					$res = (object)array();
					$res->id =$id;
					$res->name = $name;
					$res->email =$email;
					$res->phone =$phone;
					$result[] = $res;
				}
				return $result;
			}
		}
		return false;
	}

	function setEdit(){
		require_once dirname(__FILE__)."/../config/dbHelper.php";
		$result = array();
		$conn = dbConnect();
		$sql = "UPDATE tbl_details set name=?,email=?,phone=? where id=?";
		if($stmt= $conn->prepare($sql)){
			$stmt->bind_param('sssi',$this->name,$this->email,$this->phone,$this->id);
			if($stmt->execute()){
				return true;
			}
		}
		return false;
	}

}
?>