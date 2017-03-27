<?php
$konek = mysqli_connect("localhost", "root", "", "apotek_web");;

$kode_obat = $_GET['kode_obat'];
error_reporting(E_ALL ^ (E_NOTICE));

$perintah = "SELECT * FROM barang WHERE kode_obat = '$kode_obat'";

$hasil = mysqli_query($konek, $perintah);

$data = mysqli_fetch_array($hasil);

$foto = $data['foto'];

if ($foto == NULL) {
	$foto = "bola.jpeg";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h1>DETAIL Obat<?php echo $data['nama_obat'];?></h1>
<a href="index.php">KEMBALI</a>
<table border="1">
	<tr>
		<td rowspan="7"><img src="img/<?php echo $foto;?>" alt="" width="150"></td>
	</tr>
	<tr>
		<td>Nama Obat</td>
		<td><?php echo $data['nama_obat'];?></td>
	</tr>
	<tr>
		<td>Jenis Obat</td>
		<td><?php echo $data['jenis_obat'];?></td>
	</tr>
	<tr>
		<td>Jumlah Obat</td>
		<td><?php echo $data['jumlah_obat'];?></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td><?php echo $data['harga'];?></td>
	</tr>
	<tr>
		<td>Total Harga</td>
		<td><?php echo $data['total_harga'];?></td>
	</tr>

</table>