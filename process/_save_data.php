<?php
    error_reporting(0);
    session_start();
    require_once '../config/_getData.php';
    require_once '../config/_saveData.php';
    $getData = new _getData();
    $saveData = new _saveData();

    if(!isset($_SESSION['status'])){ 
        header('location:logout');
    } 

    //Waktu 
    date_default_timezone_set("Asia/Kuala_Lumpur");
    setlocale(LC_ALL, 'id-ID', 'id_ID');

    $username = $_SESSION['username'];

    $dataUserLogin = $getData->getDataUserLogin($username);
    $dataUser = $getData->getDataPekerja($dataUserLogin['_id_user']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/pertamina.png" type="image/gif">
    <link rel="stylesheet" type="text/css" href="assets/css/_style_page.css">
    <title>Save Data</title>

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        
</head>
<body>
    <?php
        //Simpan Activity 
        if($_GET['action'] == "save-activity"){
            if(isset($_POST['save'])){
                if(!preg_match("/^[a-zA-Z0-9 .,()&-]*$/", $_POST['activity'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Activity must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[0-9-\/]*$/", $_POST['date'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Date must only contain numbers in date format !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Za-z]*$/", $_POST['status'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Status must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Za-z ]*$/", $_POST['type'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Type of activity must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[a-zA-Z0-9 .,()&-]*$/", $_POST['info'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Additional Information must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                
                else {
                    $id = $_GET['id'];
                    $tanggal = $_POST['date'];
                    $tipe = $_POST['type'];
                    $aktifitas = trim($_POST['activity']);
                    $status = $_POST['status'];
                    $info = trim($_POST['info']);

                    $saveData->simpanAktifitas($id, $tanggal, $tipe, ucwords($aktifitas), $status, ucwords($info)); ?>

                            <script>
                                setTimeout(function() { 
                                    swal({
                                        title: "Information",
                                        text: "Data has been saved",
                                        type: "success",
                                        confirmButtonText: "OK"
                                        },
                                        function(isConfirm){
                                            if (isConfirm) {
                                                window.location.href = "daily-activity";
                                            }
                                }); }, 500);
                            </script>
                    
          <?php }
            }
            else { 
                if(isset($_SESSION['status'])){ ?>
                    <script>    
                        window.location.href = "daily-activity";
                    </script>
            <?php }
                else { ?>
                    <script>    
                        window.location.href = "logout";
                    </script>
          <?php }
            }
        }

        //Update Acitivity
        elseif($_GET['action'] == "update-activity"){
            $id = $_GET['id'];
            if(isset($_POST['save'])){
                if(!preg_match("/^[a-zA-Z0-9 .,()]*$/", $_POST['activity'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Activity must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "detail-activity-<?= $id; ?>";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[0-9-\/]*$/", $_POST['date'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Date must only contain numbers in date format !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "detail-activity-<?= $id; ?>";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Za-z]*$/", $_POST['status'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Status must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "detail-activity-<?= $id; ?>";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Za-z ]*$/", $_POST['type'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Type of activity must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[a-zA-Z0-9 .,()&-]*$/", $_POST['info'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Additional Information must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                
                else {
                    $tanggal = $_POST['date'];
                    $tipe = $_POST['type'];
                    $aktifitas = trim($_POST['activity']);
                    $status = $_POST['status'];
                    $info = trim($_POST['info']);

                    $saveData->updateAktifitas($id, $tanggal, $tipe, ucwords($aktifitas), $status, ucwords($info)); ?>

                            <script>
                                setTimeout(function() { 
                                    swal({
                                        title: "Information",
                                        text: "Data has been updated",
                                        type: "success",
                                        confirmButtonText: "OK"
                                        },
                                        function(isConfirm){
                                            if (isConfirm) {
                                                window.location.href = "daily-activity";
                                            }
                                }); }, 500);
                            </script>
                    
          <?php }
            }
            else { 
                if(isset($_SESSION['status'])){ ?>
                    <script>    
                        window.location.href = "daily-activity";
                    </script>
            <?php }
                else { ?>
                    <script>    
                        window.location.href = "logout";
                    </script>
          <?php }
            }
        }

        //Simpan Follow Up Activity 
        elseif($_GET['action'] == "save-follow-up-activity"){
            if(isset($_POST['save'])){
                if(!preg_match("/^[a-zA-Z0-9 .,()&-]*$/", $_POST['activity'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Activity must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[0-9-\/]*$/", $_POST['date'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Date must only contain numbers in date format !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Za-z]*$/", $_POST['status'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Status must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Za-z ]*$/", $_POST['type'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Type of activity must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[a-zA-Z0-9 .,()&-]*$/", $_POST['info'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Additional Information must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-activity";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                
                else {
                    $id = $_GET['id'];
                    $idPekerja = $dataUser['_id_pekerja'];
                    $tanggal = $_POST['date'];
                    $tipe = $_POST['type'];
                    $aktifitas = trim($_POST['activity']);
                    $status = $_POST['status'];
                    $info = trim($_POST['info']);

                    $saveData->simpanFollowUp($id, $idPekerja, $tanggal, $status);
                    $saveData->simpanAktifitas($idPekerja, $tanggal, $tipe, ucwords($aktifitas), $status, ucwords($info)); ?>

                            <script>
                                setTimeout(function() { 
                                    swal({
                                        title: "Information",
                                        text: "Data has been saved",
                                        type: "success",
                                        confirmButtonText: "OK"
                                        },
                                        function(isConfirm){
                                            if (isConfirm) {
                                                window.location.href = "daily-activity";
                                            }
                                }); }, 500);
                            </script>
                    
          <?php }
            }
            else { 
                if(isset($_SESSION['status'])){ ?>
                    <script>    
                        window.location.href = "daily-activity";
                    </script>
            <?php }
                else { ?>
                    <script>    
                        window.location.href = "logout";
                    </script>
          <?php }
            }
        }

        //Save Assignment
        elseif($_GET['action'] == "save-assignment"){
            $id = $_GET['id'];
            if(isset($_POST['save'])){
                if(!preg_match("/^[a-zA-Z0-9 .,()]*$/", $_POST['assignment'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Assignment must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-assignment";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[0-9-\/]*$/", $_POST['date'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Date must only contain numbers in date format !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-assignment";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Z0-9]*$/", $_POST['assignmentno'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Assignment No. must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-assignment";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Z0-9-]*$/", $_POST['engineer'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Engineer must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-assignment";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                
                else {
                    $noass = $_POST['assignmentno'];
                    $tanggal = date('Y-m-d');
                    $waktu = date('H:i:s');
                    $tglAssignment = $_POST['date'];
                    $tugas = trim($_POST['assignment']);
                    $engineer = $_POST['engineer'];
                    
                    $saveData->saveAssignment($noass, $id, $tanggal, $waktu, $tglAssignment, ucwords($tugas), $engineer); 
                    ?>

                            <script>
                                setTimeout(function() { 
                                    swal({
                                        title: "Information",
                                        text: "Data has been saved",
                                        type: "success",
                                        confirmButtonText: "OK"
                                        },
                                        function(isConfirm){
                                            if (isConfirm) {
                                                window.location.href = "assignment";
                                            }
                                }); }, 500);
                            </script>
                    
          <?php }
            }
            else { 
                if(isset($_SESSION['status'])){ ?>
                    <script>    
                        window.location.href = "assignment";
                    </script>
            <?php }
                else { ?>
                    <script>    
                        window.location.href = "logout";
                    </script>
          <?php }
            }
        }

        //Update Assignment
        elseif($_GET['action'] == "update-assignment"){
            $id = $_GET['id'];
            if(isset($_POST['save'])){
                if(!preg_match("/^[a-zA-Z0-9 .,()]*$/", $_POST['assignment'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Assignment must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "detail-assignment-<?= $id; ?>";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[0-9-\/]*$/", $_POST['date'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Date must only contain numbers in date format !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "detail-assignment-<?= $id; ?>";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Z0-9-]*$/", $_POST['engineer'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Engineer must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "detail-assignment-<?= $id; ?>";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                
                else {
                    $tanggal = date('Y-m-d');
                    $waktu = date('H:i:s');
                    $tglAssignment = $_POST['date'];
                    $tugas = trim($_POST['assignment']);
                    $engineer = $_POST['engineer'];
                    
                    $saveData->updateAssignment($id, $tanggal, $waktu, $tglAssignment, ucwords($tugas), $engineer); 
                    ?>

                            <script>
                                setTimeout(function() { 
                                    swal({
                                        title: "Information",
                                        text: "Data has been updated",
                                        type: "success",
                                        confirmButtonText: "OK"
                                        },
                                        function(isConfirm){
                                            if (isConfirm) {
                                                window.location.href = "assignment";
                                            }
                                }); }, 500);
                            </script>
                    
          <?php }
            }
            else { 
                if(isset($_SESSION['status'])){ ?>
                    <script>    
                        window.location.href = "assignment";
                    </script>
            <?php }
                else { ?>
                    <script>    
                        window.location.href = "logout";
                    </script>
          <?php }
            }
        }

        //Update My Assignment
        elseif($_GET['action'] == "update-my-assignment"){
            $id = $_GET['id'];
            if(isset($_POST['save'])){
                if(!preg_match("/^[a-zA-Z0-9 .,()]*$/", $_POST['assignment'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Assignment must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "detail-my-assignment-<?= $id; ?>";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[a-zA-Z0-9 .,()]*$/", $_POST['information'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Information must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "detail-my-assignment-<?= $id; ?>";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Za-z]*$/", $_POST['status'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Status must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "detail-my-assignment-<?= $id; ?>";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                
                else {
                    $tanggal = date('Y-m-d');
                    $tugas = trim($_POST['assignment']);
                    $status = $_POST['status'];
                    $info = trim($_POST['information']);
                    $dataAssignment = $getData->getMyAssignmentbyID($id);

                    $saveData->updateMyAssignment($id, $status, ucwords($info)); 
                    $saveData->simpanAktifitas($dataAssignment['_id_user'], $tanggal, 'Engineer Activity', ucwords($tugas), $status, ucwords($info))
                    ?>

                            <script>
                                setTimeout(function() { 
                                    swal({
                                        title: "Information",
                                        text: "Data has been updated",
                                        type: "success",
                                        confirmButtonText: "OK"
                                        },
                                        function(isConfirm){
                                            if (isConfirm) {
                                                window.location.href = "my-assignment";
                                            }
                                }); }, 500);
                            </script>
                    
          <?php }
            }
            else { 
                if(isset($_SESSION['status'])){ ?>
                    <script>    
                        window.location.href = "my-assignment";
                    </script>
            <?php }
                else { ?>
                    <script>    
                        window.location.href = "logout";
                    </script>
          <?php }
            }
        }

        //Simpan To Do List
        elseif($_GET['action'] == "save-to-do-list"){
            if(isset($_POST['save'])){
                if(!preg_match("/^[a-zA-Z0-9 .,()]*$/", $_POST['activity'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Activity must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-to-do-list";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[0-9-\/]*$/", $_POST['date'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Date must only contain numbers in date format !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-to-do-list";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Za-z]*$/", $_POST['status'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Status must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-to-do-list";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                
                else {
                    $id = $_GET['id'];
                    $tanggal = $_POST['date'];
                    $aktifitas = trim($_POST['activity']);
                    $status = "Waiting";

                    $saveData->simpanToDoList($id, $tanggal, ucwords($aktifitas), $status); ?>

                            <script>
                                setTimeout(function() { 
                                    swal({
                                        title: "Information",
                                        text: "Data has been saved",
                                        type: "success",
                                        confirmButtonText: "OK"
                                        },
                                        function(isConfirm){
                                            if (isConfirm) {
                                                window.location.href = "to-do-list";
                                            }
                                }); }, 500);
                            </script>
                    
          <?php }
            }
            else { 
                if(isset($_SESSION['status'])){ ?>
                    <script>    
                        window.location.href = "to-do-list";
                    </script>
            <?php }
                else { ?>
                    <script>    
                        window.location.href = "logout";
                    </script>
          <?php }
            }
        }

        //Update To Do List
        elseif($_GET['action'] == "update-to-do-list"){
            if(isset($_POST['save'])){
                if(!preg_match("/^[a-zA-Z0-9 .,()]*$/", $_POST['activity'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Activity must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-to-do-list";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[0-9-\/]*$/", $_POST['date'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Date must only contain numbers in date format !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-to-do-list";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                elseif(!preg_match("/^[A-Za-z]*$/", $_POST['status'])){ ?>
                    <script>
                        setTimeout(function() { 
                            swal({
                                title: "Error !",
                                text: "Status must not contain special characters !",
                                type: "error",
                                confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "new-to-do-list";
                                        }
                            }); }, 500);
                    </script>
          <?php }
                
                else {
                    $id = $_GET['id'];
                    $tanggal = $_POST['date'];
                    $aktifitas = trim($_POST['activity']);
                    $status = $_POST['status'];

                    $saveData->updateToDoList($id, $tanggal, ucwords($aktifitas), $status); ?>

                            <script>
                                setTimeout(function() { 
                                    swal({
                                        title: "Information",
                                        text: "Data has been saved",
                                        type: "success",
                                        confirmButtonText: "OK"
                                        },
                                        function(isConfirm){
                                            if (isConfirm) {
                                                window.location.href = "to-do-list";
                                            }
                                }); }, 500);
                            </script>
                    
          <?php }
            }
            else { 
                if(isset($_SESSION['status'])){ ?>
                    <script>    
                        window.location.href = "to-do-list";
                    </script>
            <?php }
                else { ?>
                    <script>    
                        window.location.href = "logout";
                    </script>
          <?php }
            }
        }

        //Update Password
        elseif($_GET['action'] == "save-new-password"){
            if(isset($_POST['save'])){
                $id = $_GET['id'];
                $password = md5($_POST['password']);

                $saveData->updatePassword($id, $password); ?>

                        <script>
                            setTimeout(function() { 
                                swal({
                                    title: "Information",
                                    text: "Data has been updated",
                                    type: "success",
                                    confirmButtonText: "OK"
                                },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = "logout";
                                    }
                                }); }, 500);
                        </script>

      <?php }
            else {
                if(isset($_SESSION['status'])){ ?>
                    <script>    
                        window.location.href = "dashboard";
                    </script>
            <?php }
                else { ?>
                    <script>    
                        window.location.href = "logout";
                    </script>
          <?php }
            }
        }

    ?>
    <!-- Script Javascript -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

</body>
</html>

