<?php
    if(!isset($_SESSION['status']) || $dataUserLogin['_level'] != "user"){ 
      header('location:logout');
    }

?>
<div class="container-form">
    <h5><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Form New Activity</h5><br>
    <form method="POST" action="save-activity-<?= $dataUser['_id_pekerja']; ?>" class="form-input">
        <label for="date">Date &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <input type="date" name="date" value="<?= date('Y-m-d'); ?>" required><br>

        <label for="activity">Activity &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <textarea name="activity" class="textarea" placeholder="Add New Activity" required></textarea>

        <label for="status">Status &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <select name="status" class="select" required>
            <option value="" selected>- Select Status -</option>
            <option value="Done">Done</option>
            <option value="Pending">Pending</option>
        </select>

        <button type="button" class="btnForm" onclick="window.location.href = 'daily-activity'">Back</button>
        <input type="submit" name="save" value="Save" class="btnForm">
    </form>

</div>