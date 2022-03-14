<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Klinik</title>
	<link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
	<link rel="icon" type="image/png" href="image/logo.png">
	<style>
        .login-form {
            width:18;
            height: 21.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -9.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>
	<script>

        /*
        * Do not use this is a google analytics fro Metro UI CSS
        * */
        if (window.location.hostname !== 'localhost') {

            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-58849249-3', 'auto');
            ga('send', 'pageview');

        }


        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
    </script>
</head>
<body background="image/bg.png">
	<div class="login-form block-shadow">
        <form action="doo-login.php" method="post">
		<div class = "padding20">
			<span class="padding70"><img src = "image/avatar.png" width="100" height="100"></span>
            <hr class="thin"/>
				<div class="input-control modern text iconic" data-role="input">
					<input type="text" name="usernm" required>
					<span class="informer">Masukkan ID Username</span>
					<span class="placeholder">Username</span>
					<span class="icon mif-user fg-amber"></span>
				</div>
            <br>
				<div class="input-control modern password iconic" data-role="input">
					<input type="password" name="passw" required>
					<span class="informer">Masukkan Password</span>
					<span class="placeholder">Password</span>
					<span class="icon mif-lock fg-amber"></span>
					<button class="button helper-button reveal"><span class="mif-eye fg-teal"></span></button>
				</div>
            <br>
            <br>
                <button  class="button priimary bg-amber block-shadow text-bold" name="btnLogin">Log in</button>
        </form>
		</div>
    </div>
</body>
</html>