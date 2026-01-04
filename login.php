<?php 
session_start();
include 'config/koneksi.php';

$error = "";
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $q = mysqli_query($conn,"SELECT * FROM users WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q) > 0){
        $_SESSION['login'] = true;
        header("Location: dashboard.php");
        exit;
    }else{
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login | Warung Mama Yuli  </title>
    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,#56ab2f,#a8e063);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .login-box{
            width:360px;
            background:#fff;
            padding:30px;
            border-radius:12px;
            box-shadow:0 8px 20px rgba(0,0,0,0.2);
            text-align:center;
        }
        .login-box h2{
            margin-bottom:5px;
            color:#2c3e50;
        }
        .subtitle{
            font-size:14px;
            color:#7f8c8d;
            margin-bottom:20px;
        }
        .login-box input{
            width:100%;
            padding:12px;
            margin:8px 0;
            border-radius:8px;
            border:1px solid #ccc;
            font-size:14px;
        }
        .login-box button{
            width:100%;
            padding:12px;
            background:#27ae60;
            border:none;
            color:white;
            border-radius:8px;
            font-size:15px;
            cursor:pointer;
            margin-top:10px;
        }
        .login-box button:hover{
            background:#219150;
        }
        .error{
            background:#fce4e4;
            color:#c0392b;
            padding:10px;
            border-radius:6px;
            margin-bottom:10px;
            font-size:14px;
        }
        
    </style>
</head>
<body>

<div class="login-box">
    <h2>Warung Mama Yuli</h2>
    <p class="subtitle">Silakan login untuk masuk</p>
    <p>Pencatatan Keuangan Warung Mama Yuli</p>
    

    <?php if($error != ""){ ?>
        <div class="error"><?= $error ?></div>
    <?php } ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">LOGIN</button>
    </form>

    
</div>

</body>
</html>
