<?php
    require_once "_dataBase.php";
    
    class _saveData extends _dataBase {

        //Simpan Data Aktifitas
        function simpanAktifitas($id, $tanggal, $tipe, $aktifitas, $status, $info){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tanggalFilter = mysqli_real_escape_string($this->koneksi, $tanggal);
			$tipeFilter = mysqli_real_escape_string($this->koneksi, $tipe);
			$aktifitasFilter = mysqli_real_escape_string($this->koneksi, $aktifitas);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			$infoFilter = mysqli_real_escape_string($this->koneksi, $info);
			
			mysqli_query($this->koneksi,"INSERT INTO _tb_daily_activity_app (_id_pekerja,_tanggal,_tipe_aktifitas,_aktifitas,_status,_keterangan) VALUES ('$idFilter','$tanggalFilter','$tipeFilter','$aktifitasFilter','$statusFilter','$infoFilter')");
		}

		//Update Data Aktifitas
        function updateAktifitas($id, $tanggal, $aktifitas, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tanggalFilter = mysqli_real_escape_string($this->koneksi, $tanggal);
			$aktifitasFilter = mysqli_real_escape_string($this->koneksi, $aktifitas);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			mysqli_query($this->koneksi,"UPDATE _tb_daily_activity_app SET _tanggal = '$tanggalFilter', _aktifitas = '$aktifitasFilter', _status = '$statusFilter' WHERE _id_aktifitas = '$idFilter' ");
		}

		//Save Assignment
		function saveAssignment($noAss, $id, $tgl, $waktu, $tglAss, $tugas, $engineer){
			$noAssFilter = mysqli_real_escape_string($this->koneksi, $noAss);
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$waktuFilter = mysqli_real_escape_string($this->koneksi, $waktu);
			$tglAssFilter = mysqli_real_escape_string($this->koneksi, $tglAss);
			$tugasFilter = mysqli_real_escape_string($this->koneksi, $tugas);
			$engineerFilter = mysqli_real_escape_string($this->koneksi, $engineer);
			
			mysqli_query($this->koneksi,"INSERT INTO _tb_assignment VALUES ('$noAssFilter','$idFilter','$tglFilter','$waktuFilter','$tglAssFilter','$tugasFilter','Request','$engineerFilter','-')");
		}

		//Update Assignment
		function updateAssignment($id, $tgl, $waktu, $tglAss, $tugas, $engineer){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$waktuFilter = mysqli_real_escape_string($this->koneksi, $waktu);
			$tglAssFilter = mysqli_real_escape_string($this->koneksi, $tglAss);
			$tugasFilter = mysqli_real_escape_string($this->koneksi, $tugas);
			$engineerFilter = mysqli_real_escape_string($this->koneksi, $engineer);
			
			mysqli_query($this->koneksi,"UPDATE _tb_assignment SET _tanggal = '$tglFilter', _waktu = '$waktuFilter', _tanggal_tugas = '$tglAssFilter', _tugas = '$tugasFilter', _id_user = '$engineerFilter' WHERE _id_tugas = '$idFilter'");
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