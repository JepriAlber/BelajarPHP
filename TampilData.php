<?php
	require 'koneksi.php';
	
	$tampil = query("SELECT * FROM bantuan ORDER BY id ASC");
	//jika tombol cari di klik 
	if(isset($_POST["cari"])){
		$tampil=cari($_POST["key"]);
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Data Hibah</title>
<body>
	<h1>DAFTAR HIBAH</h1>
		<a href="TambahData.php">Tambah Data</a>
		<br></br>
		
			<form action="" method="POST">
			 <input type ="text" name="key" size="40" autofocus placeholder="masukan nik atau nama.." autocomplete="off">
			 <button type="submit" name="cari">cari dong~</button>
			</form>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Aksi</th>
			<th>Nama</th>
			<th>Nik</th>
			<th>Alamat</th>
			<th>Gambar</th>
			<th>Jumlah</th>
		</tr>
		<?php $i=1; ?>
		<?php foreach($tampil as $show): ?>
		<tr>
			<td><?=	$i; ?></td>
			<td>
				<a href="UbahData.php?id=<?=$show["id"];?>">Edit || </a>
				<a href="HapusData.php?id=<?=$show["id"];?>">DELETE</a>
			</td>
			<td><?=$show["nama"]; ?></td>
			<td><?=$show["nik"]; ?></td>
			<td><?=$show["alamat"]; ?></td>
			<td><img src="gambar/<?=$show["gambar"];?>" width="100"></td>
			<td><?=$show["jumlah"]; ?></td>
			<?php $i++;?>
			<?php endforeach;?>
		</tr>
	</table>
</body>
</head>
</html>