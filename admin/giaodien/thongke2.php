<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- Connect Database -->
<!-- Kết nối Database -->
<!-- -------------------------------------------------------------------------------------------------- -->
<?php
    function DocDB($host,$user,$password,$db){
        $con = mysqli_connect($host,$user,$password,$db);
        
        $strSQL= "SELECT * FROM hoadon";
        $result=mysqli_query($con,$strSQL);
        mysqli_close($con);
        return $result;
    }
    function executeQuery($host,$user,$password,$db,$strSQL){
        $con = mysqli_connect($host,$user,$password,$db);
        $result=mysqli_query($con,$strSQL);
        mysqli_close($con);
        return $result;
    }
?>
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->

<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- SQL -->
<!-- Truy vấn CSDL -->
<!-- -------------------------------------------------------------------------------------------------- -->

<?php
    /////////////////////////////////////////////////////////////////////////////////////////////////////
    // Tổng tiền hóa đơn theo khách hàng từ ngày 2021-05-01 đến 2021-05-31
    $strSQL= "SELECT id_khachhang,sum(tong_tien) FROM hoadon WHERE ngay_tao BETWEEN '2021-05-01' AND '2021-05-31' GROUP BY id_khachhang";
    $tong = executeQuery("localhost","root","","bannuocdb",$strSQL);
    foreach($tong as $item){
        $array[]=$item;
    }
    for($i=0;$i<count($array);$i++){
        $labelarray[]=$array[$i]["id_khachhang"];
        $dataarray[]=$array[$i]["sum(tong_tien)"];
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    //Thống kê tổng tiền hóa dơn theo thể loại trong tháng 5
    $strSQL2= "SELECT sanpham.id_the_loai as id, SUM(cthoadon.so_luong*sanpham.don_gia ) AS tong FROM cthoadon, hoadon,sanpham WHERE month(hoadon.ngay_tao)=5  and hoadon.id=cthoadon.id_hoadon AND cthoadon.id_sanpham=sanpham.id GROUP by sanpham.id_the_loai";
    $month2='5';
    if(isset($_GET['month2'])){
        $month2 = $_GET['month2'];
        if($month2!='')
        if($month2>=1 && $month2<=12){
            $strSQL2= "SELECT sanpham.id_the_loai as id, SUM(cthoadon.so_luong*sanpham.don_gia ) AS tong FROM cthoadon, hoadon,sanpham WHERE month(hoadon.ngay_tao) = '$month2'  and hoadon.id=cthoadon.id_hoadon AND cthoadon.id_sanpham=sanpham.id GROUP by sanpham.id_the_loai";
        }
    }
    $theloai = executeQuery("localhost","root","","bannuocdb",$strSQL2);
    $m=mysqli_fetch_array($theloai);
    if($m!=NULL){
        foreach($theloai as $item2){
            $array2[]=$item2;
        }
        for($l=0;$l<count($array2);$l++){
            $labelarray2[]=$array2[$l]["id"];
            $dataarray2[]=$array2[$l]["tong"];
        }
    }
    else{
        $labelarray2[]=[];
        $dataarray2[]=[];
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Thống kê tình hình kinh doanh trong một khoảng thời gian của các sản phẩm thuộc một loại / tất cả sản phẩm.
    $strSQL= "SELECT sanpham.id, SUM(cthoadon.so_luong*sanpham.don_gia) as tongtien FROM hoadon,cthoadon,sanpham WHERE hoadon.ngay_tao BETWEEN '2021-05-01' AND '2021-05-31' AND hoadon.id=cthoadon.id_hoadon and cthoadon.id_sanpham=sanpham.id GROUP by sanpham.id";
    $tinhhinhkinhdoanh = executeQuery("localhost","root","","bannuocdb",$strSQL);
    foreach($tinhhinhkinhdoanh as $item3){
        $array3[]=$item3;
    }
    for($t=0;$t<count($array3);$t++){
        $labelarray3[]=$array3[$t]["id"];
        $dataarray3[]=$array3[$t]["tongtien"];
    }
    //////////////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    // Thống kế sản phẩm bán chạy theo khoảng thời gian
    $strSQL= "SELECT tong.id_sanpham,maxtong.max,maxtong.month
    FROM
        (
        SELECT max(mot.tong) as max,mot.month
        FROM (
             SELECT cthoadon.id_sanpham,sum(cthoadon.so_luong*sanpham.don_gia) as tong,month(hoadon.ngay_tao) as month FROM cthoadon,hoadon,sanpham WHERE cthoadon.id_hoadon=hoadon.id AND 	cthoadon.id_sanpham=sanpham.id GROUP BY month(hoadon.ngay_tao),cthoadon.id_sanpham 
             ) as mot
        GROUP by mot.month
        ) as maxtong
        ,
        (
        SELECT cthoadon.id_sanpham,sum(cthoadon.so_luong*sanpham.don_gia) as tong,month(hoadon.ngay_tao) as month FROM cthoadon,hoadon,sanpham WHERE cthoadon.id_hoadon=hoadon.id AND cthoadon.id_sanpham=sanpham.id GROUP BY month(hoadon.ngay_tao),cthoadon.id_sanpham
        ) as tong
    WHERE maxtong.max=tong.tong and maxtong.month= tong.month";

    $sanphambanchay = executeQuery("localhost","root","","bannuocdb",$strSQL);
    
    foreach($sanphambanchay as $item4){
        $array4[]=$item4;
    }
    for($t=0;$t<count($array4);$t++){
        $masp[]=$array4[$t]["id_sanpham"];
        $max[]=$array4[$t]["max"];
        $month[]= $array4[$t]["month"];

    }
?>
<!-- ----------------------------------------------------------------------- -->
<!-- Parse Javascript -->
<!-- -------------------------------------------------------------------------------------------------- -->
<script>
    var dataarray = <?php echo json_encode($dataarray); ?>;
    var labelarray = <?php echo json_encode($labelarray); ?>;

    var dataarray2 = <?php echo json_encode($dataarray2); ?>;
    var labelarray2 = <?php echo json_encode($labelarray2); ?>;    
    
    var dataarray3 = <?php echo json_encode($dataarray3); ?>;
    var labelarray3 = <?php echo json_encode($labelarray3); ?>;
    
    var masp = <?php echo json_encode($masp); ?>;
    var max = <?php echo json_encode($max); ?>;
    var month =<?php echo json_encode($month); ?>;
    

</script>
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->

<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- Thống kê  -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="c3charts/c3.css">
        <link rel="stylesheet" href="js/morris-bundle/morris.css">
    </head>
    <body style="width: 100%; height: 100%">
<div class="wrapper">

    <div class="row">
                    <!-- ============================================================== -->
                    <!-- bar chart  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Tổng tiền hóa đơn theo khách hàng từ ngày 2021-05-01 đến 2021-05-31</h5>
                            <div class="card-body">
                                <canvas id="chartjs_bar"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end bar chart  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- bar chart  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">                        
                            <form action="" onsubmit="return kiemtra2();">
                                <input id="txmonth2" type="text" name="month2" placeholder="Tháng" maxlength="2" style="width:60px;" >
                                <input id="btchart2" type="submit" name="submit" value="Đi">
                            </form>
                            <h5 class="card-header">Thống kê tổng tiền hóa đơn theo thể loại trong tháng <?php echo "$month2"?></h5>
                            
                            <div class="card-body">
                                <canvas id="chartjs_bar2"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end bar chart  -->
                    <!-- ============================================================== -->
    </div>
    <div class="row">
                    <!-- ============================================================== -->
                    <!-- bar chart  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Thống kê tình hình doanh thu từ ngày 2021-05-01 đến 2021-05-31</h5>
                            <div class="card-body">
                                <canvas id="chartjs_bar3"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end bar chart  -->
                    <!-- ============================================================== -->
                
    </div>

    <div class="row">
                     <!-- ============================================================== -->
                        <!--stacked chart  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Thống kê sản phẩm bán chạy nhất theo tháng trong năm 2021 </h5>
                                <div class="card-body">
                                    <!-- <div id="morris_stacked"></div> -->
                                    <div id="bar-chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!--end stacked chart  -->
                        <!-- ============================================================== -->
    </div>
                
    </div>
    </div>
    </body>
    <script src="js/jquery/jquery-3.3.1.min.js"></script>
    <script src="js/charts-bundle/Chart.bundle.js"></script>
    <script src="js/charts-bundle/chartjs.js"></script>
    
    <script src="js/morris-bundle/raphael.min.js"></script>
    <script src="js/morris-bundle/morris.js"></script>
    <script src="js/morris-bundle/Morrisjs.js"></script>
    <script>
    function kiemtra2(){
    var check =/^1[0-2]*|[2-9]$/g;
    //var check =/^[0-9]*$/g;
    
    var nam = document.getElementById("txmonth2").value;
    if(check.test(nam))
        return true;
    else 
    return false;
}
    </script>
</html>
