<?php
error_reporting(E_ALL ^ (E_NOTICE));
$batas = 20;
$halaman = $_GET['halaman'];

if (empty($halaman)) {
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi = ($halaman - 1) * $batas;
}

$konek = mysqli_connect("localhost", "root", "", "apotek_web");

if (isset($_GET['cari'])) {
	$q = $_GET['s'];
	$tampil = "SELECT * FROM barang WHERE nama_obat LIKE '%$q%' OR jenis_obat LIKE '%$q%' OR jumlah_obat LIKE '%$q%' OR harga LIKE '%$q%' OR total_harga LIKE '%$q%' ORDER BY nama_obat LIMIT $posisi, $batas";
}else{
	//query menampilkan data
	$tampil = "SELECT * FROM barang LIMIT $posisi, $batas";
}


$hasil = mysqli_query($konek,$tampil);

$jmlhasil = mysqli_num_rows($hasil);

?>


<h3>Data Penjualan Obat</h3>
<hr>
<form action="index.php" method="GET">
	<input type="text" name="s">
	<input type="submit" value="CARI" name="cari">

</form>
<a href="inputan.php">Create Data Penjualan</a>
<hr>
<table border="1">
	<tr>
		<th>nama obat</th>
		<th>jenis obat</th>
		<th>jumlah obat</th>                                                                                                 
		<th>harga</th>
		<th>total harga</th>
		<th>aksi</th>
	</tr>
<?php

if ($jmlhasil < 1) {
	echo "<tr>";
	echo "<td colspan='5'>data yang ada cari tidak ada</td>";
	echo "</tr>";
}else{
	//penomoran
	$kode_obat = $posisi + 1;

	//tampil nama,jenis,jumlah,tanggal,keterangan barang
	while($data=mysqli_fetch_array($hasil)){
		echo "<tr>";
		echo "<td>$data[nama_obat]</td>";;
		echo "<td>$data[jenis_obat]</td>";
		echo "<td>$data[jumlah_obat]</td>";
		echo "<td>$data[harga]</td>";
		echo "<td>$data[total_harga]</td>";
		echo "<td><a href='hapusobat.php?kode_obat=$data[kode_obat]'>hapus</a> |
				  <a href='editobat.php?kode_obat=$data[kode_obat]'>edit</a> |
				  <a href='detailobat.php?kode_obat=$data[kode_obat]'>detail</a></td>";
		echo "</tr>";
		$data++;

	}

}


?>
</table>

<?php
//untuk pagging
$tampil2 = "SELECT * FROM barang";
$hasil2 = mysqli_query($konek, $tampil2);
$jmldata = mysqli_num_rows($hasil2);
$jmlhalaman = ceil($jmldata / $batas);

echo " jumlah data : $jmldata <br>";

for ($i=1; $i <= $jmlhalaman; $i++) { 
	if ($i != $halaman) {
		echo "<a href=$_SERVER[PHP_SELF]?halaman=$i> $i </a>";
	}else{
		echo " <b> $i </b>";
	}
}

?>
