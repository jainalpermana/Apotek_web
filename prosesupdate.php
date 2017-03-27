<?php

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "apotek_web");
//ambil variabel yang dikirim dari form
$kode_obat = $_POST['kode_obat'];

$lokasifoto = $_FILES['pp']['tmp_name'];
$namafoto = $_FILES['pp']['name'];
$fotolama = $_POST['fotolama'];

$no = $_POST['nama_obat'];
$jeno = $_POST['jenis_obat'];
$jumo = $_POST['jumlah_obat'];
$harga = $_POST ['harga'];
$th = $_POST['total_harga'];

if ($namafoto != NULL) {
	//hapus foto
	unlink("img/$fotolama");
	//upload foto baru
	$tujuan = "img/$namafoto";
	move_uploaded_file($lokasifoto, $tujuan);

	$foto = $namafoto;
}else{
	$foto = $fotolama;
}

$update = "UPDATE barang SET nama_obat= '$no',foto ='$foto',jenis_obat='$jeno', jumlah_obat='$jumo',harga = '$harga',total_harga = '$th'
	WHERE kode_obat ='$kode_obat'";

$hasil = mysqli_query($konek,$update);

if($hasil){
header("location:index.php");
}else{
echo "Update data barang gagal";
}

?>