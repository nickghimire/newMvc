<?php
include("../config/dbHelper.php");
include("./../controller/manageForm.php");

$x = $_GET['id'];
$res = edit($x);
$conn = dbConnect();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<form action="" method="post" id="editForm">
<div class="form-group">
<input type="hidden" name="id" value="<?=$res[0]->id?>" required>
<input type="name" name="name" value="<?=$res[0]->name?>" required>
<input type="email" name="email" value="<?=$res[0]->email?>" required>
<input type="phone" name="phone" value="<?=$res[0]->phone?>" required>
<input type="submit">

</body>
</html>
<script>
    $("#editForm").on('submit',function(e){
        e.preventDefault();
        var data =$("#editForm").serialize();
        
        $.ajax({
            url:"../controller/manageForm.php",
            type:"POST",
            data:data,
            success:function(sts){
                console.log(sts)
                window.location.href='index.php'

            }
        })
    })
</script>