<?php
    error_reporting(0);
    session_start();
    require_once '../config/_getData.php';
    require_once '../config/_deleteData.php';
    $getData = new _getData();
    $deleteData = new _deleteData();

    if(!isset($_SESSION['status'])){ 
        header('location:logout');
    } 

    //Waktu 
    date_default_timezone_set("Asia/Kuala_Lumpur");
    setlocale(LC_ALL, 'id-ID', 'id_ID');


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
        if($_GET['action'] == "delete-activity"){
            $id = $_GET['id'];
            
            $deleteData->hapusAktifitas($id); ?>

                <script>
                    setTimeout(function() { 
                        swal({
                                title: "Information",
                                text: "Data deleted successfully",
                                type: "success",
                                confirmButtonText: "OK"
                            },
                            function(isConfirm){
                                if (isConfirm) {
                                    window.location.href="daily-activity";
                                }
                    }); }, 500);
                </script>
  <?php }

        elseif($_GET['action'] == "delete-to-do-list"){
            $id = $_GET['id'];
            
            $deleteData->hapusToDoList($id); ?>

                <script>
                    setTimeout(function() { 
                        swal({
                                title: "Information",
                                text: "Data deleted successfully",
                                type: "success",
                                confirmButtonText: "OK"
                            },
                            function(isConfirm){
                                if (isConfirm) {
                                    window.location.href="to-do-list";
                                }
                    }); }, 500);
                </script>
  <?php }
                    
    ?>

    <!-- Script Javascript -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

</body>
</html>