<?php
    if(!isset($_SESSION['status'])){ 
        header('location:logout');
    }
?>
<div class="container-form">
    <h5><i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp; Form Update Password</h5><br>
    <form method="POST" action="save-new-password-<?= $dataUser['_id_pekerja']; ?>" class="form-input">

        <label for="password">New Password &nbsp;<span style="color:red;font-size:15px;">*</span></label><br>
        <input type="password" name="password" placeholder="Type New Password" required><br>

        <button type="button" class="btnForm" onclick="window.location.href = 'dashboard'">Back</button>
        <input type="submit" name="save" value="Save" class="btnForm">
    </form>

</div>