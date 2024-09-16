<?php
    if(!isset($_SESSION['status'])){ 
        header('location:logout');
    }

    if(isset($_GET['status'])){
        $status = $_GET['status'];
        

    }
?>

<label class="labelTitle"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;To Do List</label><br><br>

        <span style="font-size:12px;">To Do List Status : <?= $status; ?></span>
        <div class="table-layout">
            <table class="table-style">
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>List Plan/Acitivity</th>
                    <th style="text-align:center;">Status</th>
                    <th colspan="2" style="text-align:center;">Action</th>
                </tr>
                <?php
                    if($getData->cekTDLUserbyStatus($dataUser['_id_pekerja'], date('Y'), $status) > 0){
                        $no = 1;
                        foreach($getData->ListToDoListbyStatus($dataUser['_id_pekerja'], date('Y'), $status) as $row){ ?>
                            <tr>
                                <td><?= $no++."."; ?></td>
                                <td><?= strftime('%d %B %Y', strtotime($row['_tanggal'])); ?></td>
                                <td style="text-decoration:<?= ($row['_status'] == "Done") ? "line-through" : ""; ?>"><?= $row['_plan']; ?></td>
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
                                <td style="text-align:center;"><a href="detail-to-do-list-<?= $row['_id']; ?>" class="linkDetail"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                                <td style="text-align:center;"><a href="javascript:void(0)" data-id="<?= $row['_id']; ?>" class="linkError konfirmDeleteTDL"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
                            </tr>
                  <?php }
                    }
                    else { ?>
                        <tr>
                            <td colspan="6" style="color:red;text-align:center;">To Do List Not Found !</td>
                        </tr> 
             <?php  }
                        
                ?>
            </table>
        </div>

<a href="dashboard" class="linkTransferPg"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Back</a>
