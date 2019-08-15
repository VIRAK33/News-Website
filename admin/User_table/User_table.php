<?php
    session_start();
    if($_SESSION['user_id'] == null){
        header('location:login.php');
    }
?>



<?php include 'lib/database.php';
$success = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="stylesheet" rel="all.css">
</head>
<body>
    <div class="container">
        <h1>User List</h1>
        <hr>
        <p>
            <a href="create-user.php" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i>&nbsp;&nbsp;Create
            </a>
            <a href="logout.php" class="btn btn-success btn-sm float-right"> <i class="fas fa-sign-out-alt"></i> Log Out</a>
        </p>
        <table class="table table-bordered table-sm table-striped">
            <thead>
                <tr>
                    <th>User_ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $tb_news = run_query("select * from tb_user"); ?>
                <?php foreach($tb_news as $p): ?>
                    <tr>
                        <td><?php echo $p['user_id']; ?></td>
                        <td><?php echo $p['username']; ?></td>
                        <td><?php echo $p['email']; ?></td>
                        <td><?php echo $p['password']; ?></td>
                        <td>
                            <a href="delete-user.php?user_id=<?php echo $p['user_id'];?>" 
                                class='text-danger' title="Delete" 
                                onclick="return confirm('You want to delete?')">
                                <i class="fa fa-trash"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="edit-user.php<?php echo"?user_id=".$p['user_id']; ?>" class="text-success" title="Edit" >
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
                
            </tbody>
        </table>
//_Table-News__________________________________________________________________________________________________________
        <h1>News List</h1>
        <hr>
        <p>
            <a href="create-news.php" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i>&nbsp;&nbsp;Create
            </a>
        </p>

        <table class="table table-bordered table-sm table-striped">
            <thead>
                <tr>
                    <th>News_ID</th>
                    <th>Create by</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Short Description</th>
                    <th>Long Description</th>
                </tr>
            </thead>
            <tbody>
                <?php $tb_news = run_query("select * from tb_news"); ?>
                <?php foreach($tb_news as $p): ?>
                    <tr>
                        <td><?php echo $p['news_id']; ?></td>
                        <td><?php echo $p['user_id']; ?></td>
                        <td><?php echo $p['category_id']; ?></td>
                        <td><?php echo $p['title']; ?></td>
                        <td><?php echo $p['short_description']; ?></td>
                        <td><?php echo $p['description']; ?></td>
                        <td>
                            <a href="delete-news.php?news_id=<?php echo $p['news_id'];?>" 
                                class='text-danger' title="Delete" 
                                onclick="return confirm('You want to delete?')">
                                <i class="fa fa-trash"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="edit-news.php<?php echo"?news_id=".$p['news_id']; ?>" class="text-success" title="Edit" >
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
                
            </tbody>
        </table>


    </div>
    
</body>
</html>