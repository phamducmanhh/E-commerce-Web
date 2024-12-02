<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
<style>
    
    #content1 {
        max-width: 800px;
        margin: 0 auto;
        padding: 30px;
        background-color: #FFF5EE;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        text-align: justify;
        font-family: 'Montserrat', sans-serif;
    }

    #content1 img {
        max-width: 100%;
        height: auto;
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #content1 h2 {
        color: #333;
        font-size: 24px;
        margin-bottom: 15px;
    }

    #content1 p {
        line-height: 1.8;
        color: #555;
        margin-bottom: 15px;
    }

    #content1 u {
        text-decoration: underline;
        font-style: italic;
    }

    #content1 a {
        display: inline-block;
        margin-top: 20px;
        color: #3498db;
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    #content1 a:hover {
        color: #2980b9;
    }
</style>
<?php
    $sql_baiviet = "SELECT * FROM tbl_baiviet WHERE id_baiviet = '$_GET[idtintuc]' LIMIT 1";
    $query_baiviet = mysqli_query($mysqli, $sql_baiviet);
?>
<?php
    while($row_baiviet = mysqli_fetch_array($query_baiviet)){
?>
        <div id="content">
        <div id="content1">
            <h2 class="highlight-text"><?php echo $row_baiviet['tenbaiviet'] ?></h2>
            <p style="text-align: center"><?php echo $row_baiviet['tomtat'] ?></p>
            <p ><?php echo $row_baiviet['noidung'] ?></p>
            
        </div>

       
		<?php
    }
        ?>
</body>
</html>