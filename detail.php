<?php

include 'db.php';

$id = $_GET['id'];

$sql_select = "SELECT * FROM `artikel` WHERE id = ?";
$query = $pdo->prepare($sql_select);
$query->execute(array($id));
$row = $query->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Artikel | <?php echo $row['judul']; ?></title>
</head>
<body>

<h1><?php echo $row['judul']; ?></h1>
<p><?php echo $row['isi']; ?></p>

</body>
</html>