<!DOCTYPE html>
<html lang="en">
<head>
	<title>PERPUSTAKAAN | GRISA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../template/external/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../template/external/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../template/external/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../template/external/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../template/external/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../template/external/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../template/external/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../template/external/css/lupa_password.css">
<!--================== =============================================================================-->
	<script src="../../template/external/jquery.js"></script>

</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<!-- <div class="login100-pic js-tilt" data-tilt>
					<img src="../../template/external/images/grisa.png" alt="IMG">
                </div> -->
                
                <div class="js-tilt" data-tilt>
					<img style="display: block; margin-left: 50%; width: 100px; margin-left: 320px;" src="../../template/external/images/grisa.png" alt="GRISA">
				</div>

				<form class="login1000-form validate-form" action="../../proses/proses.php" method="POST">
					<span class="login100-form-title">
						Lupa Password
                    </span>
                    <!-- <span class="login100-form-title">
						<img width="100px" src="../../template/external/images/grisa.png" alt="GRISA">
                    </span> -->
                    
					<div class="wrap-input100" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="NIS">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="lupa_password">
							Reset
						</button>
                    </div>
                    
                    
					<div class="text-center p-t-12">
						<span class="txt1">
							<a href="../../index.php">login</a>
						</span>
					</div>

					
					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							<!-- Create your Account -->
							<!-- <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i> -->
							Fatkhul Umar 16112307
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="../../template/external/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../template/external/vendor/bootstrap/js/popper.js"></script>
	<script src="../../template/external/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../template/external/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../template/external/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../../template/external/js/main.js"></script>

</body>
</html>