
<?php
include 'koneksi.php';

$sql = "select * from obat";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

$sqlc = "select count(*) from obat";

$stmtc = $connect->prepare($sql);
$stmtc->setFetchMode(PDO::FETCH_OBJ);
$stmtc->execute();
if($stmtc->execute() > 0){
?>
<div class="cell auto-size margin50" id="cell-content">
	<h1 class="text-light">Daftar Obat<span class="mif-medkit icon place-right"></span></h1>
    <hr class="bold bg-gray">
	<?php if($_SESSION["level"] == "apoteker" ) {?>
		<a href="home-admin.php?module=form-tambah-obat">
		<button class="button rounded primary place-right">
		<span class="mif-plus margin5"></span>&nbsp;&nbsp;&nbsp;Tambah Obat</button>
	</a>
	<?php }else {?>

	<?php } ?>
	<br><br><br>
	<table class="table highlight border bordered bg-white">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Obat</th>
				<th>Nama Obat</th>
				<th>Bentuk Obat</th>
				<th>Tanggal Beli</th>
				<th>Tanggal Kedalauarsa</th>
				<th>Aturan Pakai</th>
			    <th>Kegunaan</th>
				<?php if($_SESSION["level"] == "apoteker" ) :?>
					<th>Action</th>
				<?php else : ?>
				
				<?php endif ?>
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
					<td><?= $q->kode_obat; ?></td>
					<td><?= $q->nama_obat; ?></td>
					<td><?= $q->bentuk_obat; ?></td>
					<td><?= $q->tanggal_beli; ?></td>
					<td><?= $q->tanggal_kedalauarsa; ?></td>
					<td><?= $q->aturan_pakai; ?></td>
					<td><?= $q->kegunaan; ?></td>
					<?php if($_SESSION["level"] == "apoteker" ) :?>
						<td><center>
						<a href="home-admin.php?module=edit-obat&kode_obat=<?= $q->kode_obat; ?>" >
							<span class="mif-pencil mif-lg"></span>
						</a>
						<hr>
						<a href="hapus-obat.php?kode_obat=<?= $q->kode_obat ?>" onclick="
						return confirm('yakin hapus obat?');">
							<span class="mif-bin mif-lg"></span>
						</a>
						</center>
					</td>
					<?php else :?>
					
					<?php endif; ?>
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