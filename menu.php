<ul class="v-menu block-shadow-impact min-size-required" style="position:fixed;height:100%">

	<!-- foto profil user-->
	<div class="padding20"> 
		<?php if($_SESSION["level"] == "admin") { ?>
			<img src = "image/admin.png" width="180" height="180">
		<?php } else if(($_SESSION["level"] == "dokter1") || ($_SESSION["level"] == "dokter2")){ ?>
			<img src = "image/dokter.png" width="180" height="180">
		<?php } else if($_SESSION["level"] == "superadmin") { ?>
			<img src = "image/manager.png" width="180" height="180">
		<?php } else if($_SESSION["level"] == "apoteker"){ ?>
		<img src="image/apoteker.png" width="180" height="180">
		<?php } ?>
	</div>
	
	<!-- menu sidebar-->
	<div>
		<?php if(($_SESSION["level"] == "admin" ) || ($_SESSION["level"] == "superadmin" )) { ?>
			<li 
				<?php if(isset($_GET["module"]) && $_GET["module"] == "daftar-pasien") echo "class='active'"; ?>>			
					<a href="home-admin.php?module=daftar-pasien">
						<span class="mif-pencil icon"></span>
						<span class="title"> Daftar Pasien </span>
					</a>
			</li>
			<?php } if(($_SESSION["level"] == "admin" ) || ($_SESSION["level"] == "superadmin" )) { ?>
			<li 
				<?php if(isset($_GET["module"]) && $_GET["module"] == "rekam-medis") echo "class='active'"; ?>>			
					<a href="home-admin.php?module=rekam-medis">
						<span class="mif-clipboard icon"></span>
						<span class="title"> Rekam Medis</span>
					</a>
			</li>
		<?php } if(($_SESSION["level"] == "dokter1") || ($_SESSION["level"] == "dokter2" )) { ?>
			<li 
				<?php if(isset($_GET["module"]) && $_GET["module"] == "tindakan-pasien") echo "class='active'"; ?>>
				<a href="home-admin.php?module=tindakan-pasien">
					<span class="mif-users icon"></span>
					<span class="title">Tindakan</span>
				</a>
			</li>
		<?php }  if(($_SESSION["level"] == "dokter1" ) || ($_SESSION["level"] == "dokter2" ) ||($_SESSION["level"] == "superadmin" )) { ?>
			<li 
				<?php if(isset($_GET["module"]) && $_GET["module"] == "history-tindakan") echo "class='active'"; ?>>			
					<a href="home-admin.php?module=history-tindakan">
						<span class="mif-clipboard icon"></span>
						<span class="title"> History Tindakan </span>
					</a>
			</li>
		<?php } if($_SESSION["level"] == "apoteker") { ?>
			<li 
				<?php if(isset($_GET["module"]) && $_GET["module"] == "apoteker") echo "class='active'"; ?>>			
					<a href="home-admin.php?module=apoteker">
						<span class="mif-pencil icon"></span>
						<span class="title"> Obat Pasien </span>
					</a>
			</li>
		<?php } if(($_SESSION["level"] == "apoteker") || ($_SESSION["level"] == "superadmin")) { ?>
			<li 
				<?php if(isset($_GET["module"]) && $_GET["module"] == "daftar-obat") echo "class='active'"; ?>>
				<a href="home-admin.php?module=daftar-obat">
					<span class="mif-medkit icon"></span>
					<span class="title">Daftar Obat</span>
				</a>	
			</li>
		<?php } if($_SESSION["level"] == "superadmin") { ?>
			<li 
				<?php if(isset($_GET["module"]) && $_GET["module"] == "daftar-user") echo "class='active'"; ?>>
				<a href="home-admin.php?module=daftar-user">
					<span class="mif-users icon"></span>
					<span class="title">Daftar User</span>
				</a>	
			</li>
			<?php } ?>
			
	</div>
</ul>


	