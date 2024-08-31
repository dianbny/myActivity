<?php
    require_once "_dataBase.php";
    
    class _saveData extends _dataBase {

        //Simpan Data Aktifitas
        function simpanAktifitas($id, $tanggal, $aktifitas, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tanggalFilter = mysqli_real_escape_string($this->koneksi, $tanggal);
			$aktifitasFilter = mysqli_real_escape_string($this->koneksi, $aktifitas);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			mysqli_query($this->koneksi,"INSERT INTO _tb_daily_activity_app (_id_pekerja,_tanggal,_aktifitas,_status) VALUES ('$idFilter','$tanggalFilter','$aktifitasFilter','$statusFilter')");
		}

		//Update Data Aktifitas
        function updateAktifitas($id, $tanggal, $aktifitas, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tanggalFilter = mysqli_real_escape_string($this->koneksi, $tanggal);
			$aktifitasFilter = mysqli_real_escape_string($this->koneksi, $aktifitas);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			mysqli_query($this->koneksi,"UPDATE _tb_daily_activity_app SET _tanggal = '$tanggalFilter', _aktifitas = '$aktifitasFilter', _status = '$statusFilter' WHERE _id_aktifitas = '$idFilter' ");
		}

		//Update My Assignment
        function updateMyAssignment($id, $status, $info){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			$infoFilter = mysqli_real_escape_string($this->koneksi, $info);
			
			mysqli_query($this->koneksi,"UPDATE _tb_assignment SET _status = '$statusFilter', _ket = '$infoFilter' WHERE _id_tugas = '$idFilter' ");
		}

		//Simpan Data To Do List
        function simpanToDoList($id, $tanggal, $aktifitas, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tanggalFilter = mysqli_real_escape_string($this->koneksi, $tanggal);
			$aktifitasFilter = mysqli_real_escape_string($this->koneksi, $aktifitas);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			mysqli_query($this->koneksi,"INSERT INTO _tb_to_do_list (_id_pekerja,_tanggal,_plan,_status) VALUES ('$idFilter','$tanggalFilter','$aktifitasFilter','$statusFilter')");
		}

		//Update Data To Do List
        function updateToDoList($id, $tanggal, $aktifitas, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tanggalFilter = mysqli_real_escape_string($this->koneksi, $tanggal);
			$aktifitasFilter = mysqli_real_escape_string($this->koneksi, $aktifitas);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			mysqli_query($this->koneksi,"UPDATE _tb_to_do_list SET _tanggal = '$tanggalFilter', _plan = '$aktifitasFilter', _status = '$statusFilter' WHERE _id = '$idFilter'");
		}

		//Update Password
        function updatePassword($id, $password){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$passwordFilter = mysqli_real_escape_string($this->koneksi, $password);
			
			mysqli_query($this->koneksi,"UPDATE _tb_user_app_activity SET _password = '$passwordFilter' WHERE _id_user = '$idFilter'");
		}
		


    }

?>