<a href="home-admin.php?module=daftar-obat"><span class="mif-chevron-left mif-4x place-left"></a>

<div class="container">
	<h3 align="center">Tambah Data Obat</h3>
	<form enctype="multipart/form-data" action="doo-tambah-obat.php" method="post"> 
		<table class="table">
						
			<tr>
				<td>Kode Obat</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="kode_obat" required>
					<span class="informer">Masukkan Kode Obat</span>
					</div>
				</td>
			</tr>	
			<tr>
				<td>Nama Obat</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="nama_obat" required>
					<span class="informer">Masukkan Nama Obat</span>
					</div>
				</td>
			</tr>
			<tr>
				<td>Bentuk Obat</td>
				<td>:</td>
				<td><select class="js-select-bentuk" name="bentuk_obat">
						<option></option>
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
				<td>:</td>
				<td><div class="input-control text darcula" data-role="datepicker" data-format="yyyy-mm-dd">
						<input type="text" name="tanggal_beli" value="<?php echo date("Y-m-d"); ?>">
						<button class="button"><span class="mif-calendar"></span></button>
					</div>
			</tr>
			<tr>
				<td>Tanggal Expired</td>
				<td>:</td>
				<td><div class="input-control text darcula" data-role="datepicker" data-format="yyyy-mm-dd">
						<input type="text" name="tgl_expired" value="<?php echo date("Y-m-d"); ?>">
						<button class="button"><span class="mif-calendar"></span></button>
					</div>
			</tr>
			<tr>
				<td>Aturan Pakai</td>
				<td>:</td>
				<td><select class="js-select-aturan" name="aturan_pakai">
						<option></option>
						<option value="1X1Sehari">1X1Sehari</option>
						<option value="2X1Sehari">2X1Sehari</option>
						<option value="3X1Sehari">3X1Sehari</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Kegunaan</td>
				<td>:</td>
				<td> <div class="input-control textarea rounded">
					<textarea name="kegunaan" required></textarea>
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
            $(".js-select-aturan").select2({
                placeholder: "Pilih Aturan",
                allowClear: true
            });
			$(".js-select-bentuk").select2({
                placeholder: "Pilih Bentuk Obat",
                allowClear: true
            });
        });

	</script>