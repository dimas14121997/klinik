<?php
include 'koneksi.php';

$sql = "select * from daftar_pasienn where nama_dokter = 'lena' ";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

$stmtc = $connect->prepare($sql);
$stmtc->setFetchMode(PDO::FETCH_OBJ);
$stmtc->execute();
if($stmtc->execute() > 0){
?>
<div class="cell auto-size margin50" id="cell-content">
	<h1 class="text-light">Tindakan <span class="mif-users place-right"></span></h1>
    <hr class="bold bg-gray">
	
	<br><br><br>
	<table class="table highlight border bordered bg-white">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Pasien</th>
				<th>Nama Pasien</th>
				<th>Tanggal Daftar</th>
				<th>Tanggal Lahir</th>
				<th>Alamat</th>
				<th>Keterangan</th>
				<th>Dokter Pemeriksa</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 0;
				foreach ($stmtc as $q) {
					$no++;        
			?>				
				<tr>
					<td><?= $no ?></td>
					<td><?= $q->id_pasien; ?></td>
					<td><?= $q->nama; ?></td>
					<td><?= date("d F Y", strtotime($q->tanggal_daftar)); ?></td>
					<td><?= date("d F Y", strtotime($q->tanggal_lahir)); ?></td>
					<td><?= $q->alamat; ?></td>
					<td><?= $q->keterangan; ?></td>
					<td><?= $q->nama_dokter; ?></td>
					<td><center>
						<a href="home-admin.php?module=periksa&id_pasien=<?= $q->id_pasien; ?>" ><u>Periksa</u>
						</a>
						</center>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<script>
	$(document).ready(function(){
		$(".table").dataTable();
	});
	function deletePasien(nomor_pendaftaran){
		if (confirm('Hapus Data Pasien?')) {
			window.location.href = "hapusumum.php?nomor_pendaftaran="+nomor_pendaftaran+"&action=del";
		}
	}
</script>
<?php
	} else {
}
?>