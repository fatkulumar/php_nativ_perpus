<?php
	include "koneksi/koneksi.php";
	session_start();
		if(isset($_SESSION["username"])){
			header("location: template/external/adminlte/index.php");
		}
	$qAdmin = mysqli_query($koneksi, "SELECT * FROM tb_user");
	$cekAdmin = mysqli_fetch_array($qAdmin);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PERPUSTAKAAN | GRISA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="template/external/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/external/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/external/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/external/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="template/external/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/external/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/external/css/util.css">
	<link rel="stylesheet" type="text/css" href="template/external/css/main.css">
<!--================== =============================================================================-->
	<script src="template/external/jquery.js"></script>

</head>
<body>
	
<div style="position: fixed; z-index: 999; width: 100%" id="tampil_sedia"></div>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="template/external/images/grisa.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="proses/proses.php" method="POST">
					<span class="login100-form-title">
						<div style="color: red"> 
							<?php
								if($cekAdmin == null){
									$setAutoIncrement = mysqli_query($koneksi, "ALTER TABLE tb_user AUTO_INCREMENT = 1");
									echo "Database Kosong, Login Pertama Dijadikan Admin";
								}
							?>
						<div>
						<?php
							if(isset($_GET["users"])){
								echo $_SESSION["psdSalah"];
							}
						?>
						</div>
						</div>
						Login
					</span>
  <!-- ============================perubahan========================= -->

					<!-- <div class="wrap-input100">
						<input id="search_sedia" name="search_sedia" class="form-control form-control-navbar" type="search" placeholder="Cari Buku" aria-label="Search">
					</div> -->

					<script>
						$(document).ready(function(){
						$('#search_sedia').keyup(function(){
							var search = $('#search_sedia').val()
							$.ajax({
							type : 'POST',
							url : 'proses/ajax_sedia.php?search_sedia=' + search,
							data : 'search=' + search,
							success : function(data){
								//   alert(data)
								$('#tampil_sedia').html(data)
							}
							})
						})
						})
					</script>

  <!-- ============================perubahan========================= -->

					<div class="wrap-input100" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="NIS">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							<a href="cek_buku.php">Cek Buku</a>
						</span>
						<a class="txt2" href="#">
							<!-- Username / Password? -->
						</a>
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

  <!-- ============================perubahan========================= -->

	<!-- <script>
    $(document).ready(function(){
      $('#search_sedia').keyup(function(){
        var search = $('#search_sedia').val()
        $.ajax({
          type : 'POST',
          url : 'proses/ajax_sedia.php?search_sedia=' + search,
          data : 'search=' + search,
          success : function(data){
			//   alert(data)
            $('#tampil_sedia').html(data)
          }
        })
      })
    })
</script> -->
	
<!-- ============================perubahan========================= -->

	

	
<!--===============================================================================================-->	
	<script src="template/external/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="template/external/vendor/bootstrap/js/popper.js"></script>
	<script src="template/external/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="template/external/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="template/external/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="template/external/js/main.js"></script>

</body>
</html>