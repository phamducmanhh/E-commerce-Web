<?php 
session_start();
if(isset($_GET['logout']))
if($_GET['logout']=='yes'){
    if(isset($_SESSION['nguoidung']))
    unset($_SESSION['nguoidung']);
    if(isset($_SESSION['cart']))
unset($_SESSION['cart']);
}

?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <!-- <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./css/fontawesome-all.css">
    <!-- <link rel="stylesheet" href="./css/style2.css"> -->
    <script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin "anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        .background{
            width:100%;
            height: 100vh;
            background-image: url('./img/thumma.jpg')
            background-postion: center;
            background-size: cover;
        }

        .homeee{
            position: absolute;
            top: 50%;
            left: 50%;
            width: 75%;
            height: 75%;
            transform: translate(-50%, -50%);
            background-image: url('./img/thumma.jpg');
            background-position: center;
            background-size: cover;
            display: flex;
            margin-top: 10px;
            border: 1px solid black;
            border-radius: 10px;
            border: none;
            text-shadow: 2px 2px 2px #DB7093;
        }
        .contentt
        {
        display: flex;
        flex-direction: column;
        width: 700px;
        padding: 100px 0;
        }
        .contentt a
        {
            position: relative;
            text-decoration: none;
            color: #000;
            font-size: 3em;
            font-weight: 700;
            top: -40px;
            left: 80px;
        }
        .contentt h2
        {
            font-size: 3.5em;
            text-align: center;
            color: #000;
        }
        .contentt pre
        {
            margin-top: 20px;
            text-align: center;
            font-size: 1.5em;
            color: #000;
        }

        .contentt h3 {
            font-size: 2em;
            text-align: center;
            color: #000;
        }

        

        .loginnn form {
    width: 450px;
    position: relative;
    padding: 100px 30px;
    backdrop-filter: blur(20px);
}

.loginnn  h2 {
    font-size: 2em;
    text-align: center;
    margin-bottom: 20px;
    color: #000;
}

.loginnn  .inputt {
    position: relative;
    width: 100%;
    height: 55px; 
    margin-bottom: 40px
    
    
}

.loginnn  .inputt .input11 {
    font-size: 16px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: transparent;
    border: none;
    outline: none;
    border-bottom: 2px solid #000;
    color: #000;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.2);
}

::placeholder {
    color: #fff;
    font-size: 18px;
}

.loginnn  .inputt i {
    position: relative;
    right: -90%; 
    bottom: 27px;
    color: #000;
}

.loginnn  .buttonnn {
    width: 100%;
    height: 40px;
    margin-bottom: 15px;
}

button {
    width: 100%;
    height: 40px;
    background-color: crimson;
    border: none;
    outline: none;
    font-size: 20px;
    font-weight: 700;
    border-radius: 7px;
    color: #fff;
}

    </style>
</head>

<body>
    
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <?php
    if (isset($_GET['dn'])) {
        if ($_GET['dn']=='true') {
            echo '<style type="text/css">
            #dntb {
                display: none;
            }
            </style>';
        } else if ($_GET['dn']=='false') {
            echo '<style type="text/css">
            #dntb {
                display: inline;
            }
            </style>';
        }
        if ($_GET['dn']=='true') {
            echo '<style type="text/css">
            #dnbk {
                display: none;
            }
            </style>';
        } else if ($_GET['dn']=='khoa') {
            echo '<style type="text/css">
            #dnbk {
                display: inline;
            }
            </style>';
        }
    }
    ?>
    <div class="background"></div>
    <section class ="homeee">
        <div class = "contentt">
            <a href="#" class="logoo">Trang Quản lý</a>
            <h2>XIN CHÀO!</h2>
            <h3>Đây là trang dành cho Admin</h3>
            <pre>Hãy đăng nhập với tài khoản Admin để vào trang quản lý</pre>
        </div>

        <div class="loginnn">
            <h2>Đăng nhập</h2>
        
            <form action="xulydangnhap.php" method="POST">
                <div class="inputt">
                    <input class="input11" name="username" type="text" placeholder="Username" autocomplete="off">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="inputt">
                    <input class="input11" name="password" type="password" placeholder="Password" autocomplete="off">
                    <i class="fa-solid fa-lock"></i>
                </div>

                <div class="buttonnn">
                    <button class="btn">Submit</button>
                </div>
            </form>
        </div>
    </section>
    

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script> -->
</body>

</html>