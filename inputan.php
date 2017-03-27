<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Apotek Web</title>
</head>
<body>
<h2>Masukan Data Penjualan : </h2>
<form method="POST" action="input.php" enctype="multipart/form-data">
	Nama Obat : <input type="text" name="nama_obat"><br>
	Upload Foto <input type="file" name="upfile"><br>
	Jenis Obat : <input type="text" name="jenis_obat"><br>
	Jumlah Barang : <input type="text" name="jumlah_obat"><br>
	Harga       : <input type="text" name="harga"><br>
	Total Harga :  <input type="text" name="total_harga"><br>

<input type="submit" value="Kirim"><br>
</form>



	
</body>
</html>