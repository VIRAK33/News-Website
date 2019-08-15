<?php
session_start();
include 'lib/database.php';
$sms="";
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = run_query("select * from tb_user
            where username ='{$username}'");
    $user = mysqli_fetch_assoc($user);
    if ($username != $user['username']) {
        $sms = "Invalid Username or Password!";
        
    } else {
        if($user['password']!=md5($password)){
            $sms = "Invalid Username or Password!";
        }else{
            $_SESSION['user_id'] = $user['user_id'];
            header('location:User_table.php');
        }
        
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="container  ">
        <h1 class="display-4 text-success offset-sm-3">Login</h1>
        <form method="POST">
            <div class="row">
                <div class="col-sm-4 offset-sm-3">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" 
                            name="username" id="username"value="" required>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 offset-sm-3">
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password"
                         id="password" value="" required>

                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-4 offset-sm-3">
                    <div class="form-group">
                        <button class="btn btn-success">Login</button>
                    <br><br>
                        <P  class="text-danger">
                            <?php
                                echo $sms;
                            ?>
                        </P>
                    </div>
                </div>

                
            </div>
        </form>
        <br><br>
    </div>


</body>

</html>