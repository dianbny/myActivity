<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "user"){ 
        header('location:logout');
    }

    if(isset($_GET['status'])){
        $status = $_GET['status'];
        

    }
?>

<label class="labelTitle"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;My Assignment</label><br><br>

        <span style="font-size:12px;">My Assignment Status : <?= $status; ?></span>
        <div class="table-layout">
            <table class="table-style">
                <tr>
                    <th>No.</th>
                    <th>Assignment No.</th>
                    <th>Request Date</th>
                    <th>Request Time</th>
                    <th>Assignment Date</th>
                    <th>Assignment</th>
                    <th>Requester</th>
                    <th style="text-align:center;">Status</th>
                    <th>Information</th>
                    <th style="text-align:center;">Action</th>
                </tr>
                <?php
                    if($getData->cekAssUserbyStatus("_id_user", $dataUser['_id_pekerja'], date('Y'), $status) > 0){
                        $no = 1;
                        foreach($getData->ListAssUserbyStatus("_id_user", $dataUser['_id_pekerja'], date('Y'), $status) as $row){ ?>
                            <tr>
                                <td><?= $no++."."; ?></td>
                                <td><?= $row['_id_tugas']; ?></td>
                                <td><?= strftime('%d %B %Y', strtotime($row['_tanggal'])); ?></td>
                                <td><?= $row['_waktu']; ?></td>
                                <td><?= strftime('%d %B %Y', strtotime($row['_tanggal_tugas'])); ?></td>
                                <td><?= $row['_tugas']; ?></td>
                                <td>
                                    <?php
                                        $requester = $getData->getDataPekerja($row['_id_pekerja']);
                                        echo $requester['_nama_pekerja'];
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
                                <td style="text-align:center;"><a href="detail-my-assignment-<?= $row['_id_tugas']; ?>" class="linkDetail"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                            </tr>
                  <?php }
                    }
                    else { ?>
                         <tr>
                            <td colspan="10" style="color:red;text-align:center;">Data Assignment Not Found !</td>
                        </tr>  
             <?php  }
                        
                ?>
            </table>
        </div>

<a href="dashboard" class="linkTransferPg"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Back</a>
