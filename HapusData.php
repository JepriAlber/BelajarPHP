<?php
	require 'koneksi.php';
	
	$id=$_GET["id"];
	if(hapus($id)>0){
		echo"<script>
		alert('Data Berhasil DIHAPUS');
		document.location.href='TampilData.php';
		</script>
		";
	}
	else{
		echo"<script>
		alert('Data GAGAL DIHAPUS');
		document.location.href='TampilData.php';
		</script>
		";
	}
?>