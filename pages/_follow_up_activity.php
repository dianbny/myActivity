<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "user"){ 
      header('location:logout');
    }

    if(isset($_GET['id'])){
        if($getData->cekID('_tb_daily_activity_app', '_id_aktifitas','_id_pekerja', $_GET['id'], $dataUser['_id_pekerja']) < 1){

            header('location:logout');
        }

        $id = $_GET['id'];
        $dataActivity = $getData->getDataDAbyID($id);
    }
?>
<div class="container-form">
    <h5><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Form Follow Up Activity</h5><br>
    <form method="POST" action="save-follow-up-activity-<?= $id; ?>" class="form-input">
        <label for="date">Date &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <input type="date" name="date" value="<?= date('Y-m-d'); ?>" required><br>

        <label for="type">Type of Activity &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <select name="type" class="select" required>
            <option value="<?= $dataActivity['_tipe_aktifitas']; ?>"><?= $dataActivity['_tipe_aktifitas']; ?></option>
            <option value="">- Select Type -</option>
            <option value="General Activity">General Activity</option>
            <option value="Engineer Activity">Engineer Activity</option>
        </select>

        <label for="activity">Activity &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <textarea name="activity" class="textarea" placeholder="Add New Activity" required><?= $dataActivity['_aktifitas']; ?></textarea>

        <label for="status">Status &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <select name="status" class="select" required>
            <option value="<?= $dataActivity['_status']; ?>" selected><?= $dataActivity['_status']; ?></option>
            <option value="">- Select Status -</option>
            <option value="Done">Done</option>
            <option value="Pending">Pending</option>
        </select>

        <label for="info">Additional Information &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <textarea name="info" class="textarea" placeholder="Additional Information" required></textarea>

        <button type="button" class="btnForm" onclick="window.location.href = 'daily-activity'">Back</button>
        <input type="submit" name="save" value="Save" class="btnForm">
    </form>

</div>