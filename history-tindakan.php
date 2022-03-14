<?php
include 'koneksi.php';
if($_SESSION["level"] == "dokter1") {
$sql = "select * from historry_tindakan where nama_dokter = 'dhuha' ";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
} elseif($_SESSION["level"] == "dokter2") {
$sql = "select * from historry_tindakan where nama_dokter = 'lena' ";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
} elseif($_SESSION["level"] == "superadmin") {
$sql = "select * from historry_tindakan";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
}
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
				<th>Nama Pasien</th>
				<?php if($_SESSION["level"] == "superadmin" ) {?>
				<th>Nama Dokter</th>
				<?php} else {?>
				<?php } ?>
				<th>Tindakan</th>
				<th>Diagnosa</th>
				<th>Obat</th>
				<th>Keterangan</th>
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
					<?php if($_SESSION["level"] == "superadmin" ) {?>
				    <td><?= $q->nama_dokter; ?></td>
					<?php} else {?>
					<?php } ?>
					<td><?= $q->tindakan; ?></td>
					<td><?= $q->diagnosa; ?></td>
					<td><?= $q->obat; ?></td>
					<td><?= $q->keterangan; ?></td>
					<td><center>
						<a href="home-admin.php?module=edit-history&nomor=<?= $q->nomor; ?>" >
							<span class="mif-pencil mif-lg"></span>
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
</script>
<?php
	} else {
}
?>