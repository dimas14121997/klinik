<a href="home-admin.php?module=daftar-pasien"><span class="mif-chevron-left mif-4x place-left"></a>

<div class="container">
	<h3 align="center">Tambah Data Pasien</h3>
	<form enctype="multipart/form-data" action="doo-daftar-pasien.php" method="post"> 
		<table class="table">
			
			<input type="hidden" name="nomor_pendaftaran">
			
			<tr>
				<td>Nama Pasien</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="nama_pasien" required>
					<span class="informer">Masukkan Nama Lengkap Pasien</span>
					</div>
				</td>
			</tr>
			<tr>
				<td>Tanggal Daftar</td>
				<td>:</td>
				<td><div class="input-control text darcula" data-role="datepicker" data-format="yyyy-mm-dd">
						<input type="text" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
						<button class="button"><span class="mif-calendar"></span></button>
					</div>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><div class="input-control text darcula" data-role="datepicker" data-format="yyyy-mm-dd">
						<input type="text" name="tgl_lahir" value="<?php echo date("Y-m-d"); ?>">
						<button class="button"><span class="mif-calendar"></span></button>
					</div>
			</tr>
			
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="alamat" required>
					<span class="informer">Masukkan Alamat Pasien</span>
					</div>
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
				<td>Dokter Pemeriksa</td>
				<td>:</td>
				<td><select class="js-select-dokter" name="dokter-pemeriksa">
						<option></option>
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
						<option></option>
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
				<td colspan="3" align="center"><input type="submit" name="submit" value="Tambah">
				<input type="reset" name="reset" value="Reset"></td>
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