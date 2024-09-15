<?php
    require_once "_dataBase.php";
    
    class _getData extends _dataBase {
        
        //Cek Login
        function cekLogin($user, $pass){
			$usernameFilter = mysqli_real_escape_string($this->koneksi, $user);
			$passFilter = mysqli_real_escape_string($this->koneksi, $pass);

			$cekUser = mysqli_query($this->koneksi, "SELECT * FROM _tb_user_app_activity WHERE _username = '$usernameFilter' AND _password = '$passFilter'");
			$cek = mysqli_num_rows($cekUser);
			if($cek > 0){
				return true;
			}

			return false;
		}

		//Cek Exist Username
		function cekUsername($username){
			$userFilter = mysqli_real_escape_string($this->koneksi, $username);

			$dataPengguna = mysqli_query($this->koneksi,"SELECT * FROM _tb_user_app_activity WHERE _username = '$userFilter'");
			$cekJumlah = mysqli_num_rows($dataPengguna);
			
			return $cekJumlah;
		}

        //Ambil Identitas User Login Berdasarkan Username 
        function getDataUserLogin($user){
			$userFilter = mysqli_real_escape_string($this->koneksi, $user);

			$dataUser = mysqli_query($this->koneksi,"SELECT * FROM _tb_user_app_activity WHERE _username = '$userFilter'");
			$getUser = mysqli_fetch_assoc($dataUser);
			
			return $getUser;
		}

		//Ambil Identitas User Login Berdasarkan Username 
        function getDataUserbyID($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataUser = mysqli_query($this->koneksi,"SELECT * FROM _tb_user_app_activity WHERE _id_user = '$idFilter'");
			$getUser = mysqli_fetch_assoc($dataUser);
			
			return $getUser;
		}

		//Cek Daily Activity 
		function cekDailyActivityUser($id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);

			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app WHERE _id_pekerja = '$idFilter' AND MONTH(_tanggal) = '$blnFilter' AND YEAR(_tanggal) = '$thnFilter'");
			$cekJumlah = mysqli_num_rows($dataActivity);
			
			return $cekJumlah;
		}

		//Cek Daily Activity 
		function cekDAFromTo($id, $start, $end){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$startFilter = mysqli_real_escape_string($this->koneksi, $start);
			$endFilter = mysqli_real_escape_string($this->koneksi, $end);

			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app WHERE _id_pekerja = '$idFilter' AND _tanggal BETWEEN '$startFilter' AND '$endFilter'");
			$cekJumlah = mysqli_num_rows($dataActivity);
			
			return $cekJumlah;
		}

		//Cek Daily Activity 
		function cekDAFromToTipe($id, $start, $end, $tipe){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$startFilter = mysqli_real_escape_string($this->koneksi, $start);
			$endFilter = mysqli_real_escape_string($this->koneksi, $end);
			$tipeFilter = mysqli_real_escape_string($this->koneksi, $tipe);

			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app WHERE _id_pekerja = '$idFilter' AND _tanggal BETWEEN '$startFilter' AND '$endFilter' AND _tipe_aktifitas = '$tipeFilter'");
			$cekJumlah = mysqli_num_rows($dataActivity);
			
			return $cekJumlah;
		}

		//Cek Daily Activity by Status
		function cekDAUserbyStatus($id, $thn, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app WHERE _id_pekerja = '$idFilter' AND YEAR(_tanggal) = '$thnFilter' AND _status = '$statusFilter'");
			$cekJumlah = mysqli_num_rows($dataActivity);
			
			return $cekJumlah;
		}

		//Cek Daily Activity Fungsi by Status
		function cekDAFungsibyStatus($id, $thn, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_activity_app._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND _tb_pekerja_pegawai._fungsi = '$idFilter' AND YEAR(_tb_daily_activity_app._tanggal) = '$thnFilter' AND _tb_daily_activity_app._status = '$statusFilter'");
			$cekJumlah = mysqli_num_rows($dataActivity);
			
			return $cekJumlah;
		}

		//Cek Daily Activity 
		function cekDailyActivityFungsi($id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);

			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_activity_app._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND _tb_pekerja_pegawai._fungsi = '$idFilter' AND MONTH(_tb_daily_activity_app._tanggal) = '$blnFilter' AND YEAR(_tb_daily_activity_app._tanggal) = '$thnFilter'");
			$cekJumlah = mysqli_num_rows($dataActivity);
			
			return $cekJumlah;
		}

		//Cek Daily Activity 
		function cekDAFungsiFromTo($id, $start, $end){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$startFilter = mysqli_real_escape_string($this->koneksi, $start);
			$endFilter = mysqli_real_escape_string($this->koneksi, $end);

			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_activity_app._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND _tb_pekerja_pegawai._fungsi = '$idFilter' AND _tb_daily_activity_app._tanggal BETWEEN '$startFilter' AND '$endFilter'");
			$cekJumlah = mysqli_num_rows($dataActivity);
			
			return $cekJumlah;
		}

		//Cek Daily Activity 
		function cekDAFungsiFromToTipe($id, $start, $end, $tipe){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$startFilter = mysqli_real_escape_string($this->koneksi, $start);
			$endFilter = mysqli_real_escape_string($this->koneksi, $end);
			$tipeFilter = mysqli_real_escape_string($this->koneksi, $tipe);

			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_activity_app._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND _tb_pekerja_pegawai._fungsi = '$idFilter' AND _tb_daily_activity_app._tanggal BETWEEN '$startFilter' AND '$endFilter' AND _tb_daily_activity_app._tipe_aktifitas = '$tipeFilter'");
			$cekJumlah = mysqli_num_rows($dataActivity);
			
			return $cekJumlah;
		}

		//List Daily Activity
		function ListDailyActivityUser($id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			
			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app WHERE _id_pekerja = '$idFilter' AND MONTH(_tanggal) = '$blnFilter' AND YEAR(_tanggal) = '$thnFilter' ORDER BY _tanggal DESC, _id_aktifitas DESC");
			while($listActivity = mysqli_fetch_assoc($dataActivity)){
				$result[] = $listActivity;
			}

			return $result;
		}

		//List Daily Activity
		function ListDAFromTo($id, $start, $end){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$startFilter = mysqli_real_escape_string($this->koneksi, $start);
			$endFilter = mysqli_real_escape_string($this->koneksi, $end);
			
			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app WHERE _id_pekerja = '$idFilter' AND _tanggal BETWEEN '$startFilter' AND '$endFilter' ORDER BY _tanggal ASC, _id_aktifitas DESC");
			while($listActivity = mysqli_fetch_assoc($dataActivity)){
				$result[] = $listActivity;
			}

			return $result;
		}

		//List Daily Activity
		function ListDAFromToTipe($id, $start, $end, $tipe){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$startFilter = mysqli_real_escape_string($this->koneksi, $start);
			$endFilter = mysqli_real_escape_string($this->koneksi, $end);
			$tipeFilter = mysqli_real_escape_string($this->koneksi, $tipe);
			
			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app WHERE _id_pekerja = '$idFilter' AND _tanggal BETWEEN '$startFilter' AND '$endFilter' AND _tipe_aktifitas = '$tipeFilter' ORDER BY _tanggal ASC, _id_aktifitas DESC");
			while($listActivity = mysqli_fetch_assoc($dataActivity)){
				$result[] = $listActivity;
			}

			return $result;
		}

		//List Daily Activity
		function ListDailyActivityFungsi($id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			
			$dataActivity = mysqli_query($this->koneksi,"SELECT _tb_daily_activity_app._tanggal, _tb_pekerja_pegawai._nama_pekerja, _tb_daily_activity_app._aktifitas, _tb_daily_activity_app._status FROM _tb_daily_activity_app, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_activity_app._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND _tb_pekerja_pegawai._fungsi = '$idFilter' AND MONTH(_tb_daily_activity_app._tanggal) = '$blnFilter' AND YEAR(_tb_daily_activity_app._tanggal) = '$thnFilter' ORDER BY _tb_daily_activity_app._tanggal DESC, _tb_daily_activity_app._id_aktifitas DESC");
			while($listActivity = mysqli_fetch_assoc($dataActivity)){
				$result[] = $listActivity;
			}

			return $result;
		}

		//List Daily Activity
		function ListDAFungsiFromTo($id, $start, $end){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$startFilter = mysqli_real_escape_string($this->koneksi, $start);
			$endFilter = mysqli_real_escape_string($this->koneksi, $end);
			
			$dataActivity = mysqli_query($this->koneksi,"SELECT _tb_daily_activity_app._id_aktifitas, _tb_daily_activity_app._tanggal, _tb_pekerja_pegawai._id_pekerja, _tb_pekerja_pegawai._nama_pekerja, _tb_daily_activity_app._tipe_aktifitas, _tb_daily_activity_app._aktifitas, _tb_daily_activity_app._status, _tb_daily_activity_app._keterangan FROM _tb_daily_activity_app, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_activity_app._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND _tb_pekerja_pegawai._fungsi = '$idFilter' AND _tb_daily_activity_app._tanggal BETWEEN '$startFilter' AND '$endFilter' ORDER BY _tb_daily_activity_app._tanggal ASC, _tb_daily_activity_app._id_aktifitas DESC");
			while($listActivity = mysqli_fetch_assoc($dataActivity)){
				$result[] = $listActivity;
			}

			return $result;
		}

		//List Daily Activity
		function ListDAFungsiFromToTipe($id, $start, $end, $tipe){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$startFilter = mysqli_real_escape_string($this->koneksi, $start);
			$endFilter = mysqli_real_escape_string($this->koneksi, $end);
			$tipeFilter = mysqli_real_escape_string($this->koneksi, $tipe);
			
			$dataActivity = mysqli_query($this->koneksi,"SELECT _tb_daily_activity_app._id_aktifitas, _tb_daily_activity_app._tanggal, _tb_pekerja_pegawai._id_pekerja, _tb_pekerja_pegawai._nama_pekerja, _tb_daily_activity_app._tipe_aktifitas, _tb_daily_activity_app._aktifitas, _tb_daily_activity_app._status, _tb_daily_activity_app._keterangan FROM _tb_daily_activity_app, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_activity_app._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND _tb_pekerja_pegawai._fungsi = '$idFilter' AND _tb_daily_activity_app._tanggal BETWEEN '$startFilter' AND '$endFilter' AND _tb_daily_activity_app._tipe_aktifitas = '$tipeFilter' ORDER BY _tb_daily_activity_app._tanggal ASC, _tb_daily_activity_app._id_aktifitas DESC");
			while($listActivity = mysqli_fetch_assoc($dataActivity)){
				$result[] = $listActivity;
			}

			return $result;
		}

		//List Daily Activity
		function ListDAFungsibyStatus($id, $thn, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			$dataActivity = mysqli_query($this->koneksi,"SELECT _tb_daily_activity_app._id_aktifitas, _tb_daily_activity_app._tanggal, _tb_pekerja_pegawai._id_pekerja, _tb_pekerja_pegawai._nama_pekerja, _tb_daily_activity_app._tipe_aktifitas, _tb_daily_activity_app._aktifitas, _tb_daily_activity_app._status, _tb_daily_activity_app._keterangan FROM _tb_daily_activity_app, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_activity_app._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND _tb_pekerja_pegawai._fungsi = '$idFilter' AND YEAR(_tb_daily_activity_app._tanggal) = '$thnFilter' AND _tb_daily_activity_app._status = '$statusFilter' ORDER BY _tb_daily_activity_app._tanggal ASC, _tb_daily_activity_app._id_aktifitas DESC");
			while($listActivity = mysqli_fetch_assoc($dataActivity)){
				$result[] = $listActivity;
			}

			return $result;
		}

		//List Daily Activity Limit
		function ListDAUserLimit($id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			
			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app WHERE _id_pekerja = '$idFilter' AND MONTH(_tanggal) = '$blnFilter' AND YEAR(_tanggal) = '$thnFilter' ORDER BY _tanggal DESC, _id_aktifitas DESC LIMIT 10");
			while($listActivity = mysqli_fetch_assoc($dataActivity)){
				$result[] = $listActivity;
			}

			return $result;
		}

		//List Daily Activity Limit
		function ListDAFungsiLimit($id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			
			$dataActivity = mysqli_query($this->koneksi,"SELECT _tb_daily_activity_app._tanggal, _tb_pekerja_pegawai._nama_pekerja, _tb_daily_activity_app._aktifitas, _tb_daily_activity_app._status FROM _tb_daily_activity_app, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_activity_app._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND _tb_pekerja_pegawai._fungsi = '$idFilter' AND MONTH(_tb_daily_activity_app._tanggal) = '$blnFilter' AND YEAR(_tb_daily_activity_app._tanggal) = '$thnFilter' ORDER BY _tb_daily_activity_app._tanggal DESC, _tb_daily_activity_app._id_aktifitas DESC LIMIT 10");
			while($listActivity = mysqli_fetch_assoc($dataActivity)){
				$result[] = $listActivity;
			}

			return $result;
		}

		//List Daily Activity by Status
		function ListDAUserbyStatus($id, $thn, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app WHERE _id_pekerja = '$idFilter' AND YEAR(_tanggal) = '$thnFilter' AND _status = '$statusFilter' ORDER BY _tanggal ASC, _id_aktifitas DESC");
			while($listActivity = mysqli_fetch_assoc($dataActivity)){
				$result[] = $listActivity;
			}

			return $result;
		}

		//Ambil Data Daily Activity by ID
        function getDataDAbyID($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataActivity = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_activity_app WHERE _id_aktifitas = '$idFilter'");
			$getActivity = mysqli_fetch_assoc($dataActivity);
			
			return $getActivity;
		}

		//Cek My assignment
		function cekMyAssignment($tabelid, $id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);

			$dataAssignment = mysqli_query($this->koneksi,"SELECT * FROM _tb_assignment WHERE $tabelid = '$idFilter' AND MONTH(_tanggal_tugas) = '$blnFilter' AND YEAR(_tanggal_tugas) = '$thnFilter'");
			$cekJumlah = mysqli_num_rows($dataAssignment);
			
			return $cekJumlah;
		}

		//Cek assignment by Status
		function cekAssUserbyStatus($tabelid, $id, $thn, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			$dataAssignment = mysqli_query($this->koneksi,"SELECT * FROM _tb_assignment WHERE $tabelid = '$idFilter' AND YEAR(_tanggal_tugas) = '$thnFilter' AND _status = '$statusFilter'");
			$cekJumlah = mysqli_num_rows($dataAssignment);
			
			return $cekJumlah;
		}

		//List Assignment
		function ListMyAssignment($tabelid, $id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			
			$dataAssignment= mysqli_query($this->koneksi,"SELECT * FROM _tb_assignment WHERE $tabelid = '$idFilter' AND MONTH(_tanggal_tugas) = '$blnFilter' AND YEAR(_tanggal_tugas) = '$thnFilter' ORDER BY _tanggal_tugas DESC, _id_tugas DESC");
			while($listAssignment = mysqli_fetch_assoc($dataAssignment)){
				$result[] = $listAssignment;
			}

			return $result;
		}

		//List Assignment
		function ListMyAssignmentLimit($tabelid, $id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			
			$dataAssignment= mysqli_query($this->koneksi,"SELECT * FROM _tb_assignment WHERE $tabelid = '$idFilter' AND MONTH(_tanggal_tugas) = '$blnFilter' AND YEAR(_tanggal_tugas) = '$thnFilter' ORDER BY _tanggal_tugas DESC, _id_tugas DESC LIMIT 10");
			while($listAssignment = mysqli_fetch_assoc($dataAssignment)){
				$result[] = $listAssignment;
			}

			return $result;
		}

		//List Daily Activity by Status
		function ListAssUserbyStatus($tabelid, $id, $thn, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataAssignment = mysqli_query($this->koneksi,"SELECT * FROM _tb_assignment WHERE $tabelid = '$idFilter' AND YEAR(_tanggal_tugas) = '$thnFilter' AND _status = '$statusFilter' ORDER BY _tanggal_tugas DESC, _id_tugas DESC");
			while($listAssignment = mysqli_fetch_assoc($dataAssignment)){
				$result[] = $listAssignment;
			}

			return $result;
		}

		//Ambil Data assignment Activity by ID
        function getMyAssignmentbyID($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataAssignment = mysqli_query($this->koneksi,"SELECT * FROM _tb_assignment WHERE _id_tugas = '$idFilter'");
			$getAssignment = mysqli_fetch_assoc($dataAssignment);
			
			return $getAssignment;
		}

		//Cek To Do List
		function cekToDoList($id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);

			$dataTDL = mysqli_query($this->koneksi,"SELECT * FROM _tb_to_do_list WHERE _id_pekerja = '$idFilter' AND MONTH(_tanggal) = '$blnFilter' AND YEAR(_tanggal) = '$thnFilter'");
			$cekJumlah = mysqli_num_rows($dataTDL);
			
			return $cekJumlah;
		}

		//Cek To Do List by Status
		function cekTDLUserbyStatus($id, $thn, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			$dataTDL= mysqli_query($this->koneksi,"SELECT * FROM _tb_to_do_list WHERE _id_pekerja = '$idFilter' AND YEAR(_tanggal) = '$thnFilter' AND _status = '$statusFilter'");
			$cekJumlah = mysqli_num_rows($dataTDL);
			
			return $cekJumlah;
		}

		//List To Do List
		function ListToDoList($id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			
			$dataTDL= mysqli_query($this->koneksi,"SELECT * FROM _tb_to_do_list WHERE _id_pekerja = '$idFilter' AND MONTH(_tanggal) = '$blnFilter' AND YEAR(_tanggal) = '$thnFilter' ORDER BY _tanggal DESC, _id DESC");
			while($listTDL = mysqli_fetch_assoc($dataTDL)){
				$result[] = $listTDL;
			}

			return $result;
		}

		//List To Do List
		function ListToDoListLimit($id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			
			$dataTDL= mysqli_query($this->koneksi,"SELECT * FROM _tb_to_do_list WHERE _id_pekerja = '$idFilter' AND MONTH(_tanggal) = '$blnFilter' AND YEAR(_tanggal) = '$thnFilter' ORDER BY _tanggal DESC, _id DESC LIMIT 10");
			while($listTDL = mysqli_fetch_assoc($dataTDL)){
				$result[] = $listTDL;
			}

			return $result;
		}

		//List To Do List by Status
		function ListToDoListbyStatus($id, $thn, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataTDL= mysqli_query($this->koneksi,"SELECT * FROM _tb_to_do_list WHERE _id_pekerja = '$idFilter' AND YEAR(_tanggal) = '$thnFilter' AND _status = '$statusFilter' ORDER BY _tanggal DESC, _id DESC");
			while($listTDL = mysqli_fetch_assoc($dataTDL)){
				$result[] = $listTDL;
			}

			return $result;
		}

		//Ambil Data To Do List by ID
        function getDataTDLbyID($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataTDL = mysqli_query($this->koneksi,"SELECT * FROM _tb_to_do_list WHERE _id = '$idFilter'");
			$getTDL = mysqli_fetch_assoc($dataTDL);
			
			return $getTDL;
		}

		//List Engineer
		function listEngineerbyFungsi($fungsi){
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);
			
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _fungsi = '$fungsiFilter' AND _status = 'TKJP/MK'");
			while($listPekerja = mysqli_fetch_assoc($dataPekerja)){
				$result[] = $listPekerja;
			}

			return $result;
		}

		//Ambil Data Overtime
        function cekOTbyStatus($tabelid, $id, $thn, $status){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			$dataOT= mysqli_query($this->koneksi,"SELECT * FROM _tb_overtime WHERE $tabelid = '$idFilter' AND YEAR(_tgl_overtime) = '$thnFilter' AND _status = '$statusFilter'");
			$cekJumlah = mysqli_num_rows($dataOT);
			
			return $cekJumlah;
		}

		//Cek My overtime
		function cekMyOvertime($tabelid, $id, $star, $end){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$startFilter = mysqli_real_escape_string($this->koneksi, $start);
			$endFilter = mysqli_real_escape_string($this->koneksi, $end);
			
			$dataOvertime = mysqli_query($this->koneksi,"SELECT * FROM _tb_overtime WHERE $tabelid = '$idFilter' AND _tgl_overtime BETWEEN '$startFilter' AND '$endFilter'");
			$cekJumlah = mysqli_num_rows($dataOvertime);
			
			return $cekJumlah;
		}

		//Cek Follow Up
		function cekFollowUp($idAkt, $idPek){
			$idAktFilter = mysqli_real_escape_string($this->koneksi, $idAkt);
			$idPekFilter = mysqli_real_escape_string($this->koneksi, $idPek);
			
			$dataFollowUp = mysqli_query($this->koneksi,"SELECT * FROM _tb_follow_up WHERE _id = '$idAktFilter' AND _id_pekerja = '$idPekFilter'");
			$cekJumlah = mysqli_num_rows($dataFollowUp);
			
			return $cekJumlah;
		}

		//Ambil Data Follow Up
        function getDataFollowUp($idAkt, $idPek){
			$idAktFilter = mysqli_real_escape_string($this->koneksi, $idAkt);
			$idPekFilter = mysqli_real_escape_string($this->koneksi, $idPek);

			$dataFU = mysqli_query($this->koneksi,"SELECT * FROM _tb_follow_up WHERE _id = '$idAktFilter' AND _id_pekerja = '$idPekFilter'");
			$getFU = mysqli_fetch_assoc($dataFU);
			
			return $getFU;
		}

		//Cek ID
		function cekID($db, $tblidAkt, $tblidPek, $idAkt, $idPek){
			$idAktFilter = mysqli_real_escape_string($this->koneksi, $idAkt);
			$idPekFilter = mysqli_real_escape_string($this->koneksi, $idPek);
			
			$dataID = mysqli_query($this->koneksi,"SELECT * FROM $db WHERE $tblidAkt = '$idAktFilter' AND $tblidPek = '$idPekFilter'");
			$cekJumlah = mysqli_num_rows($dataID);
			
			return $cekJumlah;
		}



























		






















































		//Cek Fungsi 
		function cekFungsi(){
			$dataFungsi = mysqli_query($this->koneksi,"SELECT * FROM _tb_fungsi");
			$cekJumlah = mysqli_num_rows($dataFungsi);
			
			return $cekJumlah;
		}

		//Cek Fungsi 
		function cekFungsibyName($nama){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);

			$dataFungsi = mysqli_query($this->koneksi,"SELECT * FROM _tb_fungsi WHERE _nama_fungsi LIKE '%$namaFilter%'");
			$cekJumlah = mysqli_num_rows($dataFungsi);
			
			return $cekJumlah;
		}

		

		//List Data Fungsi
        function ListFungsiAll($mulai, $halaman){
			$mulaiFilter = mysqli_real_escape_string($this->koneksi, $mulai);
			$halamanFilter = mysqli_real_escape_string($this->koneksi, $halaman);

			$dataPerusahaan = mysqli_query($this->koneksi,"SELECT * FROM _tb_fungsi ORDER BY _id_fungsi LIMIT $mulaiFilter, $halamanFilter");
			while($listPerusahaan = mysqli_fetch_assoc($dataPerusahaan)){
				$result[] = $listPerusahaan;
			}

			return $result;
		}

		//List Data Fungsi
        function ListFungsibyName($nama){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);

			$dataFungsi = mysqli_query($this->koneksi,"SELECT * FROM _tb_fungsi WHERE _nama_fungsi LIKE '%$namaFilter%' ORDER BY _id_fungsi");
			while($listFungsi = mysqli_fetch_assoc($dataFungsi)){
				$result[] = $listFungsi;
			}

			return $result;
		}

		//Ambil Nama Fungsi
		function getNamaFungsi($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataFungsi = mysqli_query($this->koneksi,"SELECT * FROM _tb_fungsi WHERE _id_fungsi = '$idFilter'");
			$getFungsi = mysqli_fetch_assoc($dataFungsi);
			
			return $getFungsi;
		}

		//Get ID Fungsi Terakhir
		function getIDFungsi(){
			$dataFungsi = mysqli_query($this->koneksi,"SELECT * FROM _tb_fungsi ORDER BY _id_fungsi DESC LIMIT 1");
			$getFungsi = mysqli_fetch_assoc($dataFungsi);
			
			return $getFungsi;
		}

		//List Data Kategori
        function ListKategori(){
			$dataKategori = mysqli_query($this->koneksi,"SELECT * FROM _tb_kategori_pekerjaan ORDER BY _id_kategori");
			while($listKategori = mysqli_fetch_assoc($dataKategori)){
				$result[] = $listKategori;
			}

			return $result;
		}

		//Ambil Nama Kategori
		function getKategoriPekerjaan($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataKategori = mysqli_query($this->koneksi,"SELECT * FROM _tb_kategori_pekerjaan WHERE _id_kategori = '$idFilter'");
			$getKategori = mysqli_fetch_assoc($dataKategori);
			
			return $getKategori;
		}

		//Cek Perusahaan 
		function cekPerusahaan(){
			$dataPerusahaan = mysqli_query($this->koneksi,"SELECT * FROM _tb_perusahaan");
			$cekJumlah = mysqli_num_rows($dataPerusahaan);
			
			return $cekJumlah;
		}

		//Cek Perusahaan 
		function cekPerusahaanbyName($nama){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);

			$dataPerusahaan = mysqli_query($this->koneksi,"SELECT * FROM _tb_perusahaan WHERE _perusahaan LIKE '%$namaFilter%'");
			$cekJumlah = mysqli_num_rows($dataPerusahaan);
			
			return $cekJumlah;
		}

		//List Data Perusahaan
        function ListPerusahaan(){
			$dataPerusahaan = mysqli_query($this->koneksi,"SELECT * FROM _tb_perusahaan ORDER BY _id_perusahaan");
			while($listPerusahaan = mysqli_fetch_assoc($dataPerusahaan)){
				$result[] = $listPerusahaan;
			}

			return $result;
		}

		//List Data Perusahaan
        function ListPerusahaanAll($mulai, $halaman){
			$mulaiFilter = mysqli_real_escape_string($this->koneksi, $mulai);
			$halamanFilter = mysqli_real_escape_string($this->koneksi, $halaman);

			$dataPerusahaan = mysqli_query($this->koneksi,"SELECT * FROM _tb_perusahaan ORDER BY _id_perusahaan LIMIT $mulaiFilter, $halamanFilter");
			while($listPerusahaan = mysqli_fetch_assoc($dataPerusahaan)){
				$result[] = $listPerusahaan;
			}

			return $result;
		}

		//List Data Perusahaan
        function ListPerusahaanbyName($nama){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			
			$dataPerusahaan = mysqli_query($this->koneksi,"SELECT * FROM _tb_perusahaan WHERE _perusahaan LIKE '%$namaFilter%' ORDER BY _id_perusahaan ASC");
			while($listPerusahaan = mysqli_fetch_assoc($dataPerusahaan)){
				$result[] = $listPerusahaan;
			}

			return $result;
		}

		//Ambil Nama Perusahaan
		function getNamaPerusahaan($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataPerusahaan = mysqli_query($this->koneksi,"SELECT * FROM _tb_perusahaan WHERE _id_perusahaan = '$idFilter'");
			$getPerusahaan = mysqli_fetch_assoc($dataPerusahaan);
			
			return $getPerusahaan;
		}

		//Get ID Perusahaan Terakhir
		function getIDPerusahaan(){
			$dataPerusahaan = mysqli_query($this->koneksi,"SELECT * FROM _tb_perusahaan ORDER BY _id_perusahaan DESC LIMIT 1");
			$getPerusahaan = mysqli_fetch_assoc($dataPerusahaan);
			
			return $getPerusahaan;
		}

		//List Data Instansi
        function ListInstansi(){
			$dataInstansi = mysqli_query($this->koneksi,"SELECT * FROM _tb_instansi ORDER BY _id_instansi");
			while($listInstansi = mysqli_fetch_assoc($dataInstansi)){
				$result[] = $listInstansi;
			}

			return $result;
		}

		//Ambil Nama Insansi
		function getNamaInstansi($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataInstansi = mysqli_query($this->koneksi,"SELECT * FROM _tb_instansi WHERE _id_instansi = '$idFilter'");
			$getInstansi = mysqli_fetch_assoc($dataInstansi);
			
			return $getInstansi;
		}

		//Cek Nomor Pekerja
		function cekNopek($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _id_pekerja = '$idFilter'");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		//Cek Data Pekerja
        function cekJumlahPekerja(){
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		//Cek Data Pekerja
        function cekJumlahPekerjaTKJP(){
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _status = 'TKJP/MK'");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		//Cek Data Pekerja
        function cekJumlahPekerjaPegawai(){
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _status = 'PEKERJA'");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		//Cek Data Pekerja
        function cekJumlahPekerjaPerusahaan($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _perusahaan = '$idFilter'");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		//Cek Data Pekerja
        function cekJumlahPekerjaFungsi($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _fungsi = '$idFilter'");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		function cekPekerjabyNama($nama, $status){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _nama_pekerja LIKE '%$namaFilter%' AND _status = '$statusFilter'");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		function cekPekerjaAllbyNama($nama){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _nama_pekerja LIKE '%$namaFilter%'");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		function cekPekerjabyFungsi($fungsi, $status){
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _fungsi = '$fungsiFilter' AND _status = '$statusFilter'");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		function cekPekerjaAllbyFungsi($fungsi){
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);
			
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _fungsi = '$fungsiFilter'");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		function cekPekerjabyFungandNama($nama, $fungsi, $status){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _nama_pekerja LIKE '%$namaFilter%' AND _fungsi = '$fungsiFilter' AND _status = '$statusFilter'");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		function cekPekerjaAllbyFungandNama($nama, $fungsi){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);
			
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _nama_pekerja LIKE '%$namaFilter%' AND _fungsi = '$fungsiFilter'");
			$cekJumlah = mysqli_num_rows($dataPekerja);
			
			return $cekJumlah;
		}

		//List Data Pekerja
        function listPekerjaDashboard($status){
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_pekerja_pegawai._fungsi = _tb_fungsi._id_fungsi AND _tb_pekerja_pegawai._status = '$statusFilter'");
			while($listPekerja = mysqli_fetch_assoc($dataPekerja)){
				$result[] = $listPekerja;
			}

			return $result;
		}

		//List Data Pekerja
        function listPekerja($status, $mulai, $halaman){
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);
			$mulaiFilter = mysqli_real_escape_string($this->koneksi, $mulai);
			$halamanFilter = mysqli_real_escape_string($this->koneksi, $halaman);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai, _tb_fungsi, _tb_kategori_pekerjaan, _tb_perusahaan WHERE _tb_pekerja_pegawai._fungsi = _tb_fungsi._id_fungsi AND _tb_pekerja_pegawai._kategori_pekerjaan = _tb_kategori_pekerjaan._id_kategori AND _tb_pekerja_pegawai._perusahaan = _tb_perusahaan._id_perusahaan AND _tb_pekerja_pegawai._status = '$statusFilter' ORDER BY _tb_pekerja_pegawai._nama_pekerja ASC LIMIT $mulaiFilter, $halamanFilter");
			while($listPekerja = mysqli_fetch_assoc($dataPekerja)){
				$result[] = $listPekerja;
			}

			return $result;
		}

		//List Data Pekerja
        function listPekerjaAll($mulai, $halaman){
			$mulaiFilter = mysqli_real_escape_string($this->koneksi, $mulai);
			$halamanFilter = mysqli_real_escape_string($this->koneksi, $halaman);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai, _tb_fungsi, _tb_kategori_pekerjaan WHERE _tb_pekerja_pegawai._fungsi = _tb_fungsi._id_fungsi AND _tb_pekerja_pegawai._kategori_pekerjaan = _tb_kategori_pekerjaan._id_kategori LIMIT $mulaiFilter, $halamanFilter");
			while($listPekerja = mysqli_fetch_assoc($dataPekerja)){
				$result[] = $listPekerja;
			}

			return $result;
		}

		//List Data Pekerja
        function listPekerjabyNama($nama, $status){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai, _tb_fungsi, _tb_kategori_pekerjaan, _tb_perusahaan WHERE _tb_pekerja_pegawai._fungsi = _tb_fungsi._id_fungsi AND _tb_pekerja_pegawai._nama_pekerja LIKE '%$namaFilter%' AND _tb_pekerja_pegawai._kategori_pekerjaan = _tb_kategori_pekerjaan._id_kategori AND _tb_pekerja_pegawai._perusahaan = _tb_perusahaan._id_perusahaan AND _tb_pekerja_pegawai._status = '$statusFilter'");
			while($listPekerja = mysqli_fetch_assoc($dataPekerja)){
				$result[] = $listPekerja;
			}

			return $result;
		}

		//List Data Pekerja
        function listPekerjaAllbyNama($nama){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai, _tb_fungsi, _tb_kategori_pekerjaan, _tb_perusahaan WHERE _tb_pekerja_pegawai._fungsi = _tb_fungsi._id_fungsi AND _tb_pekerja_pegawai._kategori_pekerjaan = _tb_kategori_pekerjaan._id_kategori AND _tb_pekerja_pegawai._perusahaan = _tb_perusahaan._id_perusahaan AND _tb_pekerja_pegawai._nama_pekerja LIKE '%$namaFilter%'");
			while($listPekerja = mysqli_fetch_assoc($dataPekerja)){
				$result[] = $listPekerja;
			}

			return $result;
		}

		function listPekerjabyFungsi($fungsi, $status){
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai, _tb_fungsi, _tb_kategori_pekerjaan, _tb_perusahaan WHERE _tb_pekerja_pegawai._fungsi = _tb_fungsi._id_fungsi AND _tb_pekerja_pegawai._fungsi = '$fungsiFilter' AND _tb_pekerja_pegawai._kategori_pekerjaan = _tb_kategori_pekerjaan._id_kategori AND _tb_pekerja_pegawai._perusahaan = _tb_perusahaan._id_perusahaan AND _tb_pekerja_pegawai._status = '$statusFilter'");
			while($listPekerja = mysqli_fetch_assoc($dataPekerja)){
				$result[] = $listPekerja;
			}

			return $result;
		}

		//List Data Pekerja
        function listPekerjaAllbyFungsi($fungsi){
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);
			
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai, _tb_fungsi, _tb_kategori_pekerjaan WHERE _tb_pekerja_pegawai._fungsi = _tb_fungsi._id_fungsi AND _tb_pekerja_pegawai._kategori_pekerjaan = _tb_kategori_pekerjaan._id_kategori AND _tb_pekerja_pegawai._fungsi = '$fungsiFilter' ORDER BY _tb_pekerja_pegawai._nama_pekerja ASC");
			while($listPekerja = mysqli_fetch_assoc($dataPekerja)){
				$result[] = $listPekerja;
			}

			return $result;
		}

		//List Data Pekerja
        function listPekerjabyFungandNama($nama, $fungsi, $status){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai, _tb_fungsi, _tb_kategori_pekerjaan, _tb_perusahaan WHERE _tb_pekerja_pegawai._fungsi = _tb_fungsi._id_fungsi AND _tb_pekerja_pegawai._nama_pekerja LIKE '%$namaFilter%' AND _tb_pekerja_pegawai._fungsi = '$fungsiFilter' AND _tb_pekerja_pegawai._kategori_pekerjaan = _tb_kategori_pekerjaan._id_kategori AND _tb_pekerja_pegawai._perusahaan = _tb_perusahaan._id_perusahaan AND _tb_pekerja_pegawai._status = '$statusFilter'");
			while($listPekerja = mysqli_fetch_assoc($dataPekerja)){
				$result[] = $listPekerja;
			}

			return $result;
		}

		//List Data Pekerja
        function listPekerjaAllbyFungandNama($nama, $fungsi){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);
			
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai, _tb_fungsi, _tb_kategori_pekerjaan WHERE _tb_pekerja_pegawai._fungsi = _tb_fungsi._id_fungsi AND _tb_pekerja_pegawai._kategori_pekerjaan = _tb_kategori_pekerjaan._id_kategori AND _tb_pekerja_pegawai._nama_pekerja LIKE '%$namaFilter%' AND _tb_pekerja_pegawai._fungsi = '$fungsiFilter'");
			while($listPekerja = mysqli_fetch_assoc($dataPekerja)){
				$result[] = $listPekerja;
			}

			return $result;
		}

		//List Data Pekerja Export
        function listPekerjaAllExp(){
			
			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai, _tb_fungsi, _tb_kategori_pekerjaan WHERE _tb_pekerja_pegawai._fungsi = _tb_fungsi._id_fungsi AND _tb_pekerja_pegawai._kategori_pekerjaan = _tb_kategori_pekerjaan._id_kategori");
			while($listPekerja = mysqli_fetch_assoc($dataPekerja)){
				$result[] = $listPekerja;
			}

			return $result;
		}

		function cekDCU($tgl, $bln, $thn){
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup WHERE DAY(_tgl_dcu) = '$tglFilter' AND MONTH(_tgl_dcu) = '$blnFilter' AND YEAR(_tgl_dcu) = '$thnFilter'");
			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}

		function cekNoDCU($tgl, $bln, $thn){
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _id_pekerja NOT IN(SELECT _id_pekerja FROM _tb_daily_checkup WHERE DAY(_tgl_dcu) = '$tglFilter' AND MONTH(_tgl_dcu) = '$blnFilter' AND YEAR(_tgl_dcu) = '$thnFilter')");
			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}

		function cekKeteranganDCU($tgl, $bln, $thn, $ket){
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$ketFilter = mysqli_real_escape_string($this->koneksi, $ket);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup WHERE DAY(_tgl_dcu) = '$tglFilter' AND MONTH(_tgl_dcu) = '$blnFilter' AND YEAR(_tgl_dcu) = '$thnFilter' AND _keterangan = '$ket'");
			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}

		function cekKeteranganDCUFungsi($fungsi, $tgl, $ket, $status){
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$ketFilter = mysqli_real_escape_string($this->koneksi, $ket);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_checkup._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_pekerja_pegawai._fungsi = _tb_fungsi._id_fungsi AND _tb_daily_checkup._tgl_dcu = '$tglFilter' AND _tb_daily_checkup._keterangan = '$ket' AND _tb_fungsi._id_fungsi = '$fungsiFilter' AND _tb_pekerja_pegawai._status = '$statusFilter'");
			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}
		
		//Cek DCU
		function cekDCUPekerja($id, $tgl, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup WHERE DAY(_tgl_dcu) = '$tglFilter' AND MONTH(_tgl_dcu) = '$blnFilter' AND YEAR(_tgl_dcu) = '$thnFilter' AND _id_pekerja = '$idFilter'");
			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}

		//Cek DCU
		function cekDCUPekerjaBln($id, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup WHERE MONTH(_tgl_dcu) = '$blnFilter' AND YEAR(_tgl_dcu) = '$thnFilter' AND _id_pekerja = '$idFilter'");
			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}


		//Get Data Pekerja
		function getDataPekerja($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataPekerja = mysqli_query($this->koneksi,"SELECT * FROM _tb_pekerja_pegawai WHERE _id_pekerja = '$idFilter'");
			$getDataPekerja = mysqli_fetch_assoc($dataPekerja);
			
			return $getDataPekerja;
		}

		//Get Data DCU Per Pekerja
		function getDataDCU($id, $tgl, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup WHERE DAY(_tgl_dcu) = '$tglFilter' AND MONTH(_tgl_dcu) = '$blnFilter' AND YEAR(_tgl_dcu) = '$thnFilter' AND _id_pekerja = '$idFilter'");
			$getDataDCU = mysqli_fetch_assoc($dataDCU);
			
			return $getDataDCU;
		}

		//Get Usia
		function usia($tgl){
			$tgl_lahir = $tgl;
			
			$batas = date('Y').'-'.date('m').'-'.date('d');

			$conTgl_lahir = new DateTime($tgl_lahir);
			$conBatas = new DateTime($batas);

			$y = $conBatas->diff($conTgl_lahir)->y;
			$m = $conBatas->diff($conTgl_lahir)->m;
			$d = $conBatas->diff($conTgl_lahir)->d;
			
			$selisih = $y.' Tahun '.$m.' Bulan '.$d.' Hari';
			return $selisih;
		}

		//Get Expired
		function exp($tgl){
			$tglBatas = $tgl;

			$conTgl= new DateTime(date('Y-m-d'));
			$conBatas = new DateTime($tglBatas);

			$m = $conBatas->diff($conTgl)->m;
			
			$selisih = $m." Bulan";
			return $selisih;
		}

		//Cek Data Visitor
        function cekJumlahVisitor(){
			$dataVisitor = mysqli_query($this->koneksi,"SELECT * FROM _tb_visitor");
			$cekJumlah = mysqli_num_rows($dataVisitor);
			
			return $cekJumlah;
		}
		//Cek Nomor Visitor
		function cekIDVisitor($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataVisitor = mysqli_query($this->koneksi,"SELECT * FROM _tb_visitor WHERE _id_visitor = '$idFilter'");
			$cekJumlah = mysqli_num_rows($dataVisitor);
			
			return $cekJumlah;
		}

		//Cek Data Visitor
        function cekVisitorbyInstansi($instansi){
			$instansiFilter = mysqli_real_escape_string($this->koneksi, $instansi);

			$dataVisitor = mysqli_query($this->koneksi,"SELECT * FROM _tb_visitor WHERE _instansi = '$instansiFilter'");
			$cekJumlah = mysqli_num_rows($dataVisitor);
			
			return $cekJumlah;
		}

		//Cek Data Visitor
        function cekVisitorbyNama($nama){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);

			$dataVisitor = mysqli_query($this->koneksi,"SELECT * FROM _tb_visitor WHERE _nama_visitor LIKE '%$namaFilter%'");
			$cekJumlah = mysqli_num_rows($dataVisitor);
			
			return $cekJumlah;
		}

		//Cek Data Visitor
        function cekVisitorbyInstansiandNama($instansi, $nama){
			$instansiFilter = mysqli_real_escape_string($this->koneksi, $instansi);
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			
			$dataVisitor = mysqli_query($this->koneksi,"SELECT * FROM _tb_visitor WHERE _instansi = '$instansiFilter' AND _nama_visitor LIKE '%$namaFilter%'");
			$cekJumlah = mysqli_num_rows($dataVisitor);
			
			return $cekJumlah;
		}

		//List Data Visitor By Instansi
        function listVisitorbyInstansi($instansi){
			$instansiFilter = mysqli_real_escape_string($this->koneksi, $instansi);
			
			$dataVisitor = mysqli_query($this->koneksi,"SELECT * FROM _tb_visitor, _tb_instansi WHERE _tb_visitor._instansi = _tb_instansi._id_instansi AND _tb_visitor._instansi = '$instansiFilter'");
			while($listVisitor = mysqli_fetch_assoc($dataVisitor)){
				$result[] = $listVisitor;
			}

			return $result;
		}

		//List Data Visitor By Nama
        function listVisitorbyNama($nama){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			
			$dataVisitor = mysqli_query($this->koneksi,"SELECT * FROM _tb_visitor, _tb_instansi WHERE _tb_visitor._instansi = _tb_instansi._id_instansi AND _tb_visitor._nama_visitor LIKE '%$namaFilter%'");
			while($listVisitor = mysqli_fetch_assoc($dataVisitor)){
				$result[] = $listVisitor;
			}

			return $result;
		}

		//List Data Visitor By Nama
        function listVisitorbyInstansiandNama($instansi, $nama){
			$instansiFilter = mysqli_real_escape_string($this->koneksi, $instansi);
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);
			
			$dataVisitor = mysqli_query($this->koneksi,"SELECT * FROM _tb_visitor, _tb_instansi WHERE _tb_visitor._instansi = _tb_instansi._id_instansi AND _tb_visitor._instansi = '$instansiFilter' AND _tb_visitor._nama_visitor LIKE '%$namaFilter%'");
			while($listVisitor = mysqli_fetch_assoc($dataVisitor)){
				$result[] = $listVisitor;
			}

			return $result;
		}

		//List Data Visitor
        function listVisitor($mulai, $halaman){
			$mulaiFilter = mysqli_real_escape_string($this->koneksi, $mulai);
			$halamanFilter = mysqli_real_escape_string($this->koneksi, $halaman);

			$dataVisitor = mysqli_query($this->koneksi,"SELECT * FROM _tb_visitor, _tb_instansi WHERE _tb_visitor._instansi = _tb_instansi._id_instansi LIMIT $mulaiFilter, $halamanFilter");
			while($listVisitor = mysqli_fetch_assoc($dataVisitor)){
				$result[] = $listVisitor;
			}

			return $result;
		}

		//List Data Visitor
        function listVisitorAll(){
			$dataVisitor = mysqli_query($this->koneksi,"SELECT * FROM _tb_visitor, _tb_instansi WHERE _tb_visitor._instansi = _tb_instansi._id_instansi");
			while($listVisitor = mysqli_fetch_assoc($dataVisitor)){
				$result[] = $listVisitor;
			}

			return $result;
		}

		//Get Data Visitor
		function getDataVisitor($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);

			$dataVisitor = mysqli_query($this->koneksi,"SELECT * FROM _tb_visitor WHERE _id_visitor = '$idFilter'");
			$getDataVisitor = mysqli_fetch_assoc($dataVisitor);
			
			return $getDataVisitor;
		}

		//Cek DCU Visitor
		function cekDCUVisitor($id, $tgl, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup_visitor WHERE DAY(_tgl_dcu) = '$tglFilter' AND MONTH(_tgl_dcu) = '$blnFilter' AND YEAR(_tgl_dcu) = '$thnFilter' AND _id_visitor = '$idFilter'");
			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}

		//Get Data DCU Per Visitor
		function getDataDCUVisitor($id, $tgl, $bln, $thn){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup_visitor WHERE DAY(_tgl_dcu) = '$tglFilter' AND MONTH(_tgl_dcu) = '$blnFilter' AND YEAR(_tgl_dcu) = '$thnFilter' AND _id_visitor = '$idFilter'");
			$getDataDCU = mysqli_fetch_assoc($dataDCU);
			
			return $getDataDCU;
		}

		//Cek Data Pengguna
        function cekDaftarPengguna(){
			
			$dataPengguna = mysqli_query($this->koneksi,"SELECT * FROM _tb_user");
			$cekJumlah = mysqli_num_rows($dataPengguna);
			
			return $cekJumlah;
		}

		//Cek Data Pengguna By Nama
        function cekPenggunabyName($nama){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);

			$dataPengguna = mysqli_query($this->koneksi,"SELECT * FROM _tb_user, _tb_pekerja_pegawai WHERE _tb_user._id_user = _tb_pekerja_pegawai._id_pekerja AND _tb_pekerja_pegawai._nama_pekerja LIKE '%$namaFilter%'");
			$cekJumlah = mysqli_num_rows($dataPengguna);
			
			return $cekJumlah;
		}

		//List Data Pengguna
        function listPengguna($mulai, $halaman){
			$mulaiFilter = mysqli_real_escape_string($this->koneksi, $mulai);
			$halamanFilter = mysqli_real_escape_string($this->koneksi, $halaman);

			$dataPengguna = mysqli_query($this->koneksi,"SELECT * FROM _tb_user, _tb_pekerja_pegawai WHERE _tb_user._id_user = _tb_pekerja_pegawai._id_pekerja LIMIT $mulaiFilter, $halamanFilter");
			while($listPengguna = mysqli_fetch_assoc($dataPengguna)){
				$result[] = $listPengguna;
			}

			return $result;
		}

		//List Data Pengguna
        function listPenggunabyName($nama){
			$namaFilter = mysqli_real_escape_string($this->koneksi, $nama);

			$dataPengguna = mysqli_query($this->koneksi,"SELECT * FROM _tb_user, _tb_pekerja_pegawai WHERE _tb_user._id_user = _tb_pekerja_pegawai._id_pekerja AND _tb_pekerja_pegawai._nama_pekerja LIKE '%$namaFilter%'");
			while($listPengguna = mysqli_fetch_assoc($dataPengguna)){
				$result[] = $listPengguna;
			}

			return $result;
		}

		//Cek DCU By Tanggal
        function cekDCUbyTgl($tgl, $bln, $thn, $status){
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup, _tb_pekerja_pegawai WHERE _tb_daily_checkup._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND DAY(_tb_daily_checkup._tgl_dcu) = '$tglFilter' AND MONTH(_tb_daily_checkup._tgl_dcu) = '$blnFilter' AND YEAR(_tb_daily_checkup._tgl_dcu) = '$thnFilter' AND _tb_pekerja_pegawai._status = '$statusFilter'");
			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}

		//Cek DCU By Tanggal
        function cekDCUbyTglAll($tgl, $bln, $thn){
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			
			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup, _tb_pekerja_pegawai WHERE _tb_daily_checkup._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND DAY(_tb_daily_checkup._tgl_dcu) = '$tglFilter' AND MONTH(_tb_daily_checkup._tgl_dcu) = '$blnFilter' AND YEAR(_tb_daily_checkup._tgl_dcu) = '$thnFilter'");
			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}

		//Cek DCU By Tanggal
        function cekDCUVisitorbyTglAll($tgl, $bln, $thn){
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			
			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup_visitor, _tb_visitor WHERE _tb_daily_checkup_visitor._id_visitor = _tb_visitor._id_visitor AND DAY(_tb_daily_checkup_visitor._tgl_dcu) = '$tglFilter' AND MONTH(_tb_daily_checkup_visitor._tgl_dcu) = '$blnFilter' AND YEAR(_tb_daily_checkup_visitor._tgl_dcu) = '$thnFilter'");
			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}

		//List Data DCU
        function listDCUAllbyDate($tgl, $bln, $thn, $status){
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_checkup._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND DAY(_tb_daily_checkup._tgl_dcu) = '$tglFilter' AND MONTH(_tb_daily_checkup._tgl_dcu) = $blnFilter AND YEAR(_tb_daily_checkup._tgl_dcu) = $thnFilter AND _tb_pekerja_pegawai._status = '$statusFilter' ORDER BY _tb_daily_checkup._waktu DESC");
			while($listDCU = mysqli_fetch_assoc($dataDCU)){
				$result[] = $listDCU;
			}

			return $result;
		}

		//List Data DCU
        function listDCUAllbyDateAll($tgl, $bln, $thn, $mulai, $halaman){
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$mulaiFilter = mysqli_real_escape_string($this->koneksi, $mulai);
			$halamanFilter = mysqli_real_escape_string($this->koneksi, $halaman);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup, _tb_pekerja_pegawai, _tb_fungsi, _tb_kategori_pekerjaan WHERE _tb_daily_checkup._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND _tb_pekerja_pegawai._kategori_pekerjaan = _tb_kategori_pekerjaan._id_kategori AND DAY(_tb_daily_checkup._tgl_dcu) = '$tglFilter' AND MONTH(_tb_daily_checkup._tgl_dcu) = '$blnFilter' AND YEAR(_tb_daily_checkup._tgl_dcu) = '$thnFilter' ORDER BY _tb_daily_checkup._waktu DESC LIMIT $mulaiFilter, $halamanFilter");
			while($listDCU = mysqli_fetch_assoc($dataDCU)){
				$result[] = $listDCU;
			}

			return $result;
		}

		//List Data DCU
        function listDCUVisitorbyDateAll($tgl, $bln, $thn, $mulai, $halaman){
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$thnFilter = mysqli_real_escape_string($this->koneksi, $thn);
			$mulaiFilter = mysqli_real_escape_string($this->koneksi, $mulai);
			$halamanFilter = mysqli_real_escape_string($this->koneksi, $halaman);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup_visitor, _tb_visitor, _tb_instansi WHERE _tb_daily_checkup_visitor._id_visitor = _tb_visitor._id_visitor AND _tb_instansi._id_instansi = _tb_visitor._instansi AND DAY(_tb_daily_checkup_visitor._tgl_dcu) = '$tglFilter' AND MONTH(_tb_daily_checkup_visitor._tgl_dcu) = '$blnFilter' AND YEAR(_tb_daily_checkup_visitor._tgl_dcu) = '$thnFilter' ORDER BY _tb_daily_checkup_visitor._waktu DESC LIMIT $mulaiFilter, $halamanFilter");
			while($listDCU = mysqli_fetch_assoc($dataDCU)){
				$result[] = $listDCU;
			}

			return $result;
		}

		//Jumlah DCU Fungsi Perhari
		function jumlahDCUFungsiDay($tgl, $fungsi, $status){
			$tglFilter = mysqli_real_escape_string($this->koneksi, $tgl);
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);
			$statusFilter = mysqli_real_escape_string($this->koneksi, $status);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup, _tb_pekerja_pegawai, _tb_fungsi WHERE _tb_daily_checkup._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND _tb_fungsi._id_fungsi = _tb_pekerja_pegawai._fungsi AND _tb_daily_checkup._tgl_dcu = '$tglFilter' AND _tb_pekerja_pegawai._fungsi = '$fungsiFilter' AND _tb_pekerja_pegawai._status = '$statusFilter'");

			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}

		//Jumlah DCU Fungsi Perhari
		function jumlahDCUFungsiMonth($bln, $fungsi){
			$blnFilter = mysqli_real_escape_string($this->koneksi, $bln);
			$fungsiFilter = mysqli_real_escape_string($this->koneksi, $fungsi);

			$dataDCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_daily_checkup, _tb_pekerja_pegawai WHERE _tb_daily_checkup._id_pekerja = _tb_pekerja_pegawai._id_pekerja AND MONTH(_tb_daily_checkup._tgl_dcu) = '$blnFilter' AND _tb_pekerja_pegawai._fungsi = '$fungsiFilter'");

			$cekJumlah = mysqli_num_rows($dataDCU);
			
			return $cekJumlah;
		}

		//Status MCU
		function statusMCU($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			
			$dataMCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_mcu WHERE _id_pekerja = '$idFilter'");

			$cekJumlah = mysqli_num_rows($dataMCU);
			
			return $cekJumlah;
		}

		//Get Data MCU
		function getDataMCU($id){
			$idFilter = mysqli_real_escape_string($this->koneksi, $id);
			
			$dataMCU = mysqli_query($this->koneksi,"SELECT * FROM _tb_mcu WHERE _id_pekerja = '$idFilter'");
			$getDataMCU = mysqli_fetch_assoc($dataMCU);
			
			return $getDataMCU;
		}






    }

?>