<?php
	require 'koneksi.php';
	
	$id=$_GET["id"];
 $u= query("SELECT * FROM bantuan Where id = $id")[0];
 
 
?>
<html>
<head>
<title>Mendambah Data</title>
</head>
<body>
	<h1>MERUBAH DATA</h1>
		<form action="UbahDataP.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?=$u["id"];?>">
		<input type="hidden" name="gambarLama" value="<?=$u["gambar"];?>">
			<ul>
				<li><label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?=$u["nama"];?>">
				</li>
			
				<li><label for="nik">Nik :</label>
				<input type="text" name="nik" id="nik" required value="<?=$u["nik"];?>">
				</li>
				
				<li><label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat" required value="<?=$u["alamat"];?>">
				</li>
			
				<li><label for="gambar">Gambar :</label>
				<br><img src ="gambar/<?=$u['gambar'];?> "width="80"></br>
				<input type="file" name="gambar" id="gambar">
				</li>
				
				<li><label for="jumlah">Jumlah :</label>
				<input type="text" name="jumlah" id="jumlah" required value="<?=$u["jumlah"];?>">
				</li>
			
				<li><button type="submit" name="submit">EDIT</button></li>
			</ul>
		</form>
</body>
</html>