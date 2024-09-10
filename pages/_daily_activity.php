<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "user"){ 
        header('location:logout');
    }

    $start;
    $end;

    if(isset($_POST['search'])){
        $start = $_POST['start'];
        $end = $_POST['end'];
    }
    else {
        $start = date('Y-m-d');
        $end = date('Y-m-d');
    }
?>

<label class="labelTitle"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;Daily Activity</label>

    <form method="POST" action="daily-activity" class="form-table">
        From : <input type="date" name="start" value="<?= $start; ?>"> &nbsp; To : <input type="date" name="end" value="<?= $end; ?>" min="<?= date('Y-m-d'); ?>">
        <input type="submit" name="search" value="Search">
    </form>
        <?php
             if($getData->cekDAFromTo($dataUser['_id_pekerja'], $start, $end) > 0){
        ?>
        <span style="font-size:12px;">Daily Activity | Status :&nbsp; <i class="fa fa-circle" aria-hidden="true" style="color:green"></i>&nbsp; Done, <i class="fa fa-circle" aria-hidden="true" style="color:darkorange"></i>&nbsp; Pending </span>
        <div class="table-layout">
            <table class="table-style">
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Activity</th>
                    <th style="text-align:center;">Status</th>
                    <th colspan="2" style="text-align:center;">Action</th>
                </tr>
                <?php
                    $no = 1;
                    foreach($getData->ListDAFromTo($dataUser['_id_pekerja'], $start, $end) as $row){ ?>
                        <tr>
                            <td><?= $no++."."; ?></td>
                            <td><?= strftime('%d %B %Y', strtotime($row['_tanggal'])); ?></td>
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
                            <td style="text-align:center;"><a href="detail-activity-<?= $row['_id_aktifitas']; ?>" class="linkDetail"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                            <td style="text-align:center;"><a href="javascript:void(0)" data-id="<?= $row['_id_aktifitas']; ?>" class="linkError konfirmDeleteActivity"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
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
<a href="new-activity" class="linkTransferPg"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; New Activity</a>
<a href="daily-activity" class="linkTransferPg"><i class="fa fa-refresh" aria-hidden="true"></i> &nbsp; Refresh</a>
