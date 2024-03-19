<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Helvetica', sans-serif;
            background-color: #f4f4f4;
            background: url('./img/1.jpg');
            background-size: 1400px 900px;
        }

        .login-container {
            max-width: 400px;
            height: 325px;
            margin: 100px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 200px rgba(0, 0, 0, 0.1);
        }

        .login-form {
            text-align: center;
        }

        .login-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .login-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .login-input:focus {
            border-color: #3498db;
        }

        .login-button,
        .login-link {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 7px 15px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none; /* Remove default link underline */
        }

        .login-button:hover,
        .login-link:hover {
            background-color: #2980b9;
        }

        .login-text {
            margin-top: 15px;
        }

        .login-info {
            display: inline-block;
            margin-right: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action='index.php?act=login' style="text-align:center;" class="login-form" method='POST'> 
            <h3 class="login-title">ĐĂNG NHẬP TÀI KHOẢN</h3>
            <div class="form-group">
                <input class="login-input" type='text' name='username' placeholder="Username" />
            </div>
            <div class="form-group">
                <input class="login-input" type='password' name='password' placeholder="Password" />
            </div>
            <input class="login-button" type='submit' name="dangnhap" value='Đăng nhập' />
            <a href="index.php" class="login-link">Thoát</a>
            <div class="login-text">
                <span>Bạn chưa có tài khoản?</span> <a href="index.php?act=register" style="color: blue;" title="Đăng ký">Đăng ký</a>
            </div>
            <?php require 'xulydangnhap.php';?>
        </form>
    </div>
</body>
</html>
