<?php

// koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "apotek_web");


$kode_obat = $_GET['kode_obat'];


$hapus = "SELECT * FROM barang WHERE kode_obat = '$kode_obat'";

$hasil = mysqli_query($konek,$hapus);

$data = mysqli_fetch_array($hasil);

$foto = $data['foto'];
if ($foto == NULL) {
	$foto = "bola.jpeg";
}

?>

<h3>Edit Obat</h3>
<form method="POST" action="prosesupdate.php" enctype="multipart/form-data">
	<img src="img/<?php echo $foto;?>" width="100px">

	<input type="hidden" value="<?php echo $data['foto'];?>" name="fotolama">

	<input type="file" name="pp">
	<br>
	
	Nama_Obat : <input type="text" name="nama_obat" value="<?php echo $data['nama_obat']; ?>"><br>

	<input type="hidden" name="kode_obat" value="<?php echo $data['kode_obat']; ?>">

	Jenis_Obat: <input type="text" name="jenis_obat" value="<?php echo $data['jenis_obat']; ?>"><br>

	Jumlah_Obat : <input type="text" name="jumlah_obat" value="<?php echo $data['jumlah_obat']; ?>"><br>

	Harga : <input type="text" name="harga" value="<?php echo $data['harga']; ?>"><br>

	Total_Harga : <input type="text" name="total_harga" value="<?php echo $data['total_harga']; ?>"><br>

<input type="submit" value="Kirim"><br>
</form>
