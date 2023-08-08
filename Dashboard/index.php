<?php include "inc/header.php";
    include_once('format/format.php');
?>
            <! END OF ASIDE>
<?php  include ('inc/deshboad.php'); ?>
                </div>
                <div class="recent-order">
                    <h2>SẢN PHẨM</h2>
                    
                    <table>
                    <?php
                        $pro = new product();
                        $tuan = array();
                        for($h=0;$h<12;$h++){
                            $tuan[$h]="month_".($h+1);
                        }
                        $socol = array();
                        for($h=0;$h<12;$h++){
                            $demcol = $pro->testcol($tuan[$h]);
                            $demd = $demcol->fetch();
                            
                            $socol[$h]=$demd['sothu'];
                        }
                     ?>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Nhà SX</th>
                                <th>Nước SX</th>
                                <th>Thông tin</th>
                                <th>SL bán</th>
                                <th>Giá</th>
                                <th>Ảnh</th>
                                <th>Chức năng</th>
                                <?php 
                                for($h=0;$h<12;$h++){
                                    if((int)$socol[$h]!=0){
                                ?>
                                <th hidden><?php echo $tuan[$h]; ?></th>
                                <?php
                                    }
                                }
                                 ?>
                            </tr>
                        </thead>
                        <style>
                            .primary {
                                text-align: right;
                            }

                            .title {
                                text-align: left;
                            }

                            .nha-san-xuat {
                                text-align: left;
                            }

                            .nuoc-san-xuat {
                                text-align: left;
                            }

                            .thong_tin {
                                text-align: left;
                            }
                        </style>
                        
                        <?php 
                        $format = new Format();
                        $pro = new product();
                        $result = $pro ->getListproduct();
                        if($result){
                            $j=0;
                            while($set = $result->fetch()){
                                $j++
                        ?>
                        <tbody>
                            <tr onclick="handleClick(event)">
                                <td><?php echo $j;?></td>
                                <td class="title"><?php echo $set['title']?></td>
                                <td class="nha-san-xuat"><?php echo $set['nha_san_xuat'] ?></td>
                                <td class="nuoc-san-xuat"><?php echo $set['nuoc_san_xuat']?></td>
                                <td class="thong_tin"><?php echo $format->textShorten($set['thong_tin_san_pham'], 50)?></td>
                                <td class="warning" style="text-align: right;"><?php echo $set['sales_in_last_24_hours']?></td>
                                <?php if($set['month_2'] == ""){
                                    ?>
                                <td class="primary" style="text-align: right;"><?php echo number_format($set['month_1'])?><sup>đ</sup></td>
                                <?php
                                } elseif($set['month_3'] == ""){
                                ?>
                                <td class="primary" ><?php echo number_format($set['month_2'])?><sup>đ</sup></td>
                                 <?php 
                                }elseif($set['month_4'] == ""){
                                ?>
                                    <td class="primary"><?php echo number_format($set['month_3'])?><sup>đ</sup></td>
                                    <?php 
                                }elseif($set['month_5'] == ""){
                                ?>
                                    <td class="primary"><?php echo number_format($set['month_4'])?><sup>đ</sup></td>
                                    <?php 
                                }elseif($set['month_6'] == ""){
                                ?>
                                    <td class="primary"><?php echo number_format($set['month_5'])?><sup>đ</sup></td>
                                    <?php 
                                }elseif($set['month_7'] == ""){
                                ?>
                                    <td class="primary"><?php echo number_format($set['month_6'])?><sup>đ</sup></td>
                                    <?php 
                                }elseif($set['month_8'] == ""){
                                ?>
                                    <td class="primary"><?php echo number_format($set['month_7'])?><sup>đ</sup></td>
                                    <?php 
                                }elseif($set['month_9'] == ""){
                                ?>
                                    <td class="primary"><?php echo number_format($set['month_8'])?><sup>đ</sup></td>
                                    <?php 
                                }elseif($set['month_10'] == ""){
                                ?>
                                    <td class="primary"><?php echo number_format($set['month_9'])?><sup>đ</sup></td>
                                    <?php 
                                }elseif($set['month_11'] == ""){
                                ?>
                                    <td class="primary"><?php echo number_format($set['month_10'])?><sup>đ</sup></td>
                                    <?php 
                                }elseif($set['month_12'] == ""){
                                ?>
                                    <td class="primary"><?php echo number_format($set['month_11'])?><sup>đ</sup></td>
                                    <?php 
                                }else{
                                ?>
                                    <td class="primary"><?php echo number_format($set['month_12'])?><sup>đ</sup></td>
                                    <?php 
                                }
                                ?>
                            
                                <td style="align-items: center; text-align:center; margin: 0 auto;" ><img src='<?php echo $set['photo'] ?>' style="width:30%; text-align:center; margin: 0 auto;"></td>
                             
                                <td><a href="product_detail.php?id=<?php echo $set['photo'];?>&price=<?php echo $set['price']?>">Chi tiết</a></td>

                        
                                <?php 
                                for($h=0;$h<12;$h++){
                                    if($socol[$h]!=0){
                                ?>
                                <td hidden><?php echo $set[$tuan[$h]]; ?></td>
                                <?php
                                    }
                                }
                                 ?>
                            </tr>
                            <?php 
                                      }
                                 }
                            ?>
                       
                        </tbody>
                    </table>
                    <a href="#">Show All</a>
                </div>
            </main>
            

            

    <?php include_once('inc/footer.php') ?>