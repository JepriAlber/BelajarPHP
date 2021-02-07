<!DOCTYPE html>
<html>
<head>
<title>Halaman Register</title>
	<style>
		label{
			display:block;
		}
	</style>
</head>
<body>
<h1>Halaman Register</h1>
	<form action="DaftarP.php" method="POST">
		<ul>
			<li>
				<label for="username">User Name :</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password">
			</li>
			
			<li>
				<label for="password2">Konfirmasi Password :</label>
				<input type="password" name="password2" id="password2">
			</li>
			<li>
				<button type="submit" name="daftar">Register</button>
			</li>
		</ul>
	</form>
</body>
</html>