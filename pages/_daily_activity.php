<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "user"){ 
        header('location:logout');
    }

    $start;
    $end;
    $cekDailyActivity;
    $dataDailyActivity;

    if(isset($_POST['search'])){
        $start = $_POST['start'];
        $end = $_POST['end'];
        $cekDailyActivity = $getData->cekDAFromToTipe($dataUser['_id_pekerja'], $start, $end, $_POST['type']);
        
        if($cekDailyActivity > 0){
            $dataDailyActivity = $getData->ListDAFromToTipe($dataUser['_id_pekerja'], $start, $end, $_POST['type']);
        }
        
    }
    else {
        $start = date('Y-m-d');
        $end = date('Y-m-d');
        $cekDailyActivity = $getData->cekDAFromTo($dataUser['_id_pekerja'], $start, $end);
        
        if($cekDailyActivity > 0){
            $dataDailyActivity = $getData->ListDAFromTo($dataUser['_id_pekerja'], $start, $end);
        }
        
    }
?>

<label class="labelTitle"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;Daily Activity</label>

    <form method="POST" action="daily-activity" class="form-table">
        <select name="type" class="select" required>
            <option value="" selected>- Select Type -</option>
            <option value="General Activity">General Activity</option>
            <option value="Engineer Activity">Engineer Activity</option>
        </select>
        &nbsp; From : <input type="date" name="start" value="<?= $start; ?>"> &nbsp; To : <input type="date" name="end" value="<?= $end; ?>" min="<?= date('Y-m-d'); ?>">
        <input type="submit" name="search" value="Search">
    </form>

        <span style="font-size:12px;">Daily Activity | Status :&nbsp; <i class="fa fa-circle" aria-hidden="true" style="color:green"></i>&nbsp; Done, <i class="fa fa-circle" aria-hidden="true" style="color:darkorange"></i>&nbsp; Pending </span>
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
                    <th colspan="2" style="text-align:center;">Action</th>
                </tr>
                <?php
                    if($cekDailyActivity > 0){
                        $no = 1;
                        foreach($dataDailyActivity as $row){ ?>
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
                                            if($getData->cekFollowUp($row['_id_aktifitas'], $row['_id_pekerja']) < 1){ ?>
                                                <a href="follow-up-activity-<?= $row['_id_aktifitas']; ?>" class="linkDetail"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                                      <?php }
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
                                <td style="text-align:center;"><a href="detail-activity-<?= $row['_id_aktifitas']; ?>" class="linkDetail"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                                <td style="text-align:center;"><a href="javascript:void(0)" data-id="<?= $row['_id_aktifitas']; ?>" class="linkError konfirmDeleteActivity"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
                            </tr>
                <?php }
                   
                    }
                    else { ?>
                        <tr>
                            <td colspan="9" style="color:red;text-align:center;">Data Activity Not Found !</td>
                        </tr>    
             <?php  }    
                ?>
            </table>
        </div>

<a href="new-activity" class="linkTransferPg"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; New Activity</a>
<a href="daily-activity" class="linkTransferPg"><i class="fa fa-refresh" aria-hidden="true"></i> &nbsp; Refresh</a>
