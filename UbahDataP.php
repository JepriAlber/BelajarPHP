<?php
 require 'koneksi.php';
if(isset($_POST["submit"])){
	if(ubah($_POST)>0){
	echo"<script>
		alert('Data Berhasil Di EDIT');
		document.location.href='TampilData.php';
		</script>
		";
 	}else{
	echo"<script>
		alert('Data Gagal Di EDIT');
		document.location.href='TampilData.php';
	</script>
		";
	}
}
?>