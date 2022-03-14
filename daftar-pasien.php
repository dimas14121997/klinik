<?php
include 'koneksi.php';

$sql = "select * from daftar_pasienn";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

$sqlc = "select count(*) from daftar_pasienn";

$stmtc = $connect->prepare($sql);
$stmtc->setFetchMode(PDO::FETCH_OBJ);
$stmtc->execute();
if($stmtc->execute() > 0){
?>
<div class="cell auto-size margin50" id="cell-content">
	<h1 class="text-light">Data Pasien <span class="mif-users place-right"></span></h1>
    <hr class="bold bg-gray">
	<?php if($_SESSION["level"] == "admin" ) :?>
		<a href="home-admin.php?module=form-daftar-pasien">
		<button class="button rounded primary place-right">
		<span class="mif-plus margin5"></span>&nbsp;&nbsp;&nbsp;Tambah Pasien</button>
	</a>
	<?php else : ?>
   
	<?php endif ?>
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
				<th>wilayah</th>
				<?php if($_SESSION["level"] == "admin" ) :?>
					<th>Action</th>
				<?php else :?>
			
				<?php endif; ?>
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
					<td><?= $q->wilayah; ?></td>
					<?php if($_SESSION["level"] == "admin" ) :?>
						<td><center>
						<a href="home-admin.php?module=edit-pasien&id_pasien=<?= $q->id_pasien; ?>" >
							<span class="mif-pencil mif-lg"></span>
						</a>
						<hr>
						<a href="#" onclick="deletePasien(<?= $q->id_pasien; ?>)">
							<span class="mif-bin mif-lg"></span>
						</a>
						</center>
					</td>
					<?php else :?>
					
					<?php endif ?>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<script>
	$(document).ready(function(){
		$(".table").dataTable();
	});
	function deletePasien(id_pasien){
		if (confirm('Hapus Data Pasien?')) {
			window.location.href = "hapuspasien.php?id_pasien="+id_pasien+"&action=del";
		}
	}
</script>
<?php
	} else {
}
?>