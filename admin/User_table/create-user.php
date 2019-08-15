<?php
    session_start();
    if($_SESSION['user_id'] == null){
        header('location:login.php');
    }
?>
<?php include "lib/database.php"; ?>
<?php
$success = "";
if (isset($_POST['username'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $insert = "insert into tb_user(username,email,password) values(
            '{$name}', '{$email}','{$password}'
        )";

    $i = run_non_query($insert);
    $success = "Data has been saved!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <h1>Create New User</h1>
        <p>
            <a href="User_table.php" class="btn btn-success btn-sm">
                <i class="fa fa-reply"></i> Back
            </a>
        </p>
        <hr>
        <form method="POST">
            
            <div class="row">
                <div class="col-sm-9">
                    <?php if ($success) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $success; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="form-group row">
                        <label for="username" class="col-sm-4">
                            Username <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" 
                            name='username' id='username' required autofocus placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" 
                            name='email' id='email' value='' placeholder="Username@gmail.com">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-4">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" 
                            name='password' id='password' value='' placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4"></label>
                        <div class="col-sm-8">
                            <button class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>