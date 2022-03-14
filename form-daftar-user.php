<a href="home-admin.php?module=daftar-user"><span class="mif-chevron-left mif-4x place-left"></a>

<div class="container">
	<h3 align="center">Tambah Data User</h3>
	<form enctype="multipart/form-data" action="doo-daftar-user.php" method="post"> 
		<table class="table">
			
			<input type="hidden" name="nomor_pendaftaran">
			
			<tr>
				<td>Nama User</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="nama_user" required>
					<span class="informer">Masukkan Nama User</span>
					</div>
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="username" required>
					<span class="informer">Masukkan Username</span>
					</div>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="password" required>
					<span class="informer">Masukkan Password</span>
					</div>
				</td>
			</tr>
			<tr>
				<td>Level</td>
				<td>:</td>
				<td><select class="js-select-level" name="level">
						<option></option>
						<option value="admin">admin</option>
						<option value="apoteker">apoteker</option>
						<option value="dokter1">dokter1</option>
						<option value="dokter2">dokter2</option>
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
            $(".js-select-level").select2({
                placeholder: "Pilih Dokter",
                allowClear: true
            });
        });

	</script>