<?php
require_once 'koneksi.php';

$nomor=$_REQUEST['nomor'];

$sql = "select * from historry_tindakan where nomor = '$nomor'";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
$data = $stmt->fetch(); 
?>

<div class="container">
<h2 align="center">Edit Tindakan</h2>
<form enctype="multipart/form-data" action="doo-edit-history.php" method="post">
<table class="table">
	<tr>
		<td align="center"> <input type="hidden" name="nomor" value="<?php echo $data->nomor; ?>"></td>
	</tr>
	<tr>
		<td align="center"> <input type="hidden" name="id_pasien" value="<?php echo $data->id_pasien; ?>"></td>
	</tr>
	<tr>
		<td align="center"> <input type="hidden" name="nama" value="<?php echo $data->nama; ?>"></td>
	</tr>
	<tr>
		<td align="center"> <input type="hidden" name="nama_dokter" value="<?php echo $data->nama_dokter; ?>"></td>
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
			<td>Nama Pasien </td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="text" name="nama" value="<?php echo $data->nama;?>" disabled>
			</td>
			</div>
		</tr>
		<tr>
			<td>Tindakan</td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="text" name="tindakan" value="<?php echo $data->tindakan;?>">
			</td>
			</div>
		</tr>
		<tr>
			<td>Diagnosa</td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="text" name="diagnosa" value="<?php echo $data->diagnosa;?>">
			</td>
			</div>
		</tr>
		<tr>
			<td>Obat</td>
			<td>:</td>
			<td><select class="js-select-obat" name="obat">
				<option><?php echo $data->obat;?></option>
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
			<td> : </td>
			<td><div class="input-control textarea">
				<textarea name="keterangan"><?php echo $data->keterangan; ?></textarea>
				</td>	
				</div>			
		</tr>
		
		
		<tr>
			<td colspan="3" align="center"><br><input type="submit" name="submit" value="Update"> <input type="reset" name="reset" value="Reset"></td>
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
</div>
</body>
</html>