<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "admin"){ 
        header('location:logout');
    }

    if(isset($_GET['status'])){
        $status = $_GET['status'];
        

    }
?>

<label class="labelTitle"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;Assignment</label><br><br>

    <?php
        if($getData->cekAssUserbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), $status) > 0){
    ?>
        <span style="font-size:12px;">Assignment Status : <?= $status; ?></span>
        <div class="table-layout">
            <table class="table-style">
                <tr>
                <th>No.</th>
                    <th>Assignment No.</th>
                    <th>Request Date</th>
                    <th>Request Time</th>
                    <th>Assignment Date</th>
                    <th>Assignment</th>
                    <th>Engineer</th>
                    <th style="text-align:center;">Status</th>
                    <th>Information</th>
                    <th colspan="2" style="text-align:center;">Action</th>
                </tr>
                <?php
                    $no = 1;
                    foreach($getData->ListAssUserbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), $status) as $row){ ?>
                        <tr>
                            <td><?= $no++."."; ?></td>
                            <td><?= $row['_id_tugas']; ?></td>
                            <td><?= strftime('%d %B %Y', strtotime($row['_tanggal'])); ?></td>
                            <td><?= $row['_waktu']; ?></td>
                            <td><?= strftime('%d %B %Y', strtotime($row['_tanggal_tugas'])); ?></td>
                            <td><?= $row['_tugas']; ?></td>
                            <td>
                                <?php
                                    $engineer = $getData->getDataPekerja($row['_id_user']);
                                    echo $engineer['_nama_pekerja'];
                                ?>
                            </td>
                            <td style="text-align:center;">
                                <?php
                                    if($row['_status'] == "Request"){ ?>
                                        <span style="color:dodgerblue;font-size:14px;"><i class="fa fa-circle" aria-hidden="true"></i></span>
                              <?php }
                                    elseif($row['_status'] == "Done"){ ?>
                                        <span style="color:green;font-size:14px;"><i class="fa fa-circle" aria-hidden="true"></i></span>
                              <?php }
                                    else{ ?>
                                        <span style="color:darkorange;font-size:14px;"><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <?php }
                                ?>
                            </td>
                            <td><?= $row['_ket']; ?></td>
                            <td style="text-align:center;"><a href="detail-assignment-<?= $row['_id_tugas']; ?>" class="linkDetail"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                            <td style="text-align:center;"><a href="javascript:void(0)" data-id="<?= $row['_id_tugas']; ?>" class="linkError konfirmDeleteAssignment"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
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
