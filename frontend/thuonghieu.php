<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         .container_thuonghieu{
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: center;
            margin: 20px 0;
        }
        .thuonghieu {
            border-radius: 20px;
            margin: 20px 10px;
            width: calc(100% / 6 - 20px);
            height: 145px;
            position: relative;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
        }
        .thuonghieu_logo img {
            border-radius: 20px;
            position: absolute;
            width: 100%;
            height: 70%;
            background-color: red;
        }
        .thuonghieu_title {
            text-align: center;
            position: absolute;
            width: 100%;
            height: 25%;
            bottom: 0px;
        }
        .thuonghieu_title p {
            color: black;
            padding: 0 3px;
        }
    </style>
</head>
<body>
    <?php
        $sql_theloai = "SELECT *FROM theloai ORDER BY id DESC";
        $query_theloai = mysqli_query($mysqli, $sql_theloai);
    ?>
    
    <div class="container_thuonghieu">
    <?php
        while($truyvan_theloai = mysqli_fetch_array($query_theloai)){
    ?>
        <a href="?act=category&id=<?php echo $truyvan_theloai['id']; ?>" class="thuonghieu">
            <div class="thuonghieu_logo">
                <img src="img/<?php echo $truyvan_theloai['image_theloai'] ?>" alt="">
            </div>
            <div class="thuonghieu_title">
                <p><?php echo $truyvan_theloai['tenthuonghieu'] ?></p>
            </div>
        </a>
        <?php
        }
    ?>

    </div>
    
</body>
</html>
