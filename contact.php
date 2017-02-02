<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Website Saya</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="tema.css">
	<link rel="stylesheet" type="text/css" href="mobile.css">
</head>
<body>
	<header>
		<img class="logo" src="images/logo.png">
	</header>

	<nav id="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</nav>

	<section id="content" class="container">

		<h2 class="judul">Kontak Kami</h2>
		<div id="form-contact">
			<form method="post">
				<div class="form-row">
					<label for="nama">Nama</label>
					<input type="text" name="nama">	
				</div>
				<div class="form-row">
					<label for="telp">No Telp</label>
					<input type="text" name="telp">	
				</div>
				<div class="form-row">
					<label for="pesan">Pesan</label>
					<textarea name="pesan"></textarea>
				</div>
				<button type="submit" name="submit">Kirim</button>
			</form>
			<?php

			if (isset($_POST['submit']))
			{
				try {
					
					$nama = $_POST['nama'];
					$telp = $_POST['telp'];
					$pesan = $_POST['pesan'];

					$sql_insert = "INSERT INTO `kontak` (`nama`,`telp`,`pesan`) VALUES (?,?,?)";
					$query = $pdo->prepare($sql_insert);
					$query->bindParam(1, $nama);
					$query->bindParam(2, $telp);
					$query->bindParam(3, $pesan);
					$query->execute();

					echo "<h3>Terima kasih telah mengontak kami</h3>";

				} catch(PDOException $e){
					echo "<h3>Gagal mengontak karena: ".$e->getMessage()."</h3>";
				}
			}
			?>
		</div>

	</section>

	<footer id="footer">
		<h3 class="title">Contact Me</h3>
		<p>
			+62 812 345 678 90<br />
			myemail@gmail.com
		</p>
		<div class="copyright">Copyright &copy; Websaya.com. All Right Reserved</div>
	</footer>
</body>
</html>