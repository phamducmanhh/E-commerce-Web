<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lien Hệ</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="../assets/css/app.css" type="text/css">
    <style>
        #row_mt-2 {
        margin: 20px auto;
        padding: 10px;
    }

    </style>
    
</head>

<body>
  
    <main role="main">
       
        <div class="container mt-2">
            <br>
         <h1>Qúy khách vui lòng nhập phản hồi tại đây </h1>
                                       <h5>
                                       Chúng tôi luôn cố gắng lắng nghe mọi góp ý của bạn để ngày càng hoàn thiện sản phẩm,
                                        đem lại cho bạn những trải nghiệm thú vị nhất 
                                        </h5>
                                
            <div class="row">
                <div  style=" border: 2px solid #ccc;"  class="col col-md-3">
                    <img width="100%" height="490px" src="./img/kemchongnang.jpg">
                </div>
                <div class="col col-md-9">
                    
                    <form style="border: 2px solid #ccc;" id="form" width="50%">
                    <div style="margin: 10px 10px;">
                    <legend>
                        <center>
                             <h3>
                                 Phản hồi của bạn 
                            </h3>
                        </center>
                                           
                                        </legend>
                        <div class="input__container">
                            <label for="email">Email của bạn</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email của bạn" required>
                        </div>
                        <div class="input__container">
                            <label for="title">Tiêu đề của bạn</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Tiêu đề của bạn">
                        </div>
                        <div class="input__container">
                            <label for="message">Lời nhắn của bạn</label>
                             
                            <textarea name="message" class="form-control" cols="30" rows="10" required></textarea>
                        </div>
                        <br>

                       <center>
                       <button class="btn btn-primary" name="btnGoiLoiNhan">Gửi lời nhắn</button> &emsp;&emsp;
                        <button class="btn btn-danger" type="reset" value="Hủy">Hủy</button>
                       </center>
                    </div>
                        
                        
                    </form>
                    <br>
                   
                </div>
            </div>
            
            <div class="row mt-2" id="row_mt-2">
                <div class="col col-md-12">
                    <h3>Bản đồ </h3>
                <iframe width="100%"; 
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3918.7827191017213!2d106.67806721402438!3d10.827933261203555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zMDItMDYgxJDGsOG7nW5nIFPhu5EgMywgS2h1IENpdHlMYW5kIENlbnRlciBIaWxscywgUGjGsOG7nW5nIDcgLCBRdeG6rW4gR8OyIFbhuqVwLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1svi!2s!4v1662645897948!5m2!1svi!2s"
                    width="200" height="445" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                       <a href="https://goo.gl/maps/wruwdjv4jnqjCed97 ">navigation gpsCVBNMNBVCVBNZXCVBNDSASDFGH</a>       `
                </iframe>
                
             </div>
            
            </div>
        </div>
        <!-- End block content -->
    </main>

    
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popperjs/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="../assets/js/app.js"></script>
    <script>
        "use strict";
            const form = document.getElementById("form");
            form.addEventListener("submit", function (event) { });
            form.addEventListener("submit", function (event) {
    // Preventing page reload on submit
    event.preventDefault(); 

    // Selecting the email value filled by the user
    const email = document.getElementById("email").value;

    // Checking for valid email using a simple regex pattern
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
      alert("Vui lòng nhập đúng định dạng");
      return;
    }

    // If everything passes, show success message
    alert("Bạn đã gửi phản hồi thành công");
});
        </script>
    
</body>

</html>