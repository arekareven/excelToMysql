<!-- import excel ke mysql -->

<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['fileagunan']['name']) ;
move_uploaded_file($_FILES['fileagunan']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['fileagunan']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['fileagunan']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$id     = $data->val($i, 1);
	$nomorAgunan   = $data->val($i, 2);
	$nama  = $data->val($i, 3);
	$alamat   = $data->val($i, 4);
	$agunan   = $data->val($i, 5);
	$detailAgunan   = $data->val($i, 6);
	$realisasi   = $data->val($i, 7);
	$lunas   = $data->val($i, 8);
	$keterangan   = $data->val($i, 9);
	$noHp   = $data->val($i, 10);
	$ttd   = $data->val($i, 11);

	if($id != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into daftaragunan values('$id','$nomorAgunan','$nama','$alamat','$agunan','$detailAgunan','$realisasi','$lunas','$keterangan','$noHp','$ttd')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['fileagunan']['name']);

// alihkan halaman ke index.php
header("location:index.php?berhasil=$berhasil");
?>