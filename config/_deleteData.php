<?php
    require_once "_dataBase.php";
    
    class _deleteData extends _dataBase {

        //Delete aktifitas
        function hapusAktifitas($id){
            $idFilter = mysqli_real_escape_string($this->koneksi, $id);
            
			mysqli_query($this->koneksi,"DELETE FROM _tb_daily_activity_app WHERE _id_aktifitas = '$idFilter'"); 
        }

        //Delete to do list
        function hapusToDoList($id){
            $idFilter = mysqli_real_escape_string($this->koneksi, $id);
            
			mysqli_query($this->koneksi,"DELETE FROM _tb_to_do_list WHERE _id = '$idFilter'"); 
        }

        //Delete Assignment
        function hapusAssignment($id){
            $idFilter = mysqli_real_escape_string($this->koneksi, $id);
            
			mysqli_query($this->koneksi,"DELETE FROM _tb_assignment WHERE _id_tugas = '$idFilter'"); 
        }

        

    }

?>