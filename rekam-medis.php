<?php
include 'koneksi.php';

$sql = "select * from rekam_medis";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

$stmtc = $connect->prepare($sql);
$stmtc->setFetchMode(PDO::FETCH_OBJ);
$stmtc->execute();
if($stmtc->execute() > 0){
?>
<div class="cell auto-size margin50" id="cell-content">
	<h1 class="text-light">Rekam Medis<span class="mif-users place-right"></span></h1>
    <hr class="bold bg-gray">
	
	<br><br><br>
	<table class="table highlight border bordered bg-white">
		<thead>
			<tr>
				<th>No</th>
				<th>NO Rekam Medis</th>
				<th>ID Pasien</th>
				<th>Nama Pasien</th>
				<th>Nama Dokter</th>
				<th>Tindakan</th>
				<th>Diagnosa</th>
				<th>Obat</th>
				<th>Keterangan</th>		
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
				    <td><?= $q->no_rekmed; ?></td>
					<td><?= $q->id_pasien; ?></td>
					<td><?= $q->nama; ?></td>
					<td><?= $q->nama_dokter; ?></td>
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
</script>
<?php
	} else {
}
?>