<?php
    error_reporting(0);
    session_start();
    require_once '../config/_getData.php';
    require_once '../config/_saveData.php';
    require_once '../config/_cons.php';
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


        //Simpan Activity 
        if($_GET['action'] == "save-activity"){
            if(isset($_POST['save'])){

                try{

                    $id = trim(strip_tags($_GET['id']));
                    $tanggal = trim(strip_tags($_POST['date']));
                    $tipe = trim(strip_tags($_POST['type']));
                    $aktifitas = trim(strip_tags($_POST['activity']));
                    $status = trim(strip_tags($_POST['status']));
                    $info = trim(strip_tags($_POST['info']));
    
                    $saveData->simpanAktifitas($id, $tanggal, $tipe, ucwords($aktifitas), $status, ucwords($info));
                    header('location:'.BASEURL.'/daily-activity/saved');
                }
                catch (Exception $e){
                    echo $e->getMessage();
                }

            }
            
        }

        //Update Acitivity
        elseif($_GET['action'] == "update-activity"){
            
            if(isset($_POST['save'])){
                try{
                    $id = trim(strip_tags($_GET['id']));
                    $tanggal = trim(strip_tags($_POST['date']));
                    $tipe = trim(strip_tags($_POST['type']));
                    $aktifitas = trim(strip_tags($_POST['activity']));
                    $status = trim(strip_tags($_POST['status']));
                    $info = trim(strip_tags($_POST['info']));
    
                    $saveData->updateAktifitas($id, $tanggal, $tipe, ucwords($aktifitas), $status, ucwords($info));
                    header('location:'.BASEURL.'/daily-activity/saved');
                }
                catch (Exception $e){
                    echo $e->getMessage();
                }
            }
            
        }

        //Simpan Follow Up Activity 
        elseif($_GET['action'] == "save-follow-up-activity"){

            if(isset($_POST['save'])){
                try {
                    $id = trim(strip_tags($_GET['id']));
                    $idPekerja = $dataUser['_id_pekerja'];
                    $tanggal = trim(strip_tags($_POST['date']));
                    $tipe = trim(strip_tags($_POST['type']));
                    $aktifitas = trim(strip_tags($_POST['activity']));
                    $status = trim(strip_tags($_POST['status']));
                    $info = trim(strip_tags($_POST['info']));

                    $saveData->simpanFollowUp($id, $idPekerja, $tanggal, $status);
                    $saveData->simpanAktifitas($idPekerja, $tanggal, $tipe, ucwords($aktifitas), $status, ucwords($info));
                    header('location:'.BASEURL.'/daily-activity/saved');
                }
                catch (Exception $e){
                    echo $e->getMessage();
                }
            }
            
        }

        //Save Assignment
        elseif($_GET['action'] == "save-assignment"){

            if(isset($_POST['save'])){
                try{
                    $id = trim(strip_tags($_GET['id']));
                    $noass = trim(strip_tags($_POST['assignmentno']));
                    $tanggal = date('Y-m-d');
                    $waktu = date('H:i:s');
                    $tglAssignment = trim(strip_tags($_POST['date']));
                    $tugas = trim(strip_tags(($_POST['assignment'])));
                    $engineer = trim(strip_tags($_POST['engineer']));
                    
                    $saveData->saveAssignment($noass, $id, $tanggal, $waktu, $tglAssignment, ucwords($tugas), $engineer); 
                    header('location:'.BASEURL.'/assignment/saved');
                }
                catch (Exception $e){
                    echo $e->getMessage();
                }
            }
            
        }

        //Update Assignment
        elseif($_GET['action'] == "update-assignment"){
            
            if(isset($_POST['save'])){
               try {
                    $id = trim(strip_tags($_GET['id']));
                    $tanggal = date('Y-m-d');
                    $waktu = date('H:i:s');
                    $tglAssignment = trim(strip_tags($_POST['date']));
                    $tugas = trim(strip_tags($_POST['assignment']));
                    $engineer = trim(strip_tags($_POST['engineer']));
                    
                    $saveData->updateAssignment($id, $tanggal, $waktu, $tglAssignment, ucwords($tugas), $engineer); 
                    header('location:'.BASEURL.'/assignment/saved');
                }
                catch (Exception $e){
                    echo $e->getMessage();
                }
                
            }
        }

        //Update My Assignment
        elseif($_GET['action'] == "update-my-assignment"){
            
            if(isset($_POST['save'])){
                try {
                    $id = trim(strip_tags($_GET['id']));
                    $tanggal = date('Y-m-d');
                    $tugas = trim(strip_tags($_POST['assignment']));
                    $status = trim(strip_tags($_POST['status']));
                    $info = trim(strip_tags($_POST['information']));
                    $dataAssignment = $getData->getMyAssignmentbyID($id);

                    $saveData->updateMyAssignment($id, $status, ucwords($info)); 
                    $saveData->simpanAktifitas($dataAssignment['_id_user'], $tanggal, 'Engineer Activity', ucwords($tugas), $status, ucwords($info));
                    header('location:'.BASEURL.'/my-assignment/saved');
                }
                catch (Exception $e){
                    echo $e->getMessage();
                }
            }
            
        }

        //Simpan To Do List
        elseif($_GET['action'] == "save-to-do-list"){
            
            if(isset($_POST['save'])){
                try {
                    $id = trim(strip_tags($_GET['id']));
                    $tanggal = trim(strip_tags($_POST['date']));
                    $aktifitas = trim(strip_tags($_POST['activity']));
                    $status = "Waiting";

                    $saveData->simpanToDoList($id, $tanggal, ucwords($aktifitas), $status);
                    header('location:'.BASEURL.'/to-do-list/saved');
                }
                catch (Exception $e){
                    echo $e->getMessage();
                }
            }
            
        }

        //Update To Do List
        elseif($_GET['action'] == "update-to-do-list"){

            if(isset($_POST['save'])){
                try{
                    $id = trim(strip_tags($_GET['id']));
                    $tanggal = trim(strip_tags($_POST['date']));
                    $aktifitas = trim(strip_tags($_POST['activity']));
                    $status = trim(strip_tags($_POST['status']));
    
                    $saveData->updateToDoList($id, $tanggal, ucwords($aktifitas), $status);
                    header('location:'.BASEURL.'/to-do-list/saved');
                }
                catch (Exception $e){
                    echo $e->getMessage();
                }
            }
           
        }

        //Update Password
        elseif($_GET['action'] == "save-new-password"){

            if(isset($_POST['save'])){
                try {
                    $id = $_GET['id'];
                    $password = md5($_POST['password']);

                    $saveData->updatePassword($id, $password);
                    header('location:'.BASEURL.'/logout');
                }
                catch (Exception $e){
                    echo $e->getMessage();
                }

            }
            
        }

    ?>
    <!-- Script Javascript -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

</body>
</html>

