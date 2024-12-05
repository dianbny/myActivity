<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "admin"){ 
        header('location:logout');
    }

    if(isset($_GET['status'])){ 
        if($_GET['status'] == "saved"){ ?>
            <script>
                setTimeout(function() { 
                    swal({
                        title: "Information",
                        text: "Data has been saved",
                        type: "success",
                        confirmButtonText: "OK"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location.href = "<?= BASEURL; ?>/assignment";
                        }
                }); }, 500);
            </script>
  <?php }
        elseif($_GET['status'] == "deleted"){ ?>
            <script>
                setTimeout(function() { 
                    swal({
                        title: "Information",
                        text: "Data has been deleted",
                        type: "success",
                        confirmButtonText: "OK"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location.href = "<?= BASEURL; ?>/assignment";
                        }
                }); }, 500);
            </script>
  <?php }
        
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

<h5><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;Assignment</h5>
<div class="container-nd">

    <form method="POST" action="<?= BASEURL; ?>/assignment" class="form-table">
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
        <div class="divJudul">
            <span style="font-size:12px;">Assignment : <?= $bulan."/".$tahun; ?> | Status :&nbsp; <i class="fa fa-circle" aria-hidden="true" style="color:dodgerblue"></i>&nbsp; Request, <i class="fa fa-circle" aria-hidden="true" style="color:green"></i>&nbsp; Done, <i class="fa fa-circle" aria-hidden="true" style="color:darkorange"></i>&nbsp; Pending </span>
            <div>
                <a href="<?= BASEURL; ?>/new-assignment" class="linkTransferPg"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                <a href="<?= BASEURL; ?>/assignment" class="linkTransferPg"><i class="fa fa-refresh" aria-hidden="true"></i></a>

            </div>
        </div>
        
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
                    if($getData->cekMyAssignment("_id_pekerja", $dataUser['_id_pekerja'], $bulan, $tahun) > 0){
                        $no = 1;
                        foreach($getData->ListMyAssignment("_id_pekerja", $dataUser['_id_pekerja'], $bulan, $tahun) as $row){ ?>
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
                                <td style="text-align:center;"><a href="<?= BASEURL; ?>/detail-assignment/<?= $row['_id_tugas']; ?>" class="linkDetail"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                                <td style="text-align:center;"><a href="javascript:void(0)" data-id="<?= $row['_id_tugas']; ?>" class="linkError konfirmDeleteAssignment"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
                            </tr>
                <?php }
                    }
                    else { ?>
                        <tr>
                            <td colspan="11" style="color:red;text-align:center;">Data Assignment Not Found !</td>
                        </tr>  
              <?php }    
                ?>
            </table>
        </div>

</div>
