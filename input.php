<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "apotek_web");
//ambil data dari form
$kode_obat = $_POST['kode_obat'];
$no = $_POST['nama_obat'];
$lokasifile = $_FILES['upfile']['tmp_name'];
$namafile = $_FILES['upfile']['name'];
$sizefile = $_FILES['upfile']['size'];
$jeno = $_POST['jenis_obat'];
$jumo = $_POST['jumlah_obat'];
$ha = $_POST['harga'];
$th = $_POST['total_harga'];

//tujuan
$tujuan = "img/$namafile";
//perintah upload
$upload = move_uploaded_file($lokasifile, $tujuan);

$input = "INSERT INTO barang(kode_obat,nama_obat,foto,jenis_obat,jumlah_obat,harga,total_harga) VALUES ('$kode_barang','$no','$namafile','$jeno','$jumo','$ha','$th')";
$hasil = mysqli_query($konek,$input);
//apabila query untuk input data benar
if($hasil OR $upload)
{
	header("location:index.php");
}else{
	header("location:input.php");
}
?>