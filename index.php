<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>

	<title>Website saya</title>

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

	<div id="slider"></div>

	<section id="herotext">
		<h1>Welcome to My Website</h1>
		<h3>Here's you will find more about me</h3>
	</section>

	<section id="content" class="container">
		
		<?php

		$sql_select = "SELECT * FROM `artikel` WHERE `id` = ?";
		$query1 = $pdo->prepare($sql_select);
		$query1->execute(array(1));
		$row = $query1->fetch();
		?>
		<article id="artikel">
			<h2 class="judul"><?php echo $row['judul']; ?></h2>
			<figure>
				<img src="images/jalanan.jpg" alt="Jalan Sepi London" width="390" height="244">
				<figcaption>Jalan Sepi, London</figcaption>
			</figure>
			<div class="isi-artikel">
				<p><?php echo $row['isi']; ?></p>
				<a href="detail.php?id=<?php echo $row['id']; ?>">Read More</a>
			</div>
		</article>

		<aside id="sidebar">
		<?php

		$sql_select_artikel = "SELECT * FROM `artikel` WHERE `id` != ? LIMIT 0,2";
		$query2 = $pdo->prepare($sql_select_artikel);
		$query2->execute(array(1));
		$row2 = $query2->fetchAll();

		foreach ($row2 as $data) {
		?>
			<div class="item">
				<h3 class="title"><?php echo $data['judul']; ?></h3>
				<p class="description"><?php echo $data['isi']; ?></p>
				<a class="readmore" href="detail.php?id=<?php echo $data['id']; ?>">Read More</a>
			</div>
		<?php } ?>

		</aside>

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