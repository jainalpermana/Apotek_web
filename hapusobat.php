<?php

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "apotek_web");

$kode_obat = $_GET ['kode_obat'];

echo $kode_obat;

$carifoto = "SELECT foto FROM barang WHERE kode_obat = '$kode_obat'";


$hapus = "DELETE  FROM barang WHERE kode_obat = '$kode_obat' ";
//mencari foto
$hasilfoto = mysqli_query($konek,$carifoto);
$foto = mysqli_fetch_array($hasilfoto);

//menghapus foto
unlink("img/$foto[foto]");

$hasil = mysqli_query($konek,$hapus);

if ($hasil) {
	header ("location:index.php");
}else{
	header ("location:input.php");
}

?>