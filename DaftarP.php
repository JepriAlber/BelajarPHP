<?php
 require 'koneksi.php';
	if(isset($_POST['daftar'])){
		
		if(register($_POST)>0){
			echo"<script>
			alert('User Baru Berhasil Ditambah');
			document.location.href='Daftar.php';
			</script>
			";
		}
		else
		{
			echo mysqli_error($conn);
		}	
		
	}
?>