<?php
require_once 'koneksi.php';

$id_pasien=$_REQUEST['id_pasien'];

$sql = "select * from daftar_pasienn where id_pasien = '$id_pasien'";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
$data = $stmt->fetch(); 
?>

<div class="container">
<h2 align="center">Edit Data Pasien</h2>
<form enctype="multipart/form-data" action="do-editpasien.php" method="post">
<table class="table">
	<tr>
		<td align="center"> <input type="hidden" name="id_pasien" value="<?php echo $data->id_pasien; ?>"></td>
	</tr>
		<tr>
			<td>ID Pasien</td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="text" name="id_pasien" value="<?php echo $data->id_pasien;?>" disabled>
			</td>
			</div>
		</tr>
		<tr>
			<td> Nama Pasien </td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="text" name="nama_pasien" value="<?php echo $data->nama;?>">
			</td>
			</div>
		</tr>
		<tr>
			<td>Tanggal Daftar</td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="date" name="tanggal_daftar" value="<?php echo $data->tanggal_daftar;?>">
			</td>
			</div>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="date" name="tanggal_lahir" value="<?php echo $data->tanggal_lahir;?>">
			</td>
			</div>
		</tr>
		<tr>
			<td>Alamat</td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="text" name="alamat" value="<?php echo $data->alamat;?>">
				</td>
				</div>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td> : </td>
			<td><div class="input-control textarea">
				<textarea name="keterangan"><?php echo $data->keterangan; ?></textarea>
				</td>	
				</div>			
		</tr>
		<tr>
			<td>Dokter Pemeriksa</td>
			<td>:</td>
			<td><select class="js-select-dokter" name="dokter-pemeriksa">
			<option><?php echo $data->nama_dokter;?></option>
			<?php
			include 'koneksi.php';
			$sql = "select * from dokter";
			$stmt = $connect->prepare($sql);
			$stmt->setFetchMode(PDO::FETCH_OBJ);
			$stmt->execute();
			if($stmt->execute() > 0){
				foreach ($stmt as $q)
				{
				?>
				<option value="<?= $q->nama_dokter; ?>"><?= $q->id_dokter?> - <?= $q->nama_dokter?> - <?= $q->kategori?>
				</option>
				<?php } 
				} ?>
				</select>
			</td>
		</tr>
		<tr>
				<td>Pilih wilayah</td>
				<td>:</td>
				<td><select class="js-select-wilayah" name="pilih_wilayah">
						<option><?php echo $data->wilayah;?></option>
						<?php
						include 'koneksi.php';
						$sql = "select * from wilayah";
						$stmt = $connect->prepare($sql);
						$stmt->setFetchMode(PDO::FETCH_OBJ);
						$stmt->execute();
						if($stmt->execute() > 0){
							foreach ($stmt as $q)
						{
						?>
						<option value="<?= $q->nama_wilayah; ?>"><?= $q->id_wilayah?> - <?= $q->nama_wilayah?> 
						</option>
						<?php } 
						} ?>
					</select>
				</td>
			</tr>
		
		
		<tr>
			<td colspan="3" align="center"><br><input type="submit" name="submit" value="Update"> <input type="reset" name="reset" value="Reset"></td>
		</tr>
</table>
</form>
<script>
   
      $(function(){
            $(".js-select-dokter").select2({
                placeholder: "Pilih Dokter",
                allowClear: true
            });
        });

		$(function(){
            $(".js-select-wilayah").select2({
                placeholder: "Pilih Wilayah",
                allowClear: true
            });
        });	
	</script>
</div>
</body>
</html>