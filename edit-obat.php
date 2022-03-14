<?php
require_once 'koneksi.php';

$kode_obat=$_REQUEST['kode_obat'];

$sql = "select * from obat where kode_obat = '$kode_obat'";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
$data = $stmt->fetch(); 
?>

<div class="container">
<h2 align="center">Edit Data Obat</h2>
<form enctype="multipart/form-data" action="doo-edit-obat.php" method="post">
<table class="table">
	<tr>
		<td align="center"> <input type="hidden" name="kode_obat" value="<?php echo $data->kode_obat; ?>"></td>
	</tr>
		<tr>
			<td>Kode Obat</td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="text" name="kode_obat" value="<?php echo $data->kode_obat;?>" disabled>
			</td>
			</div>
		</tr>
		<tr>
			<td>Nama Obat </td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="text" name="nama_obat" value="<?php echo $data->nama_obat;?>">
			</td>
			</div>
		</tr>
		<tr>
			<td>Bentuk Obat</td>
			<td>:</td>
				<td><select class="js-select-bentuk" name="bentuk_obat">
				<option><?= $data->bentuk_obat; ?></option>
				<option value="Kapsul">Kapsul</option>
				<option value="Tablet">Tablet</option>
				<option value="Kaplet">Kaplet</option>
				<option value="Serbuk">Serbuk</option>
				<option value="Tetes">Tetes</option>
				<option value="Salep">Salep</option>
				<option value="Pil">Pil</option>
				<option value="Larutan">Larutan</option>
				<option value="Injeksi/Suntik">Injeksi/Suntik</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal Beli</td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="date" name="tanggal_beli" value="<?php echo $data->tanggal_beli;?>">
			</td>
			</div>
		</tr>
		<tr>
			<td>Tanggal Expired</td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="date" name="tgl_expired" value="<?php echo $data->tanggal_kedalauarsa;?>">
			</td>
			</div>
		</tr>
		<td>Aturan Pakai</td>
			<td>:</td>
				<td><select class="js-select-bentuk" name="aturan_pakai">
				<option><?= $data->aturan_pakai;?></option>
				<option value="1X1Sehari">1X1Sehari</option>
				<option value="2X1Sehari">2X1Sehari</option>
				<option value="3X1Sehari">3X1Sehari</option>
				</select>
			</td>
		<tr>
			<td>Kegunaan</td>
			<td> : </td>
			<td><div class="input-control textarea">
				<textarea name="kegunaan"><?php echo $data->kegunaan; ?></textarea>
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
            $(".js-select-bentuk").select2({
                placeholder: "Pilih Bentuk",
                allowClear: true
            });
			$(".js-select-aturan").select2({
                placeholder: "Pilih Aturan Pakai",
                allowClear: true
            });
        });

	</script>
</div>
</body>
</html>