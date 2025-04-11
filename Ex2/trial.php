<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <button type="submit" name = "reset">Reinitialize</button>
    </form>
    <?php
        require_once 'index.php';
        newSession::start();
        if(newSession::has('user')){
            newSession::set('user',newSession::get('user')+1);
            echo "Welcome back! you've revisited for the ". newSession::get('user')." time!";
        }else{
            echo "Welcome user!";
            newSession::set('user',1);
        }
        if(isset($_POST['reset'])){
            $_SESSION=array();
            session_destroy();
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }
    ?>
</body>
</html>
