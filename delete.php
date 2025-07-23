<?php
    include('./db.php');
    $id = $_GET['deleteId'];
    $query = "DELETE FROM tbl_user WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    if($result){
        header('Location: index.php');
    }else{
        header('Location: index.php');
    }