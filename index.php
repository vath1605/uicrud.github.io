<?php session_start(); ?>
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
            <div class="col-md-5 p-5">
                <form action="index.php" method="post" style="padding: 80px;" class="container-fluid rounded-5 bg-secondary-subtle">
                    <div class="mb-3">
                        <h4 class="text-center">Register Form</h4>
                        <p class="text-center text-secondary">Please fill out all fields.</p>
                    </div>
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">User Name</label>
                        <input type="text" name="name" class="form-control" id="nameInput">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                        <input type="password" name="cpass" class="form-control" id="exampleInputPassword2">
                    </div>
                    <div class="mb-3 form-check">
                        <?php 
                        if (isset($_SESSION["insert"])) {
                            ?>
                           <p class="text-success"> <?= $_SESSION['insert'] ?></p>
                            <?php
                        }
                        unset($_SESSION['insert']);
                        ?>
                    </div>
                    <button type="submit" name="btnSub" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-7 p-5">
                <table class="table table-hover table-striped align-middle text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Email Address</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include'./db.php';
                            $query = 'SELECT * FROM tbl_user';
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){
                            foreach ($result as $row) {
                                ?> 
                                    <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['userName'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['pass'] ?></td>
                            <td>
                                <div class="d-flex gap-3 w-100 justify-content-center">
                                    <a class="btn d-flex align-items-center justify-content-center gap-1 btn-warning" href="edit.php?editIndex=<?= $row['id'] ?>"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                                        Edit</a>
                                    <a class="btn d-flex align-items-center justify-content-center gap-1 btn-danger" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
                                        Delete</a>
                                </div>
                            </td>
                                    </tr>
                                <?php
                            }
                        }else{
                            ?>
                            <tr>
                                <td colspan="5">
                                    <p class="mt-2 text-secondary">No data yet.</p>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
<?php 
if(isset($_POST['btnSub'])){
    include('./db.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if($pass != $cpass){
        $_SESSION['insert']='The password and confirm password not match.';
    }else{
        $query = "INSERT INTO tbl_user(userName,email,pass) VALUES ('$name','$email','$pass')";
        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['insert']='User information inserted success...' ;
            header("Location: ". $_SERVER["PHP_SELF"] );
        }
    }

}

?>