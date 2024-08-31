<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "user"){ 
      header('location:logout');
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $dataActivity = $getData->getDataDAbyID($id);
    }
?>
<div class="container-form">
    <h5><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Form Update Activity</h5><br>
    <form method="POST" action="update-activity-<?= $id; ?>" class="form-input">
        <label for="date">Date &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <input type="date" name="date" value="<?= $dataActivity['_tanggal']; ?>"><br>

        <label for="activity">Activity &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <textarea name="activity" class="textarea" placeholder="Add New Activity"><?= $dataActivity['_aktifitas']; ?></textarea>

        <label for="status">Status &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <select name="status" class="select">
            <option value="<?= $dataActivity['_status']; ?>" selected><?= $dataActivity['_status']; ?></option>
            <option value="">- Select Status -</option>
            <option value="Done">Done</option>
            <option value="Pending">Pending</option>
        </select>

        <button type="button" class="btnForm" onclick="window.location.href = 'daily-activity'">Back</button>
        <input type="submit" name="save" value="Save" class="btnForm">
    </form>

</div>