<?php
    error_reporting(0);
    session_start();
    require_once '../config/_getData.php';
    require_once '../config/_deleteData.php';
    require_once '../config/_cons.php';
    $getData = new _getData();
    $deleteData = new _deleteData();

    if(!isset($_SESSION['status'])){ 
        header('location:logout');
    } 

    //Waktu 
    date_default_timezone_set("Asia/Kuala_Lumpur");
    setlocale(LC_ALL, 'id-ID', 'id_ID');

        //Delete Daily Activity
        if($_GET['action'] == "delete-activity"){
            try{

                $id = $_GET['id'];
                
                $deleteData->hapusAktifitas($id); 
                header('location:'.BASEURL.'/daily-activity/deleted');
            }
            catch (Exception $e){
                echo $e->getMessage();
            }
        }

        //Delete To Do List
        elseif($_GET['action'] == "delete-to-do-list"){
            try {

                $id = $_GET['id'];
                
                $deleteData->hapusToDoList($id); 
                header('location:'.BASEURL.'/to-do-list/deleted');
            }
            catch (Exception $e){
                echo $e->getMessage();
            }

        }

        //Delete Assignment
        elseif($_GET['action'] == "delete-assignment"){
            try{

                $id = $_GET['id'];
                
                $deleteData->hapusAssignment($id); 
                header('location:'.BASEURL.'/assignment/deleted');
            }
            catch (Exception $e){
                echo $e->getMessage();
            }

                
        }
                    
    ?>
