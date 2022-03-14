<?php
require_once 'koneksi.php';

$id_pasien=$_REQUEST['id_pasien'];

$sql = "select * from daftar_pasienn where id_pasien='$id_pasien'";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
$data = $stmt->fetch(); 
?>

<a href="home-admin.php?module=tindakan-pasien"><span class="mif-chevron-left mif-4x place-left"></a>

	<h3 align="center">Periksa Pasien</h3>
	<form enctype="multipart/form-data" action="doo-tindakan.php" method="post"> 
		<table class="table">
			<tr>
				<td align="center"> <input type="hidden" name="id_pasien" value="<?php echo $data->id_pasien; ?>"></td>
			</tr>
			<tr>
				<td>ID Pasien</td>
				<td> : </td>
				<td><div class="input-control modern text">
					<input type="text" name="id_pasien" value="<?php echo $data->id_pasien;?>" disabled>
					</div>
				</td>	
			</tr>
			<tr>
				<td align="center"> <input type="hidden" name="nama" value="<?php echo $data->nama; ?>"></td>
			</tr>
			<tr>
				<td>Nama Pasien</td>
				<td> : </td>
				<td><div class="input-control modern text">
					<input type="text" name="nama" value="<?php echo $data->nama;?>" disabled>
					</div>
				</td>	
			</tr>		
			<tr>
				<input type="hidden" name="nama_dokter" value="<?php echo $data->nama_dokter; ?>">
			</tr>
			<tr>
				<td>Tindakan</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="tindakan" required>
					<span class="informer">Inputkan Tindakan</span>
					</div>
				</td>
			</tr>
			<tr>
				<td>Diagnosa</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="diagnosa" required>
					<span class="informer">Hasil Diagnosa</span>
					</div>
				</td>
			</tr>

			<tr>
				<td>Obat</td>
				<td>:</td>
				<td><select class="js-select-obat" name="obat">
						<option></option>
						<?php
						include 'koneksi.php';
						$sql = "select * from obat";
						$stmt = $connect->prepare($sql);
						$stmt->setFetchMode(PDO::FETCH_OBJ);
						$stmt->execute();
						if($stmt->execute() > 0){
							foreach ($stmt as $q)
						{
						?>
						<option value="<?= $q->nama_obat; ?>"> <?= $q->nama_obat?> 
						</option>
						<?php } 
						} ?>
					</select>
				</td>
			</tr>

			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td> <div class="input-control textarea rounded">
					<textarea name="keterangan" required></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center"><input type="submit" name="submit" value="Tambah">
				<input type="reset" name="reset" value="Reset"></td>
			</tr>
		</table>
	</form>


		<script>
   
      $(function(){
            $(".js-select-obat").select2({
                placeholder: "Pilih Obat",
                allowClear: true
            });
        });

	</script>