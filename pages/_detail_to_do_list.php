<?php
    if(!isset($_SESSION['status'])){ 
      header('location:logout');
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $dataTDL = $getData->getDataTDLbyID($id);
    }
?>
<div class="container-form">
    <h5><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Form Update Activity</h5><br>
    <form method="POST" action="update-to-do-list-<?= $id; ?>" class="form-input">
        <label for="date">Date &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <input type="date" name="date" value="<?= $dataTDL['_tanggal']; ?>" required><br>

        <label for="activity">Activity &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <textarea name="activity" class="textarea" placeholder="Add New Activity" required><?= $dataTDL['_plan']; ?></textarea>

        <label for="status">Status &nbsp;<span style="color:red;font-size:15px;"></span></label><br>
        <select name="status" class="select" required>
            <option value="">- Select Status -</option>
            <option value="Done">Done</option>
            <option value="Waiting">Waiting</option>
        </select>

        <button type="button" class="btnForm" onclick="window.location.href = 'to-do-list'">Back</button>
        <input type="submit" name="save" value="Save" class="btnForm">
    </form>

</div>