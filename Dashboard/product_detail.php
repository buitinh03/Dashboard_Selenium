<?php 
include_once('inc/header.php');
// include_once('inc/deshboad.php');
include_once('connect.php');

    $product = new product();
?>


<?php
    if(!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location='index.php'</script>";
    }else{
        $id = $_GET['id'];
        $price = $_GET['price'];
    }

?>
<section class="product-gallery-one">
<div class="container">

<div class="product">
    <?php
    $detailPro = $product->details_product_2($id);
    if($detailPro){
        while($result = $detailPro->fetch()){
    ?>
    <div class="product-image">
       <img src="<?php echo $result['photo'] ?>" alt="">
        
    </div>

    <div class="product-details">
 
        <h1><?php echo $result['title'] ?></h1>

        <p>Đã bán: <?php echo $result['sales_in_last_24_hours'] ?></p>

        <!-- <h2>Thời gian:</h2>
    
        <p><?php echo $result['datetime'] ?></p> -->

        <div class="features">
            <h3>Đặc tính sản phẩm:</h3>
            <ul>
          
                <li><span>Nhà SX:</span><p><?php echo $result['nha_san_xuat'] ?></p></li>
                <li><span>Nước SX:</span><p><?php echo $result['nuoc_san_xuat'] ?></p></li>
                <!-- <li><span>Còn:</span><p><?php echo $result['productQuantity'] ?> cái</p></li> -->
               
            </ul>
        </div>

        <p class="price">Giá:
        <?php
         if($price == $result['price']){
            ?>
             <span ><?php echo number_format($result['price']); ?><sup>đ</sup> (giá cũ)</span>
             <?php 
            }elseif($price > $result['price']){
                ?>
            <span style="color: green;"><?php echo number_format($result['price']); ?><sup>đ</sup> (giảm)</span>
            <?php 
            } else{
                ?>
            <span style="color: red;"><?php echo number_format($result['price']); ?><sup>đ</sup> (tăng)</span>
            <?php 
            } 
            ?>
             
        </p>
      

    </div>
     
        <div class="product_thongtin">
            <h2>Thông tin sản phẩm</h2>
            <p><?php echo $result['thong_tin_san_pham'] ?> </p>
            <div class="product_hamluong">
          <h2>Thành phần - Hàm lượng</h2>
          <p><?php echo $result['hamluong_thanhphan'] ?></p>
        </div>
        <div class="product_link">
          <h2>Sản phẩm</h2>
          <p>Để tìm hiểu chi tiết hơn về sản phẩm vui lòng <a href="<?php echo $result['link'] ?>"><ins>bấm vào đây !</ins></a></p>
        </div>
        <div class="container-cat">
<div class="warranty-policy">
            <div class="warranty-policy-h1">
            <h1>BẢNG SO SÁNH GIÁ QUA TỪNG THÁNG</h1>
            </div>
            <div class="warranty-policy-content">
            <span class="spans">Tháng 1: 
            <?php  if($result['month_1']== ""){
            ?>
               <li ><p style="color: black;"><span> </span>    </p></li>
             <?php 
            }else{
            ?>
                <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_1']); ?><sup>đ</sup> (giá tháng 1).</p></li>
            <?php 
            }
            ?>
            </span>
            <span  class="spans">Tháng 2:
            <?php 
             if($result['month_2']== ""){
            ?>
                <li ><p style="color: black;"><span> </span>    </p></li>
            <?php
            }elseif($result['month_2'] == $result['month_1']){ ?>
               <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_2']); ?><sup>đ</sup> ( tháng 2. Giá không đổi(0%)).</p></li>
            <?php 
            } elseif($result['month_2'] > $result['month_1']){
            ?>
              <li ><p style="color: red;"><span>+ </span><?php echo number_format($result['month_2']); ?><sup>đ</sup> (tháng 2. Giá tăng (+<?php $i = 100; $phantram = $result['month_2'] / $result['month_1'] * 100; $ket = $phantram - $i; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php 
            }else{
            ?>
              <li ><p style="color: green;"><span>+ </span><?php echo number_format($result['month_2']); ?><sup>đ</sup> (tháng 2. Giá giảm(-<?php $i = 100; $phantram = $result['month_2'] / $result['month_1'] * 100; $ket = $i - $phantram; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
              <?php
            }
            ?>
            </span>
            <span  class="spans">Tháng 3:
            <?php 
            if($result['month_3']== ""){
            ?>
                <li ><p style="color: black;"><span> </span>    </p></li>
            <?php
             } elseif($result['month_3'] == $result['month_2']){ ?>
                <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_3']); ?><sup>đ</sup> (tháng 3. Giá không đổi(0%)).</p></li>
            <?php 
            } elseif($result['month_3'] > $result['month_2']){
            ?>
              <li ><p style="color: red;"><span>+ </span><?php echo number_format($result['month_3']); ?><sup>đ</sup> (tháng 3. Giá tăng (+<?php $i = 100; $phantram = $result['month_3'] / $result['month_2'] * 100; $ket = $phantram - $i; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php 
            }else{
            ?>
              <li ><p style="color: green;"><span>+ </span><?php echo number_format($result['month_3']); ?><sup>đ</sup> (tháng 3. Giá giảm(-<?php $i = 100; $phantram = $result['month_3'] / $result['month_2'] * 100; $ket = $i - $phantram; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
              <?php
            }
            ?>
            </span>
            <span  class="spans">Tháng 4:
            <?php 
             if($result['month_4']== ""){
            ?>
             <li ><p style="color: black;"><span> </span>    </p></li>
            <?php
            }elseif($result['month_4'] == $result['month_3']){ ?>
                <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_4']); ?><sup>đ</sup> (tháng 4. Giá không đổi(0%)).</p></li>
            <?php 
            } elseif($result['month_4'] > $result['month_2']){
            ?>
                 <li ><p style="color: red;"><span>+ </span><?php echo number_format($result['month_4']); ?><sup>đ</sup> (tháng 3. Giá tăng (+<?php $i = 100; $phantram = $result['month_4'] / $result['month_3'] * 100; $ket = $phantram - $i; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php 
            }else{
            ?>
               <li ><p style="color: green;"><span>+ </span><?php echo number_format($result['month_4']); ?><sup>đ</sup> (tháng 3. Giá giảm(-<?php $i = 100; $phantram = $result['month_4'] / $result['month_3'] * 100; $ket = $i - $phantram; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
              <?php
            }
            ?>
            </span>
    
            <span  class="spans">Tháng 5:
            <?php 
             if($result['month_5']== ""){
             ?>
             <li ><p style="color: black;"><span> </span>    </p></li>
            <?php
            }elseif($result['month_5'] == $result['month_4']){ ?>
                 <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_5']); ?><sup>đ</sup> (tháng 5. Giá không đổi(0%)).</p></li>
            <?php 
            } elseif($result['month_5'] > $result['month_4']){
            ?>
                  <li ><p style="color: red;"><span>+ </span><?php echo number_format($result['month_5']); ?><sup>đ</sup> (tháng 5. Giá tăng (+<?php $i = 100; $phantram = $result['month_5'] / $result['month_4'] * 100; $ket = $phantram - $i; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php 
            }else{
            ?>
              <li ><p style="color: green;"><span>+ </span><?php echo number_format($result['month_5']); ?><sup>đ</sup> (tháng 5. Giá giảm(-<?php $i = 100; $phantram = $result['month_5'] / $result['month_4'] * 100; $ket = $i - $phantram; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
              <?php
            }
            ?>
            </span>
            <span  class="spans">Tháng 6:
            <?php 
             if($result['month_6']== ""){
             ?>
           <li ><p style="color: black;"><span> </span>    </p></li>
            <?php
            }elseif($result['month_6'] == $result['month_5']){ ?>
                <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_6']); ?><sup>đ</sup> (tháng 6. Giá không đổi(0%)).</p></li>
            <?php 
            } elseif($result['month_6'] > $result['month_5']){
            ?>
                 <li ><p style="color: red;"><span>+ </span><?php echo number_format($result['month_6']); ?><sup>đ</sup> (tháng 6. Giá tăng (+<?php $i = 100; $phantram = $result['month_6'] / $result['month_5'] * 100; $ket = $phantram - $i; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php 
            }else{
            ?>
              <li ><p style="color: green;"><span>+ </span><?php echo number_format($result['month_6']); ?><sup>đ</sup> (tháng 6. Giá giảm(-<?php $i = 100; $phantram = $result['month_6'] / $result['month_5'] * 100; $ket = $i - $phantram; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
              <?php
            }
            ?>
            </span>
            <span class="spans">Tháng 7:
            <?php 
             if($result['month_7']== ""){
            ?>
            <li ><p style="color: black;"><span> </span>    </p></li>
            <?php
            }elseif($result['month_7'] == $result['month_6']){ ?>
                 <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_7']); ?><sup>đ</sup> (tháng 7. Giá không đổi(0%)).</p></li>
            <?php 
            } elseif($result['month_7'] > $result['month_7']){
            ?>
                <li ><p style="color: red;"><span>+ </span><?php echo number_format($result['month_7']); ?><sup>đ</sup> (tháng 7. Giá tăng (+<?php $i = 100; $phantram = $result['month_7'] / $result['month_6'] * 100; $ket = $phantram - $i; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php 
            }else{
            ?>
                  <li ><p style="color: green;"><span>+ </span><?php echo number_format($result['month_7']); ?><sup>đ</sup> (tháng 7. Giá giảm(-<?php $i = 100; $phantram = $result['month_7'] / $result['month_6'] * 100; $ket = $i - $phantram; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php
            }
            ?>
            </span>
            <span class="spans">Tháng 8:
            <?php
             if($result['month_8']== ""){
            ?>
         <li ><p style="color: black;"><span> </span>    </p></li>
            <?php
            } elseif($result['month_8'] == $result['month_7']){ ?>
                 <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_8']); ?><sup>đ</sup> (tháng 8. Giá không đổi(0%)).</p></li>
            <?php 
            } elseif($result['month_8'] > $result['month_7']){
            ?>
                 <li ><p style="color: red;"><span>+ </span><?php echo number_format($result['month_8']); ?><sup>đ</sup> (tháng 8. Giá tăng (+<?php $i = 100; $phantram = $result['month_8'] / $result['month_7'] * 100; $ket = $phantram - $i; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php 
            }else{
            ?>
                 <li ><p style="color: green;"><span>+ </span><?php echo number_format($result['month_8']); ?><sup>đ</sup> (tháng 8. Giá giảm(-<?php $i = 100; $phantram = $result['month_8'] / $result['month_7'] * 100; $ket = $i - $phantram; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
              <?php
            }
            ?>
            </span>
            <span class="spans">Tháng 9:
            <?php 
            if($result['month_9']== ""){
            ?>
               <li ><p style="color: black;"><span> </span>    </p></li>
            <?php
            }elseif($result['month_9'] == $result['month_8']){ ?>
               <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_9']); ?><sup>đ</sup> (tháng 9. Giá không đổi(0%)).</p></li>
            <?php 
            } elseif($result['month_9'] > $result['month_8']){
            ?>
              <li ><p style="color: red;"><span>+ </span><?php echo number_format($result['month_9']); ?><sup>đ</sup> (tháng 9. Giá tăng (+<?php $i = 100; $phantram = $result['month_9'] / $result['month_8'] * 100; $ket = $phantram - $i; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php 
            }else{
            ?>
              <li ><p style="color: green;"><span>+ </span><?php echo number_format($result['month_9']); ?><sup>đ</sup> (tháng 9. Giá giảm(-<?php $i = 100; $phantram = $result['month_9'] / $result['month_8'] * 100; $ket = $i - $phantram; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
              <?php
            }
            ?>
            </span>
            <span class="spans">Tháng 10:
            <?php 
             if($result['month_10']== ""){
                ?>
              <li ><p style="color: black;"><span> </span>    </p></li>
            <?php
            }elseif($result['month_10'] == $result['month_9']){ ?>
                 <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_10']); ?><sup>đ</sup> (tháng 10. Giá không đổi(0%)).</p></li>
            <?php 
            } elseif($result['month_10'] > $result['month_9']){
            ?>
                <li ><p style="color: red;"><span>+ </span><?php echo number_format($result['month_10']); ?><sup>đ</sup> (tháng 10. Giá tăng (+<?php $i = 100; $phantram = $result['month_10'] / $result['month_9'] * 100; $ket = $phantram - $i; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php 
            }else{
            ?>
                  <li ><p style="color: green;"><span>+ </span><?php echo number_format($result['month_10']); ?><sup>đ</sup> (tháng 10. Giá giảm(-<?php $i = 100; $phantram = $result['month_10'] / $result['month_9'] * 100; $ket = $i - $phantram; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
              <?php
            }
            ?>
            </span>
            <span class="spans">Tháng 11:
            <?php 
             if($result['month_11']== "")
             {?>
              <li ><p style="color: black;"><span> </span>    </p></li>
            <?php
             }elseif($result['month_11'] == $result['month_10']){ ?>
            <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_11']); ?><sup>đ</sup> (tháng 11. Giá không đổi(0%)).</p></li>
            <?php 
            } elseif($result['month_11'] > $result['month_10']){
            ?>
              <li ><p style="color: red;"><span>+ </span><?php echo number_format($result['month_11']); ?><sup>đ</sup> (tháng 11. Giá tăng (+<?php $i = 100; $phantram = $result['month_11'] / $result['month_10'] * 100; $ket = $phantram - $i; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php 
            }else{
            ?>
              <li ><p style="color: green;"><span>+ </span><?php echo number_format($result['month_11']); ?><sup>đ</sup> (tháng 11. Giá giảm(-<?php $i = 100; $phantram = $result['month_11'] / $result['month_10'] * 100; $ket = $i - $phantram; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
              <?php
            }
            ?>
            </span>
            <span class="spans">Tháng 12:
            <?php 
             if($result['month_12']== ""){
            ?>
             <li ><p style="color: black;"><span> </span>    </p></li>
            <?php
            }elseif($result['month_12'] == $result['month_11']){ 
                ?>
            <li ><p style="color: black;"><span>+ </span><?php echo number_format($result['month_12']); ?><sup>đ</sup> (tháng 12. Giá không đổi(0%)).</p></li>
            <?php 
            } elseif($result['month_12'] > $result['month_11']){
            ?>
              <li ><p style="color: red;"><span>+ </span><?php echo number_format($result['month_12']); ?><sup>đ</sup> (tháng 12. Giá tăng (+<?php $i = 100; $phantram = $result['month_12'] / $result['month_11'] * 100; $ket = $phantram - $i; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
            <?php 
            }else{
            ?>
              <li ><p style="color: green;"><span>+ </span><?php echo number_format($result['month_12']); ?><sup>đ</sup> (tháng 12. Giá giảm(-<?php $i = 100; $phantram = $result['month_12'] / $result['month_1'] * 100; $ket = $i - $phantram; $ketqua = round($ket * 100) / 100; echo $ketqua; ?>%)).</p></li>
              <?php
            }
            ?>
            </span>
            </div>
        </div>
        <?php
            }
        }
        ?>
</div>
          </div>



      
    </div>
 

          
         

