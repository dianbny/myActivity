<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "admin"){ 
        header('location:logout');
    }

    if(isset($_GET['status'])){
        $status = $_GET['status'];
        

    }
?>

<label class="labelTitle"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;Daily Activity</label><br><br>

    <?php
        if($getData->cekDAFungsibyStatus($dataUser['_fungsi'], date('Y'), $status) > 0){
    ?>
        <span style="font-size:12px;">Daily Activity Status : <?= $status; ?></span>
        <div class="table-layout">
            <table class="table-style">
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Type of Activity</th>
                    <th>Activity</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Follow Up</th>
                    <th>Additional Information</th>
                    <th>Engineer</th>
                </tr>
                <?php
                    $no = 1;
                    foreach($getData->ListDAFungsibyStatus($dataUser['_fungsi'], date('Y'), $status) as $row){ ?>
                        <tr>
                            <td><?= $no++."."; ?></td>
                            <td><?= strftime('%d %B %Y', strtotime($row['_tanggal'])); ?></td>
                            <td><?= $row['_tipe_aktifitas']; ?></td>
                            <td><?= $row['_aktifitas']; ?></td>
                            <td style="text-align:center;">
                                <?php
                                    if($row['_status'] == "Done"){ ?>
                                        <span style="color:green;font-size:14px;"><i class="fa fa-circle" aria-hidden="true"></i></span>
                              <?php }
                                    else{ ?>
                                        <span style="color:darkorange;font-size:14px;"><i class="fa fa-circle" aria-hidden="true"></i></span>
                              <?php }
                                    ?>
                            </td>
                            <td style="text-align:center;">
                                <?php
                                    if($row['_status'] == "Pending"){ 
                                        if($getData->cekFollowUp($row['_id_aktifitas'], $row['_id_pekerja']) < 1){ 
                                            echo "Need Follow Up";
                                        }
                                        else {
                                            $ketFU = $getData->getDataFollowUp($row['_id_aktifitas'], $row['_id_pekerja']);
                                            ?>

                                            <?= strftime('%d %B %Y', strtotime($ketFU['_tanggal'])) ?> | <?= $ketFU['_status']; ?>
                                  <?php }  
                                    }
                                    else { 
                                        echo "-";
                                    }
                                ?>
                            </td>
                            <td><?= $row['_keterangan']; ?></td>
                            <td><?= $row['_nama_pekerja']; ?></td>

                        </tr>
              <?php }    
                ?>
            </table>
        </div>
<?php }
      else { ?>
        <br>
        <span style="color:red;font-size:14px;">Data Not Found !</span><br>
<?php }
?>
<a href="dashboard" class="linkTransferPg"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Back</a>
