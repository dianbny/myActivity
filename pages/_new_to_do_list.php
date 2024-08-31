<?php
    if(!isset($_SESSION['status'])){ 
      header('location:logout');
    }

?>
<div class="container-form">
    <h5><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Form New List Plan/Acivity</h5><br>
    <form method="POST" action="save-to-do-list-<?= $dataUser['_id_pekerja']; ?>" class="form-input">
        <label for="date">Date &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <input type="date" name="date" value="<?= date('Y-m-d'); ?>" required><br>

        <label for="activity">List Plan/Activity&nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <textarea name="activity" class="textarea" placeholder="Add New Plan/Activity" required></textarea>

        <button type="button" class="btnForm" onclick="window.location.href = 'to-do-list'">Back</button>
        <input type="submit" name="save" value="Save" class="btnForm">
    </form>

</div>