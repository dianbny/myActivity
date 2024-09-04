<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "admin"){ 
      header('location:logout');
    }

?>
<div class="container-form">
    <h5><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Form New Assignment</h5><br>
    
    <form method="POST" action="save-assignment-<?= $dataUser['_id_pekerja']; ?>" class="form-input">
        
        <label for="assignmentno">Assignment No. &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <input type="text" name="assignmentno" value="<?= "AS".date('dmyHis'); ?>" required readonly><br>

        <label for="date">Date &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <input type="date" name="date" value="<?= date('Y-m-d'); ?>" required><br>

        <label for="assignment">Assignment &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <textarea name="assignment" class="textarea" placeholder="Add New Assignment" required></textarea>

        <label for="engineer">Engineer &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <select name="engineer" class="select" required>
            <option value="" selected>- Select Engineer -</option>
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