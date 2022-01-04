<!DOCTYPE html>
<html>
<head>
	<title>Import Excel Ke MySQL dengan PHP</title>
</head>
<body>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}

		p{
			color: green;
		}
	</style>
	<h2>IMPORT EXCEL KE MYSQL DENGAN PHP</h2>

	<?php 
	if(isset($_GET['berhasil'])){
		echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
	}
	?>

	<a href="upload.php">IMPORT DATA</a>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Id</th>
			<th>No Agunan</th>
			<th>Nama</th>
			<th>ALamat</th>
			<th>Agunan</th>
			<th>Detail Agunan</th>
			<th>Realisasi</th>
			<th>Lunas</th>
			<th>Keterangan</th>
			<th>No Hp</th>
			<th>TTD</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no=1;
		$data = mysqli_query($koneksi,"select * from daftaragunan");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<th><?php echo $no++; ?></th>
				<th><?php echo $d['id']; ?></th>
				<th><?php echo $d['nomorAgunan']; ?></th>
				<th><?php echo $d['nama']; ?></th>
				<th><?php echo $d['alamat']; ?></th>
				<th><?php echo $d['agunan']; ?></th>
				<th><?php echo $d['detailAgunan']; ?></th>
				<th><?php echo $d['realisasi']; ?></th>
				<th><?php echo $d['lunas']; ?></th>
				<th><?php echo $d['keterangan']; ?></th>
				<th><?php echo $d['noHp']; ?></th>
				<th><?php echo $d['ttd']; ?></th>
			</tr>
			<?php 
		}
		?>

	</table>

</body>
</html>