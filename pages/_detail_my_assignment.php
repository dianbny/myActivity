<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "user"){ 
      header('location:logout');
    }

    if(isset($_GET['id'])){
        if($getData->cekID('_tb_assignment','_id_tugas','_id_user', $_GET['id'], $dataUser['_id_pekerja']) < 1 ){
            header('location:logout');
        }

        $id = $_GET['id'];
        $dataAssignment = $getData->getMyAssignmentbyID($id);
    }
?>
<div class="container-form">
    <h5><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Form Update My Assignment</h5><br>
    <form method="POST" action="update-my-assignment-<?= $id; ?>" class="form-input">
        <label for="assigment_no">Assignment No. &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <input type="text" value="<?= $id; ?>" required readonly><br>

        <label for="date">Date &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <input type="date" value="<?= $dataAssignment['_tanggal_tugas']; ?>" required readonly><br>

        <label for="assignment">Assignment &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <textarea name="assignment" class="textarea" required readonly><?= $dataAssignment['_tugas']; ?></textarea>

        <label for="status">Status &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <select name="status" class="select" required>
            <option value="">- Select Status -</option>
            <option value="Done">Done</option>
            <option value="Pending">Pending</option>
        </select>

        <label for="information">Information&nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <textarea name="information" class="textarea" placeholder="Add New Information" required></textarea>

        <button type="button" class="btnForm" onclick="window.location.href = 'my-assignment'">Back</button>
        <input type="submit" name="save" value="Save" class="btnForm">
    </form>

</div>