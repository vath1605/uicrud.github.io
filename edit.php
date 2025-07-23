<?php 
    include './db.php';
    $id = $_GET['editIndex'];
    $query = "SELECT * FROM tbl_user WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $uId = $data["id"];
    $uName = $data["userName"];
    $uEmail = $data["email"];
    $uPass = $data["pass"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <main style="height: 100vh;" class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center pt-3">
                <h3 class="py-3 rounded-pill px-5 border-2 text-primary border border-primary">PHP CRUD</h3>
            </div>
            <div class="col-md-6 container p-5">
                <form action="edit.php" method="post" style="padding: 80px;" class="container-fluid rounded-5 bg-secondary-subtle">
                    <div class="mb-3">
                        <h4 class="text-center">Update User Info</h4>
                        <p class="text-center text-secondary">Please fill out all fields.</p>
                    </div>
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">User Name</label>
                        <input type="text" value="<?= $uName ?>" name="name" class="form-control" id="nameInput">
                        <input type="hidden" value="<?= $uId ?>" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" value="<?= $uEmail ?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="text" name="pass" value="<?= $uPass ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
<?php
if(isset($_POST['btnUpdate'])){
    include './db.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "UPDATE tbl_user SET
        userName = '$name',
        email = '$email',
        pass = '$pass'
        WHERE id = '$id'
        ";
    $result = mysqli_query($conn, $query);
    if($result){
        header('Location: index.php');
    }else{
        header('Location: index.php');
    }
}
?>