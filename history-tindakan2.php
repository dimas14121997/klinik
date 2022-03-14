<?php
include 'koneksi.php';

$sql = "select id_pasien,tindakan,diagnosa,obat,keterangan from historry_tindakan where nama_dokter = 'lena' ";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

$stmtc = $connect->prepare($sql);
$stmtc->setFetchMode(PDO::FETCH_OBJ);
$stmtc->execute();
if($stmtc->execute() > 0){
?>
<div class="cell auto-size margin50" id="cell-content">
	<h1 class="text-light">History Tindakan <span class="mif-users place-right"></span></h1>
    <hr class="bold bg-gray">
	
	<br><br><br>
	<table class="table highlight border bordered bg-white">
		<thead>
			<tr>
				<th>No.</th>
				<th>ID Pasien</th>
				<th>Tindakan</th>
				<th>Diagnosa</th>
				<th>Obat</th>
				<th>Keterangan</th>
				<th>
					<center>
						<a href="home-admin.php?module=editumum&nomor_pendaftaran=<?= $q->nomor_pendaftaran; ?>" >
							<span class="/image/ceklis"></span>
						</a>
						
					</center>

					

				</th>
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
					<td><?= $q->tindakan; ?></td>
					<td><?= $q->diagnosa; ?></td>
					<td><?= $q->obat; ?></td>
					<td><?= $q->keterangan; ?></td>

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