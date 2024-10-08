<?php
    //error_reporting(0);
    session_start();

    if(!isset($_SESSION['status'])){ 
        header('location:logout');
    }
    else {
        require_once '../config/_getData.php';
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
    <link rel="icon" href="assets/images/icon.png" type="image/gif">
    <link rel="stylesheet" type="text/css" href="assets/css/_style_page.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="assets/js/chart.js"></script>
    <title><?= $dataUser['_nama_pekerja']; ?></title>
</head>
<body>
    <!-- Loading Animation -->
    <div id="load"></div>

    <!-- Topbar -->
    <div class="topbar">
        <span style="font-size:26px;cursor:pointer;color:black;" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>&nbsp;&nbsp;
        <img src="assets/images/myactivity.png">
        <div class="divuser">
            Hi, &nbsp;<strong><?= $dataUser['_nama_pekerja']; ?></strong> | Date : <?= date('d-m-Y'); ?>
            <img src="assets/images/user.png" alt="User">
        </div>

    </div>
    <!-- Akhir Topbar -->

    <!-- Sidebar -->
    <div id="mySidenav" class="sidenav">
        <img src="assets/images/myactivity.png">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
        <a href="dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp; Dashboard</a>
        <a href="<?= ($dataUserLogin['_level'] == "user") ? "daily-activity" : "daily-activity-fungsi";?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Daily Activity</a>
        <a href="<?= ($dataUserLogin['_level'] == "user") ? "my-assignment" : "assignment";?>"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; <?= ($dataUserLogin['_level'] == "user") ? "My Assignment" : "Assignment";?></a>
        <a href="to-do-list"><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp; To-Do List</a>
        <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; Overtime</a>
        <a href="change-password"><i class="fa fa-key" aria-hidden="true"></i>&nbsp; Password</a>
        <a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout</a>
        
    </div>
    <!-- Akhir Sidebar -->

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

        <label class="labelTitle"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;Dashboard</label>

        <!-- Dashboar Total -->
        <div class="panel">
            <div class="dashboard">
                <div class="icon">
                    <img src="assets/images/daily-activity-black.png" alt="DailyActivity">
                </div>
                <div class="title">
                    <strong>Daily Activity</strong>
                        <?php
                            if($dataUserLogin['_level'] == "user"){ ?>
                                <span class="span-ket" style="background-color:#008000;"><a href="daily-activity-status-<?= "Done"; ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Done <div class="icon-total"><?= $getData->cekDAUserbyStatus($dataUser['_id_pekerja'], date('Y'), "Done"); ?></div></a></span>
                                <span class="span-ket" style="background-color:#FF8C00;"><a href="daily-activity-status-<?= "Pending"; ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp; Pending <div class="icon-total"><?= $getData->cekDAUserbyStatus($dataUser['_id_pekerja'], date('Y'), "Pending"); ?></div></a></span>
                      <?php }
                            else { ?>
                                <span class="span-ket" style="background-color:#008000;"><a href="daily-activity-fungsi-status-<?= "Done"; ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Done <div class="icon-total"><?= $getData->cekDAFungsibyStatus($dataUser['_fungsi'], date('Y'), "Done"); ?></div></a></span>
                                <span class="span-ket" style="background-color:#FF8C00;"><a href="daily-activity-fungsi-status-<?= "Pending"; ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp; Pending <div class="icon-total"><?= $getData->cekDAFungsibyStatus($dataUser['_fungsi'], date('Y'), "Pending"); ?></div></a></span>
                      <?php }
                        ?>
                </div>
            </div>
            <div class="dashboard">
                <div class="icon">
                    <img src="assets/images/assignment-black.png" alt="Assignment">
                </div>
                <div class="title">
                    <strong><?= ($dataUserLogin['_level'] == "user") ? "My Assignment" : "Assignment" ?></strong>
                        <?php
                            if($dataUserLogin['_level'] == "user"){ ?>
                                <span class="span-ket" style="background-color:#1E90FF;"><a href="my-assignment-status-<?= "Request"; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Request <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_user", $dataUser['_id_pekerja'], date('Y'), "Request"); ?></div></a></span>
                                <span class="span-ket" style="background-color:#008000;"><a href="my-assignment-status-<?= "Done"; ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Done <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_user", $dataUser['_id_pekerja'], date('Y'), "Done"); ?></div></a></span>
                                <span class="span-ket" style="background-color:#FF8C00;"><a href="my-assignment-status-<?= "Pending"; ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp; Pending <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_user", $dataUser['_id_pekerja'], date('Y'), "Pending"); ?></div></a></span>
                      <?php }
                            else { ?>
                                <span class="span-ket" style="background-color:#1E90FF;"><a href="detail-assignment-status-<?= "Request"; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Request <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Request"); ?></div></a></span>
                                <span class="span-ket" style="background-color:#008000;"><a href="detail-assignment-status-<?= "Done"; ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Done <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Done"); ?></div></a></span>
                                <span class="span-ket" style="background-color:#FF8C00;"><a href="detail-assignment-status-<?= "Pending"; ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp; Pending <div class="icon-total"><?= $getData->cekAssUserbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Pending"); ?></div></a></span>
                      <?php }
                        ?>
                </div>
            </div>
            <div class="dashboard">
                <div class="icon">
                    <img src="assets/images/todolist-black.png" alt="ToDoList">
                </div>
                <div class="title">
                    <strong>To-Do List</strong>
                    <span class="span-ket" style="background-color:#008000;"><a href="to-do-list-status-<?= "Done"; ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Done <div class="icon-total"><?= $getData->cekTDLUserbyStatus($dataUser['_id_pekerja'], date('Y'), "Done"); ?></div></a></span>
                    <span class="span-ket" style="background-color:#FF8C00;"><a href="to-do-list-status-<?= "Waiting"; ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp; Waiting <div class="icon-total"><?= $getData->cekTDLUserbyStatus($dataUser['_id_pekerja'], date('Y'), "Waiting"); ?></div></a></span>
                </div>
            </div>
            <div class="dashboard">
                <div class="icon">
                    <img src="assets/images/overtime-black.png" alt="Overtime">
                </div>
                <div class="title">
                    <strong>Overtime</strong>
                        <?php
                            if($dataUserLogin['_level'] == "user"){ ?>
                                <span class="span-ket" style="background-color:#1E90FF;"><a href=""><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Request <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Request"); ?></div></a></span>
                                <span class="span-ket" style="background-color:#008000;"><a href=""><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Accept <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Accept"); ?></div></a></span>
                                <span class="span-ket" style="background-color:maroon;"><a href=""><i class="fa fa-times" aria-hidden="true"></i>&nbsp; Reject <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pekerja", $dataUser['_id_pekerja'], date('Y'), "Reject"); ?></div></a></span>
                      <?php }
                            else { ?>
                                <span class="span-ket" style="background-color:#1E90FF;"><a href=""><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Request <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pengawas", $dataUser['_id_pekerja'], date('Y'), "Request"); ?></div></a></span>
                                <span class="span-ket" style="background-color:#008000;"><a href=""><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Accept <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pengawas", $dataUser['_id_pekerja'], date('Y'), "Accept"); ?></div></a></span>
                                <span class="span-ket" style="background-color:maroon;"><a href=""><i class="fa fa-times" aria-hidden="true"></i>&nbsp; Reject <div class="icon-total"><?= $getData->cekOTbyStatus("_id_pengawas", $dataUser['_id_pekerja'], date('Y'), "Reject"); ?></div></a></span>
                      <?php }
                        ?>
                </div>
            </div>
            
        </div>

        <!-- Daily Activity & My Assignment -->
        <div class="panel-bottom">
            <div class="dashboard-bottom">
                <span class="color6">Daily Activity </span>
                <div class="table-dashboard">
                    <?php
                        if($dataUserLogin['_level'] == "user"){
                            if($getData->cekDailyActivityUser($dataUser['_id_pekerja'], date('m'), date('Y')) > 0){
                                foreach($getData->ListDAUserLimit($dataUser['_id_pekerja'], date('m'), date('Y')) as $row){ ?>
                                    <div class="daily-activity">
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
                                foreach($getData->ListDAFungsiLimit($dataUser['_fungsi'], date('m'), date('Y')) as $row){ ?>
                                    <div class="daily-activity">
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
                &nbsp;&nbsp; <em><strong>Show 10 New Entry Data</strong></em>
            </div>

            <div class="dashboard-bottom">
                <span class="color6"><?= ($dataUserLogin['_level'] == "user") ? "My Assignment" : "Assignment"; ?></span>
                <div class="table-dashboard">
                    <?php
                        if($getData->cekMyAssignment(($dataUserLogin['_level'] == "user") ? "_id_user" : "_id_pekerja", $dataUser['_id_pekerja'], date('m'), date('Y')) > 0){
                            foreach($getData->ListMyAssignmentLimit(($dataUserLogin['_level'] == "user") ? "_id_user" : "_id_pekerja", $dataUser['_id_pekerja'], date('m'), date('Y')) as $row){ 
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
                                <div class="daily-activity">
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
                &nbsp;&nbsp; <em><strong>Show 10 New Entry Data</strong></em>
            </div>
        </div>

        <!-- To Do List dan Overtime -->
        <div class="panel-bottom">
            <div class="dashboard-bottom">
                <span class="color6">To-Do List</span>
                <div class="table-dashboard">
                    <?php
                        if($getData->cekToDoList($dataUser['_id_pekerja'], date('m'), date('Y')) > 0){
                            foreach($getData->ListToDoListLimit($dataUser['_id_pekerja'], date('m'), date('Y')) as $row){ ?>
                                <div class="daily-activity">
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
                &nbsp;&nbsp; <em><strong>Show 10 New Entry Data</strong></em>
            </div>
            <div class="dashboard-bottom">
                <span class="color6">Overtime</span>
                
            </div>
        </div>

        <?php

            break;

            } ?>
    </div>
    <!-- Akhir Container -->

    <!-- Footer Halaman -->
    <div class="footer">
        Management Daily Activity Report | Ver. 1.0
    </div>
    <!-- Akhir Footer -->


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
    <script src="assets/js/script.js"></script>
    
</body>
</html>