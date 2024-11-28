<?php
session_start();
include_once 'authorization.php';
if (isset($_POST['btn'])){
    $user_name = htmlspecialchars(strip_tags($_POST['name']));
    $password = htmlspecialchars(strip_tags($_POST['password']));
    
    // compare user name and password from input to authorize user 
    if(strcmp($user_name,USERNAME) == 0)
    {
        if(password_verify($password, HASHED_PASSWORD))
        {
        //   apply session 
        $status = 200;
        $_SESSION['status'] = $status;
        $_SESSION['username'] = USERNAME;
        header('Location: dashboard.php');
        exit; 
            
        }else{
            $wrongPass = "Wrong password";
        }
    }else{
        $wrongName = "Username is not exit";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin form</title>
    <style type="text/css">
        .container{
            margin: 200px auto;
            height: auto;
            width: 360px;
            background-color: #fff;
            text-align: center;
            box-shadow: 7px 6px 8px 4px rgba(0,0,0,0.3);
            padding: 20px;
        }
        input[type=text], input[type=password]{
            width: 100%;
            height: 35px;
            margin-bottom: 10px;
            color: #000;
            border: none;
            outline: none;
            border-bottom: 2px solid #ddd;
            padding: 5px;
            font-size: 16.4px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bold;
        }
        .container .btn{
            padding: 5px;
            width: 100%;
            border-radius: 12px;
            cursor: no-drop;
            margin-top: 20px;
        }
        /* .container .btn:hover{
            background-color: #0000ff;
            color: #ddd;
            border: none;
            outline: 2px solid #0000ff;
            outline-offset: 5px;
        } */
        .name-error, .pass-error{
            color:#ff8080; 
        }
        .wrong-name, .wrong-pass{
            color: #ff8080;
            padding: 4px;
        }
        .pass-body{
            position: relative;
        }
        .bi{
            font-size: 19px;
            font-weight: bold;
            position: absolute;
            top:50%;
            right: 2px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="#" method="post">
            <input type="text" placeholder="Admin user name" name="name" id="name">
            <p class="name-error"></p> 
            <span class="wrong-name">
                <?php
                    if(!empty($wrongName)){
                        echo $wrongName;
                    }
                ?>
            </span>
            <br>
            
            <div class="pass-body">
            <input type="password" placeholder="Admin password" name="password" id="password">
            <!-- showHide -->
            <i id="showHide" class="bi bi-eye-slash"></i>
            </div>

            <p class="pass-error"></p>
            <span class="wrong-pass">
                    <?php
                        if (!empty($wrongPass))
                        {
                            echo $wrongPass;
                        }
                    ?>
            </span>
            <br>
            <button id="btn" class="btn" type="submit" name="btn" disabled>Login</button>

        </form>
    </div>
    <script src="js/login.js"></script>
</body>
</html>