<?php
    session_start();
    require_once "connection.php";
    $who_logged = "";
    if(isset($_SESSION['id'])){
        $name = $_SESSION['name'];
        $surname = $_SESSION['surname'];
        $who_logged = "<li class='nav-item'><a class='nav-link linksFormat' href='#'>Hello, $name $surname</a></li>";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Social Network</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-sm bg-dark justify-content-center">
            <ul class="navbar-nav">
                <?php echo $who_logged; ?>
                <li class="nav-item">
                    <a class="nav-link linksFormat" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linksFormat" href="followers.php">Friends</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linksFormat" href="changeProfile.php">Change profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linksFormat" href="changePass.php">Change password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linksFormat" href="logout.php">Logout</a>
                </li>
        </ul>
        </nav>
    </div>
