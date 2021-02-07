<?php
 $conn=mysqli_connect("localhost","root","","hibah");
 
 function query($query){
	 global $conn;
	 $result=mysqli_query($conn,$query);
	 $rows=[];
	 while($row=mysqli_fetch_assoc($result)){
		 $rows[]=$row;
	 }
	 return $rows;
 }
 
 function tambah($data){
	 global $conn;
	 $nama=htmlspecialchars($data["nama"]);
	 $nik=htmlspecialchars($data["nik"]);
	 $alamat=htmlspecialchars($data["alamat"]);
	 	
	 $jumlah=htmlspecialchars($data["jumlah"]);
	 //upload gambar
	 $gambar= upload();
		if(!$gambar){
			return false;
		}
		
		$query="
		INSERT INTO bantuan VALUES
		('','$nama','$nik','$alamat','$gambar','$jumlah')
		";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
 }
 
 function upload(){
	 $namaFile=$_FILES['gambar']['name'];
	 $ukuranFile=$_FILES['gambar']['size'];
	 $error=$_FILES['gambar']['error'];
	 $tmpName=$_FILES['gambar']['tmp_name'];
	 
	 //cek tidak aada gamabar yang di upload
	 
	 if($error===4){
		 echo"<script>
		 alert('Pilih Terlebih Dahulu Gambar!!');
		 </script>";
		 return false;
	 }
	 
	 //cek apakah yang di upload gambar atau tidak
	 $ekstensiGambarValid =['jpg','jpeg','png'];
	 $ekstensiGambar = explode('.',$namaFile);
	 $ekstensiGambar = strtolower(end($ekstensiGambar));
	 
	 if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
		  echo"<script>
		 alert('Yang Anda Upload Bukan Gambar');
		 </script>";
		 return false;
	 }
	 
	 //cek untuk ukuran gambar
	 if($ukuranFile>1000000){
		   echo"<script>
		 alert('Ukuran Gambar Terlalu Besar!');
		 </script>";
		 return false;
	 }
	
	//lolos pengecekan
	//generate nama baru
	$namaFileBaru = uniqid();
	$namaFileBaru.='.';
	$namaFileBaru.=$ekstensiGambar;
	
	
	move_uploaded_file($tmpName,'gambar/'.$namaFileBaru);
	return $namaFileBaru;
	
 }
 
 function hapus($id){
	 global $conn;
	 mysqli_query($conn,"DELETE FROM bantuan WHERE id = $id");
	 return mysqli_affected_rows($conn);
 }
 
 
 
 function ubah($data){
	 global $conn;
	 $id= $data["id"];
	 $nama=htmlspecialchars($data["nama"]);
	 $nik=htmlspecialchars($data["nik"]);
	 $alamat=htmlspecialchars($data["alamat"]);
	 $jumlah=htmlspecialchars($data["jumlah"]);
	 $gambarLama=htmlspecialchars($data["gambarLama"]);
	 //cek apakah user pilih gambar baru atau tidak
	 
	 if($_FILES['gambar']['error']==4){
		 $gambar=$gambarLama;
	 }else
	 {
		  $gambar=upload();
	 }
	
	 
		$query="
		UPDATE bantuan SET
		nama='$nama',
		nik='$nik',
		alamat='$alamat',
		gambar='$gambar',
		jumlah='$jumlah'
		WHERE id = $id
		";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
 }
 function cari($key){
	 $query="SELECT * FROM bantuan
	 WHERE
	 nama LIKE '%$key%' or nik LIKE '%$key%'
	 ";
	return query($query);
 }
 
 function register($data){
	 global $conn;
	 $username = strtolower(stripslashes($data["username"]));
	 $password =mysqli_real_escape_string($conn,$data["password"]);
	 $password2 =mysqli_real_escape_string($conn,$data["password2"]);
	 
	 // cek apakah username sudah ada atau tidak
	 $result=mysqli_query($conn,"SELECT username FROM user
	 WHERE username = '$username'");
	 if(mysqli_fetch_assoc($result)){
		 echo"<script>
			alert('User Sudah Terdaftar');
			document.location.href='Daftar.php';
			</script>
			";
			return false;
	 }
	 
	 
	 //komfirmasi pass
	 if($password !== $password2){
		echo"<script>
			alert('Konfirmasi tidak sesuai');
			
			</script>
			";
		return false;
	 }
	 
	 //mengenkripsi password
	 $password = password_hash($password,PASSWORD_DEFAULT);
	 mysqli_query($conn,"INSERT INTO user VALUES('','$username','password')");
	 return mysqli_affected_rows($conn);
	 //tambah user baru
 }
?>