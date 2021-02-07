<!DOCTYPE html>
<html>
<head>
<title>Mendambah Data</title>
</head>
<body>
	<h1>MENAMBAHKAN DATA</h1>
	<table>
		<form action="TambahDataP.php" method="POST" enctype="multipart/form-data">
			<tr>
				<td><label for="nama">Nama </label></td>
				<td>:</td>
				<td><input type="text" name="nama" id="nama" required></td>
			</tr>
			<tr>
				<td><label for="nik">Nik </label></td>
				<td>:</td>
				<td><input type="text" name="nik" id="nik" required></td>
			</tr>
			<tr>
				<td><label for="alamat">Alamat </label></td>
				<td>:</td>
				<td><textarea rows="4" name="alamat" id="alamat" required></textarea></td>
			</tr>
			<tr>
				<td><label for="gambar">GAMBAR </label></td>
				<td>:</td>
				<td><input type="file" name="gambar" id="gambar" ></td>
			</tr>
			<tr>
				<td><label for="jumlah">Jumlah </label></td>
				<td>:</td>
				<td><input type="text" name="jumlah" id="jumlah" required></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><button type="submit" name="submit">Tambah</button></td>
			</tr>
		</form>
	</table>
</body>
</html>