<?php
 require 'koneksi.php';
if(isset($_POST["submit"])){
	
	
	if(tambah($_POST)>0){
		echo"<script>
		alert('Data Berhasil Ditambah');
		document.location.href='TampilData.php';
		</script>
		";
	}else{
		echo"<script>
			alert('Data Gagal Ditambah');
		document.location.href='TampilData.php';
		</script>
		";
	}
}
?>