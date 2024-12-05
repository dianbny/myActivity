<?php
    //error_reporting(0);
    session_start();

    if(!isset($_SESSION['status'])){ 
        header('location:logout');
    }
    else {
        require_once '../config/_getData.php';
        require_once '../config/_cons.php';
        $getData = new _getData();
        
        //Get Session User 
        $username = $_SESSION['username'];

        if($getData->cekUsername($username) < 1){ ?>
            <script>    
                window.location.href = "logout";
            </script>
  <?php }

        //Get Data User Login
        $dataUserLogin = $getData->getDataUserLogin($username);
        $dataUser = $getData->getDataPekerja($dataUserLogin['_id_user']);
        $fungsi = $getData->getNamaFungsi($dataUser['_fungsi']);
        //$jumTglBln = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

        //Waktu 
        date_default_timezone_set("Asia/Kuala_Lumpur");
        setlocale(LC_ALL, 'id-ID', 'id_ID');

    }
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= BASEURL; ?>/assets/images/icon.png" type="image/gif">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/assets/css/_style_page.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/assets/vendors/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="<?= BASEURL; ?>/assets/js/chart.js"></script>
    <title><?= $dataUser['_nama_pekerja']; ?></title>
</head>
<body>
    <!-- Loading Animation -->
    <div id="load"></div>

    <!-- Sidebar -->
    <div id="mySidenav" class="sidenav">
        <img src="<?= BASEURL; ?>/assets/images/myactivity.png">
        <a href="<?= BASEURL; ?>/dashboard" class="<?= (isset($_GET['page']) && $_GET['page'] == "dashboard") ? "active" : "" ;?>"><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; Dashboard</a>

        <a href="<?= BASEURL; ?>/<?= ($dataUserLogin['_level'] == "user") ? "daily-activity" : "daily-activity-fungsi";?>" class="<?= (isset($_GET['page']) && $_GET['page'] == "daily-activity" || $_GET['page'] == "daily-activity-fungsi" || $_GET['page'] == "new-activity" || $_GET['page'] == "detail-activity") ? "active" : "" ;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Daily Activity</a>

        <a href="<?= BASEURL; ?>/<?= ($dataUserLogin['_level'] == "user") ? "my-assignment" : "assignment";?>" class="<?= (isset($_GET['page']) && $_GET['page'] == "my-assignment" || $_GET['page'] == "assignment" || $_GET['page'] == "new-assignment" || $_GET['page'] == "detail-assignment" || $_GET['page'] == "detail-my-assignment") ? "active" : "" ;?>"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; <?= ($dataUserLogin['_level'] == "user") ? "My Assignment" : "Assignment";?></a>
        
        <a href="<?= BASEURL; ?>/to-do-list" class="<?= (isset($_GET['page']) && $_GET['page'] == "to-do-list" || $_GET['page'] == "new-to-do-list" || $_GET['page'] == "detail-to-do-list") ? "active" : "" ;?>"><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp; To-Do List</a>
        
        <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; Overtime</a>

        <a href="#"><i class="fa fa-user-times" aria-hidden="true"></i>&nbsp; Leave</a>
        
        <a href="<?= BASEURL; ?>/change-password" class="<?= (isset($_GET['page']) && $_GET['page'] == "change-password") ? "active" : "" ;?>"><i class="fa fa-key" aria-hidden="true"></i>&nbsp; Password</a>
        
        <a href="<?= BASEURL; ?>/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout</a>
        
    </div>
    <!-- Akhir Sidebar -->

        <!-- Topbar -->
            <div class="topbar">
                <div class="divuser">
                    <img src="<?= BASEURL; ?>/assets/images/user.png" alt="User">
                    Hi, &nbsp;<strong><?= $dataUser['_nama_pekerja']; ?></strong> | Date : <?= date('d-m-Y'); ?>
                </div>

            </div>
        <!-- Akhir Topbar -->
    <!-- Container -->
    <div class="container animate__animated animate__fadeIn">
        <?php
            $page = addslashes($_GET['page']);

            switch($page){
                case "daily-activity":

                    include "_daily_activity.php";
    
                    break;

                case "daily-activity-fungsi":

                    include "_daily_activity_fungsi.php";
        
                    break;

                case "new-activity":

                    include "_new_activity.php";
        
                    break;

                case "detail-activity":

                    include "_detail_activity.php";
            
                    break;

                case "follow-up-activity":

                    include "_follow_up_activity.php";
                
                    break;

                case "detail-activity-fungsi":

                    include "_detail_activity_fungsi.php";
                
                    break;

                case "daily-activity-status":

                    include "_daily_activity_by_status.php";
                
                    break;
                
                case "daily-activity-fungsi-status":

                    include "_daily_activity_fungsi_by_status.php";
                    
                    break;

                case "my-assignment":

                    include "_my_assignment.php";
                
                    break;

                case "assignment":

                    include "_list_assignment.php";
                    
                    break;

                case "new-assignment":

                    include "_new_assignment.php";
                        
                    break;

                case "detail-my-assignment":

                    include "_detail_my_assignment.php";
                    
                    break;

                case "my-assignment-status":

                    include "_my_assignment_by_status.php";
                    
                    break;

                case "detail-assignment":

                    include "_edit_assignment.php";
                            
                    break;

                case "detail-assignment-status":

                    include "_detail_assignment_by_status.php";
                        
                    break;

                case "to-do-list":

                    include "_to_do_list.php";
                        
                    break;

                case "new-to-do-list":

                    include "_new_to_do_list.php";
                            
                    break;

                case "detail-to-do-list":

                    include "_detail_to_do_list.php";
                                
                    break;

                case "to-do-list-status":

                    include "_to_do_list_by_status.php";
                                    
                    break;

                case "change-password":

                    include "_change_password.php";
                                        
                    break;

                case "my-overtime":

                    include "_my_overtime.php";
                                            
                    break;


                case "dashboard" : ?>

        <h5><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;Dashboard</h5>

        <!-- Dashboar Total -->
        <div class="panel">
            <div class="dashboard">
                <div class="icon">
                    <img src="assets/images/daily-activity-black.png" alt="DailyActivity">
                </div>
                <div class="title">
                    <h5>Daily Activity</h5>
                        <?php
                            if($dataUserLogin['_level'] == "user"){ ?>
                                <div class="status-dashboard" style="background-color:#008000;">
                                    <a href="<?= BASEURL; ?>/daily-activity-status/<?= "Done"; ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Done <div class="icon-total"><?= $getData->cekDAUserbyStatus($dataUser['_id_pekerja'], date('Y'), "Done"); ?></div></a>
                                </div>
                                <div class="status-dashboard" style="background-color:#FF8C00;">
                                    <a href="<?= BASEURL; ?>/daily-activity-status/<?= "Pending"; ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp; Pending <div class="icon-total"><?= $getData->cekDAUserbyStatus($dataUser['_id_pekerja'], date('Y'), "Pending"); ?></div></a>
                                </div>
                      <?php }
                            else { ?>
                                <div class="status-dashboard" style="background-color:#008000;">
                                    <a href="<?= BASEURL; ?>/daily-activity-fungsi-status/<?= "Done"; ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Done <div class="icon-total"><?= $getData->cekDAFungsibyStatus($dataUser['_fungsi'], date('Y'), "Done"); ?></div></a>
                                </div>
                                <div class="status-dashboard" style="background-color:#FF8C00;">
                                    <a href="<?= BASEURL; ?>/daily-activity-fungsi-status/<?= "Pending"; ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp; Pending <div class="icon-total"><?= $getData->cekDAFungsibyStatus($dataUser['_fungsi'], date('Y'), "Pending"); ?></div></a>
                                </div>
                      <?php }
                        ?>
                </div>
            </div>
            <div class="dashboard">
                <div class="icon">
                    <img src="assets/images/assignment-black.png" alt="Assignment">
                </div>
                <div class="title">
                    <h5><?= ($dataUserLogin['_level'] == "user") ? "My Assignment" : "Assignment" ?></h5>
                        <?php
                            if($dataUserLogin['_level'] == "user"){ ?>
                                <div class="status-dashboard" style="background-color:#1E90FF;">
                                    <a href="<?= BASEURL; ?>/my-assignment-status/<?= "Request"; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Request <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_user", $dataUser['_id_pekerja'], date('Y'), "Request"); ?></div></a>
                                </div>
                                <div class="status-dashboard" style="background-color:#008000;">
                                    <a href="<?= BASEURL; ?>/my-assignment-status/<?= "Done"; ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Done <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_user", $dataUser['_id_pekerja'], date('Y'), "Done"); ?></div></a>
                                </div>
                                <div class="status-dashboard" style="background-color:#FF8C00;">
                                    <a href="<?= BASEURL; ?>/my-assignment-status/<?= "Pending"; ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp; Pending <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_user", $dataUser['_id_pekerja'], date('Y'), "Pending"); ?></div></a>
                                </div>
                      <?php }
                            else { ?>
                                <div class="status-dashboard" style="background-color:#1E90FF;">
                                    <a href="<?= BASEURL; ?>/detail-assignment-status/<?= "Request"; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Request <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Request"); ?></div></a>
                                </div>
                                <div class="status-dashboard" style="background-color:#008000;">
                                    <a href="<?= BASEURL; ?>/detail-assignment-status/<?= "Done"; ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Done <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Done"); ?></div></a>
                                </div>
                                <div class="status-dashboard" style="background-color:#FF8C00;">
                                    <a href="<?= BASEURL; ?>/detail-assignment-status/<?= "Pending"; ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp; Pending <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Pending"); ?></div></a>
                                </div>
                      <?php }
                        ?>
                </div>
            </div>
            <div class="dashboard">
                <div class="icon">
                    <img src="assets/images/todolist-black.png" alt="ToDoList">
                </div>
                <div class="title">
                    <h5>To-Do List</h5>
                    <div class="status-dashboard" style="background-color:#008000;">
                        <a href="<?= BASEURL; ?>/to-do-list-status/<?= "Done"; ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Done <div class="icon-total"><?= $getData->cekTDLUserbyStatus($dataUser['_id_pekerja'], date('Y'), "Done"); ?></div></a>
                    </div>
                    <div class="status-dashboard" style="background-color:#FF8C00;">
                        <a href="<?= BASEURL; ?>/to-do-list-status/<?= "Waiting"; ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp; Waiting <div class="icon-total"><?= $getData->cekTDLUserbyStatus($dataUser['_id_pekerja'], date('Y'), "Waiting"); ?></div></a>
                    </div>
                </div>
            </div>
            <div class="dashboard">
                <div class="icon">
                    <img src="assets/images/overtime-black.png" alt="Overtime">
                </div>
                <div class="title">
                    <h5>Overtime</h5>
                        <?php
                            if($dataUserLogin['_level'] == "user"){ ?>
                                <div class="status-dashboard" style="background-color:#1E90FF;">
                                    <a href=""><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Request <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Request"); ?></div></a>
                                </div>
                                <div class="status-dashboard" style="background-color:#008000;">
                                    <a href=""><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Accept <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Accept"); ?></div></a>
                                </div>
                                <div class="status-dashboard" style="background-color:maroon;">
                                    <a href=""><i class="fa fa-times" aria-hidden="true"></i>&nbsp; Reject <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Reject"); ?></div></a>
                                </div>
                      <?php }
                            else { ?>
                                <div class="status-dashboard" style="background-color:#1E90FF;">
                                    <a href=""><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Request <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pengawas", $dataUser['_id_pekerja'], date('Y'), "Request"); ?></div></a>
                                </div>
                                <div class="status-dashboard" style="background-color:#008000;">
                                    <a href=""><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Accept <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pengawas", $dataUser['_id_pekerja'], date('Y'), "Accept"); ?></div></a>
                                </div>
                                <div class="status-dashboard" style="background-color:maroon;">
                                    <a href=""><i class="fa fa-times" aria-hidden="true"></i>&nbsp; Reject <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pengawas", $dataUser['_id_pekerja'], date('Y'), "Reject"); ?></div></a>
                                </div>
                      <?php }
                        ?>
                </div>
            </div>
            
        </div>

        <!-- Panel Bottom -->
         <div class="panel-bottom">
            <div class="dashboard-left">
                <div>
                    <span class="color6">To-Do List</span> 
                    <div class="table-dashboard">
                    <?php
                        if($getData->cekToDoList($dataUser['_id_pekerja'], date('m'), date('Y')) > 0){
                            foreach($getData->ListToDoListLimit($dataUser['_id_pekerja'], date('d'), date('m'), date('Y')) as $row){ ?>
                                <div class="kanban" style="border-left:6px solid <?= ($row['_tanggal'] == date('Y-m-d')) ? "#8B0000" : "#FF8C00"; ?>">
                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; <?= strftime('%d %B %Y', strtotime($row['_tanggal'])); ?>
                                    <br><br>
                                    <?= $row['_plan']; ?>
                                    <br><br>
                                    Status : &nbsp;<i class="fa fa-circle" aria-hidden="true" style="color:<?= ($row['_status'] == "Done") ? "#008000" : "#FF8C00";?>"></i>&nbsp; <strong><?= $row['_status']; ?></strong>
                                </div>
                      <?php }
                        }
                        else{ ?>
                            <span style="color:red;">Data not found !</span><br>
                  <?php }
                    ?>
                </div>
                </div>
                <?php
                    if($dataUserLogin['_level'] == "user"){ ?>
                        <div>
                            <span class="color6">My Progress</span>
                        </div>
              <?php }

                
                    else { ?>
                        <div>
                            <span class="color6">Progress</span>
                        </div>
              <?php } 
                ?>
                
            </div>

            <div class="dashboard-right">
                    <div>
                        <span class="color6">Daily Activity</span> 
                        <div class="table-dashboard">
                            <?php
                                if($dataUserLogin['_level'] == "user"){
                                    if($getData->cekDailyActivityUser($dataUser['_id_pekerja'], date('m'), date('Y')) > 0){
                                        foreach($getData->ListDailyActivityUser($dataUser['_id_pekerja'], date('m'), date('Y')) as $row){ ?>
                                            <div class="kanban" style="border-left:6px solid <?= ($row['_status'] == "Done") ? "#008000" : "#FF8C00"; ?>">
                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; <?= strftime('%d %B %Y', strtotime($row['_tanggal'])); ?>
                                                <br><br>
                                                <?= $row['_aktifitas']; ?>
                                                <br><br>
                                                Type of Activity : <?= $row['_tipe_aktifitas']; ?> | &nbsp;<i class="fa fa-circle" aria-hidden="true" style="color:<?= ($row['_status'] == "Done") ? "#008000" : "#FF8C00";?>"></i>&nbsp; <strong><?= $row['_status']; ?></strong>
                                            </div>
                                <?php }
                                    }
                                    else{ ?>
                                        <span style="color:red;">Data not found !</span><br>
                            <?php }
                                }
                                else{
                                    if($getData->cekDailyActivityFungsi($dataUser['_fungsi'], date('m'), date('Y')) > 0){
                                        foreach($getData->ListDailyActivityFungsi($dataUser['_fungsi'], date('m'), date('Y')) as $row){ ?>
                                            <div class="kanban" style="border-left:6px solid <?= ($row['_status'] == "Done") ? "#008000" : "#FF8C00"; ?>">
                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; <?= strftime('%d %B %Y', strtotime($row['_tanggal'])); ?> | <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp; <?= $row['_nama_pekerja']; ?>
                                                <br><br>
                                                <?= $row['_aktifitas']; ?>
                                                <br><br>
                                                Type of Activity : <?= $row['_tipe_aktifitas']; ?> | &nbsp;<i class="fa fa-circle" aria-hidden="true" style="color:<?= ($row['_status'] == "Done") ? "#008000" : "#FF8C00";?>"></i>&nbsp; <strong><?= $row['_status']; ?></strong>
                                            </div>
                                <?php }
                                    }
                                    else{ ?>
                                        <span style="color:red;">Data not found !</span><br>
                            <?php }
                                }
                            ?>    
                        </div>
                    </div>

                    <div>
                        <span class="color6"><?= ($dataUserLogin['_level'] == "user") ? "My Assignment" : "Assignment"; ?></span> 
                        <div class="table-dashboard">
                        <?php
                            if($getData->cekMyAssignment(($dataUserLogin['_level'] == "user") ? "_id_user" : "_id_pekerja", $dataUser['_id_pekerja'], date('m'), date('Y')) > 0){
                                foreach($getData->ListMyAssignment(($dataUserLogin['_level'] == "user") ? "_id_user" : "_id_pekerja", $dataUser['_id_pekerja'], date('m'), date('Y')) as $row){ 
                                    $namaUser = $getData->getDataPekerja(($dataUserLogin['_level'] == "user") ? $row['_id_pekerja'] : $row['_id_user']); 
                                    $color;
                                    if($row['_status'] == "Request"){
                                        $color = "#1E90FF";
                                    }
                                    elseif($row['_status'] == "Done"){
                                        $color = "#008000";
                                    }
                                    else{
                                        $color = "#FF8C00";
                                    }    
                                    ?>
                                    <div class="kanban" style="border-left:6px solid <?= $color; ?>">
                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; <?= strftime('%d %B %Y', strtotime($row['_tanggal_tugas'])); ?> | <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp; <?= $namaUser['_nama_pekerja']; ?>
                                        <br><br>
                                        <?= $row['_tugas']; ?>
                                        <br><br>
                                        &nbsp;<i class="fa fa-circle" aria-hidden="true" style="color:<?= $color;?>"></i>&nbsp; <strong><?= $row['_status']; ?></strong>
                                    </div>
                        <?php }
                            }
                            else{ ?>
                                <span style="color:red;">Data not found !</span><br>
                    <?php }
                        ?>
                    </div>
                    </div>  
            </div>
         </div>

        

        <?php

            break;

            } ?>
    </div>
    <!-- Akhir Container -->

    <!-- Script JS -->
    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "210px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <script>
        var load = document.getElementById('load');

        window.addEventListener('load', function(){
            load.style.display = "none";
        });
    </script>
    <script src="<?= BASEURL; ?>/assets/js/script.js"></script>
    
</body>
</html>