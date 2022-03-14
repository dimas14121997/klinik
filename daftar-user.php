<?php
include 'koneksi.php';

$sql = "select * from userr order by level";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

$sqlc = "select count(*) from userr";

$stmtc = $connect->prepare($sql);
$stmtc->setFetchMode(PDO::FETCH_OBJ);
$stmtc->execute();
if($stmtc->execute() > 0){
?>
<div class="cell auto-size margin50" id="cell-content">
	<h1 class="text-light">Daftar User <span class="mif-users place-right"></span></h1>
    <hr class="bold bg-gray">
    <a href="home-admin.php?module=form-daftar-user">
		<button class="button rounded primary place-right">
		<span class="mif-plus margin5"></span>&nbsp;&nbsp;&nbsp;Tambah User</button>
	</a>
	<br><br><br>
	<table class="table highlight border bordered bg-white">
		<thead>
			<tr>
				<th>No</th>
				<th>ID User</th>
				<th>Nama User</th>
				<th>Username</th>
				<th>Password</th>
				<th>Level</th>
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
					<td><?= $q->id_user; ?></td>
					<td><?= $q->nama; ?></td>
					<td><?= $q->username; ?></td>
					<td><?= $q->password; ?></td>
					<td><?= $q->level; ?></td>
					<td><center>
						<a href="home-admin.php?module=edit-user&id_user=<?= $q->id_user; ?>" >
							<span class="mif-pencil mif-lg"></span>
						</a>
						<hr>
						<a href="#" onclick="deleteUser(<?= $q->id_user; ?>)">
							<span class="mif-bin mif-lg"></span>
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
	function deleteUser(id_user){
		if (confirm('Hapus Data User?')) {
			window.location.href = "hapususer.php?id_user="+id_user+"&action=del";
		}
	}
</script>
<?php
	} else {
}
?>