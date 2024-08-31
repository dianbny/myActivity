<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "admin"){ 
        header('location:logout');
    }

    $bulan;
    $tahun;

    if(isset($_POST['search'])){
        $bulan = $_POST['month'];
        $tahun = $_POST['year'];
    }
    else {
        $bulan = date('m');
        $tahun = date('Y');
    }
?>

<label class="labelTitle"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;Daily Activity</label>

    <form method="POST" action="<?= ($dataUserLogin['_level'] == "user") ? "daily-activity" : "daily-activity-fungsi"; ?>" class="form-table">
        <select name="month" class="select" required>
            <option value="" selected>- Select Month -</option>
                <?php
                    for($i = 0; $i <= 11; $i++){ 
                        $bln = $i+1; 
                        $namaBln = strftime('%B', strtotime($i.'month', strtotime($bln)));
                        ?>
                        <option value="<?= $bln; ?>"><?= $namaBln; ?></option>
              <?php }
                ?>
        </select>
        <select name="year" class="select" required>
            <option value="" selected>- Select Year -</option>
                <?php
                    for($i = date('Y', strtotime('-2 Year', strtotime(date('Y')))); $i <= date('Y', strtotime('+5 Year', strtotime(date('Y')))); $i++){ ?>
                        <option value="<?= $i; ?>"><?= $i; ?></option>
              <?php }
                ?>
        </select>
        <input type="submit" name="search" value="Search">
    </form>
        <?php
             if($getData->cekDailyActivityFungsi($dataUser['_fungsi'], $bulan, $tahun) > 0){
        ?>
        <span style="font-size:12px;">Daily Activity : <?= $bulan."/".$tahun; ?> | Ket :&nbsp; <i class="fa fa-circle" aria-hidden="true" style="color:green"></i>&nbsp; Done, <i class="fa fa-circle" aria-hidden="true" style="color:darkorange"></i>&nbsp; Pending </span>
        <div class="table-layout">
            <table class="table-style">
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Activity</th>
                    <th style="text-align:center;">Status</th>
                    <th>Technician Name</th>
                </tr>
                <?php
                    $no = 1;
                    foreach($getData->ListDailyActivityFungsi($dataUser['_fungsi'], $bulan, $tahun) as $row){ ?>
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

    if($dataUserLogin['_level'] == "user"){ ?>
        <a href="new-activity" class="linkTransferPg"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; New Activity</a>
<?php }
?>
<a href="<?= ($dataUserLogin['_level'] == "user") ? "daily-activity" : "daily-activity-fungsi"; ?>" class="linkTransferPg"><i class="fa fa-refresh" aria-hidden="true"></i> &nbsp; Refresh</a>
