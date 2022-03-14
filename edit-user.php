<?php
require_once 'koneksi.php';

$id_user=$_REQUEST['id_user'];

$sql = "select * from userr where id_user = '$id_user'";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
$data = $stmt->fetch(); 
?>
<div class="container">
	<h3 align="center">Edit Data User</h3>
	<form enctype="multipart/form-data" action="doo-edit-user.php" method="post"> 
		<table class="table">
		<tr>
		<td align="center"> <input type="hidden" name="id_user" value="<?php echo $data->id_user; ?>"></td>
		</tr>
		<tr>
			<td>ID User</td>
			<td> : </td>
			<td><div class="input-control modern text">
				<input type="text" name="id_user" value="<?php echo $data->id_user;?>" disabled>
			</td>
			</div>
		</tr>	
			<tr>
				<td>Nama User</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="nama_user" value="<?php echo $data->nama;?>">
					</div>
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="username" value="<?php echo $data->username;?>">
					</div>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><div class="input-control modern text">
					<input type="text" name="password" value="<?php echo $data->password;?>">
					</div>
				</td>
			</tr>
			<tr>
				<td>Level</td>
				<td>:</td>
				<td><select class="js-select-level" name="level">
						<option><?php echo $data->level;?></option>
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