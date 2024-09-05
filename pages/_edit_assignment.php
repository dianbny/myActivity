<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "admin"){ 
      header('location:logout');
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $dataAssignment = $getData->getMyAssignmentbyID($id);
        $engineer = $getData->getDataPekerja($dataAssignment['_id_user']);
    }
?>
<div class="container-form">
    <h5><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Form Update Assigment</h5><br>
    <form method="POST" action="update-assignment-<?= $id; ?>" class="form-input">
        <label for="assigment_no">Assigment No. &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <input type="text" value="<?= $id; ?>" required readonly><br>

        <label for="date">Date &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <input type="date" name="date" value="<?= $dataAssignment['_tanggal_tugas']; ?>" required><br>

        <label for="assignment">Assigment &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <textarea name="assignment" class="textarea" required><?= $dataAssignment['_tugas']; ?></textarea>

        <label for="engineer">Engineer &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <select name="engineer" class="select" required>
            <option value="<?= $dataAssignment['_id_user']; ?>"><?= $engineer['_nama_pekerja']; ?></option>
            <option value="">- Select Engineer -</option>
            <?php
                foreach($getData->listEngineerbyFungsi($dataUser['_fungsi']) as $row){ ?>
                    <option value="<?= $row['_id_pekerja']; ?>"><?= $row['_nama_pekerja']; ?></option>
          <?php }
            ?>  
        </select>

        <button type="button" class="btnForm" onclick="window.location.href = 'assignment'">Back</button>
        <input type="submit" name="save" value="Save" class="btnForm">
    </form>

</div>