<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
				
		//Mendapatkan Nilai Variable
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//Pembuatan Syntax SQL
	$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		
		//Import File Koneksi database
		require_once('../config.php');
		
		$r = mysqli_query($con,$sql);

		$result = array();

		while($row = mysqli_fetch_array($r)){
		
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($result,array(
		"id"=>$row['id'],
		"name"=>$row['nama'],
		"alamat"=>$row['alamat'],
		"rtrw"=>$row['rtrw'],
		"kelurahan"=>$row['kelurahan'],
		"kecamatan"=>$row['kecamatan']
		));
		}
	
	//Menampilkan Array dalam Format JSON
	echo json_encode(array('result'=>$result));
		
		mysqli_close($con);
	}
?>
