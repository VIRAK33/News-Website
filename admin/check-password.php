

<?php
session_start();
include 'lib/database.php';
$sms="";
$_POST['username'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = run_query("select * from tb_user
            where username ='{$username}'");
    $user = mysqli_fetch_assoc($user);
    
$user['password']=md5($password);
$username = $user['username'];
$pass = $user['password'];
echo $username;
echo "<br>";
echo md5($pass);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="username" id="username">
        <input type="password" name="password" id="password">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
