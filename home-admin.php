<?php 
session_name("klinik");
session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />

    <title>Welcome, <?php echo ucwords($_SESSION["level"]); ?> !</title>

    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/tabs.css">

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/docs.js"></script>
    <script src="js/prettify/run_prettify.js"></script>
    <script src="js/ga.js"></script>
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/metro.js"></script>
	<script src="js/select2.min.js"></script>
	<link rel="icon" type="image/png" href="image/logo.png">
    <style>
        html, body {
            height: 100%;
        }
        body {
        }
        .page-content {
            padding-top: 3.125rem;
            min-height: 100%;
            height: 100%;
        }
        .table .input-control.checkbox {
            line-height: 1;
            min-height: 0;
            height: auto;
        }

        @media screen and (max-width: 800px){
            #cell-sidebar {
                flex-basis: 52px;
            }
            #cell-content {
                flex-basis: calc(100% - 52px);
            }
        }
    </style>

    <script>
        function pushMessage(t){
            var mes = 'Info|Implement independently';
            $.Notify({
                caption: mes.split("|")[0],
                content: mes.split("|")[1],
                type: t
            });
        }

        $(function(){
            $('.sidebar').on('click', 'li', function(){
                if (!$(this).hasClass('active')) {
                    $('.sidebar li').removeClass('active');
                    $(this).addClass('active');
                }
            })
        })
    </script>
</head>
<body background = "image/bgklinik2.png">
    <div class="app-bar fixed-top darcula" data-role="appbar">
        <h4 class="place-left padding5">SISTEM INFORMASI KLINIK</h4>
        <div class="app-bar-element place-right">
            <span class="dropdown-toggle"><span class="mif-user mif-lg"></span>            <?php echo ucwords($_SESSION["level"]); ?></span>
            <div class="app-bar-drop-container padding5 place-right no-margin-top block-shadow" data-role="dropdown" data-no-close="true" style="width: 180px">
                <ul class="unstyled-list fg-dark">
                    <li><a href="logout.php" class="fg-white3 fg-hover-yellow">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
                <div class="cell size-x200" style="background-color: #ffffff; height: 100%;">
                    <?php include "menu.php"; ?>    
                </div>
				
                <?php 
				if(!isset($_GET["module"])){ 
					
				}elseif($_GET["module"] == "daftar-pasien"){
                    include "daftar-pasien.php";
                }elseif($_GET["module"] == "rekam-medis"){
                    include "rekam-medis.php";
                }elseif($_GET["module"] == "form-daftar-pasien"){
                    include "form-daftar-pasien.php";
                }else if($_GET["module"] == "edit-pasien"){
                    include "edit-pasien.php";
                }else if($_GET["module"] == "tindakan-pasien"){
                    include "tindakan-pasien.php";
                }else if($_GET["module"] == "tindakan-pasien2"){
                    include "tindakan-pasien2.php";
                }else if($_GET["module"] == "periksa"){
                    include "periksa.php";
                }else if($_GET["module"] == "history-tindakan"){
                    include "history-tindakan.php";
                }else if($_GET["module"] == "history-tindakan2"){
                    include "history-tindakan2.php";
				}else if($_GET["module"] == "edit-history"){
                    include "edit-history.php";
                }else if($_GET["module"] == "apoteker"){
                    include "apoteker.php";
                }else if($_GET["module"] == "daftar-obat"){
                    include "daftar-obat.php";
                }else if($_GET["module"] == "form-tambah-obat"){
                    include "form-tambah-obat.php";
				}else if($_GET["module"] == "edit-obat"){
                    include "edit-obat.php";
				}else if($_GET["module"] == "daftar-user"){
                    include "daftar-user.php";
				}else if($_GET["module"] == "form-daftar-user"){
                    include "form-daftar-user.php";
				}else if($_GET["module"] == "edit-user"){
                    include "edit-user.php";
				}
                ?>
				
				
            </div>
        </div>
    </div>
</body>
</html>