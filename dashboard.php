<?php
include "config/koneksi.php";
session_start();
error_reporting(0);
if (!isset($_SESSION['tingkat_level']))
{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<head>
<title>Rental Mobil</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/sweetalert.css">
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/screenfull.js"></script>
<script src="js/sweetalert.min.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
		
</head>
<body class="dashboard-page">


	<nav class="main-menu">
		<ul>
			<li>
				<a href="?halaman=home">
					<i class="fa fa-home nav_icon"></i>
					<span class="nav-text">
					Dashboard
					</span>
				</a>
			</li>
			 <?php
                    if ($_SESSION['tingkat_level']=='admin') {
                    ?>
			<li class="has-subnav">
				<a href="javascript:;">
				<i class="fa fa-check-square-o nav_icon"></i>
				<span class="nav-text">
				Data Master
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
						<a class="subnav-text" href="?halaman=daftar-rental">
							Daftar Rental
						</a>
					</li>
					<li>
						<a class="subnav-text" href="?halaman=daftar-mobil">
							Daftar Mobil
						</a>
					</li>
					<li>
						<a class="subnav-text" href="?halaman=daftar-karyawan">
							Daftar Karyawan
						</a>
					</li>
					<li>
						<a class="subnav-text" href="?halaman=daftar-supir">
							Daftar Supir
						</a>
					</li>
				</ul>
			</li>
			<?php
                    }
                    ?>

			<li class="has-subnav">
				<a href="javascript:;">
					<i class="fa fa-file-text-o nav_icon"></i>
						<span class="nav-text">Transaksi</span>
					<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
						<a class="subnav-text" href="?halaman=transaksi">
							Input Transaksi
						</a>
					</li>

					<li>
						<a class="subnav-text" href="?halaman=daftar-customer">
							Daftar Customer
						</a>
					</li>
					<li>
						<a class="subnav-text" href="?halaman=daftar-transaksi">Daftar Transaksi</a>
					</li>
					<li>
						<a class="subnav-text" href="?halaman=daftar-rekap">Rekap Data</a>
					</li>

				</ul>
			</li>
			<?php
                    if ($_SESSION['tingkat_level']=='admin') {
                    ?>
			<li class="has-subnav">
				<a href="javascript:;">
					<i class="fa fa-bar-chart nav_icon"></i>
						<span class="nav-text">Laporan</span>
					<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
						<a class="subnav-text" href="?halaman=pendapatan_bulan">
							Pendapatan/bulan
						</a>
					</li>

					<li>
						<a class="subnav-text" href="?halaman=pengeluaran_bulan">
							Pengeluaran/bulan
						</a>
					</li>

				</ul>
			</li>
			<li class="has-subnav">
				<a href="javascript:;">
					<i class="fa fa-list-ul" aria-hidden="true"></i>
					<span class="nav-text">Laba</span>
					<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
						<a class="subnav-text" href="?halaman=laba_hari">Laba/hari</a>
					</li>
					<li>
						<a class="subnav-text" href="?halaman=laba_bulan">Laba/bulan</a>
					</li>
				</ul>
			</li>
			<?php
			}
			?>

		</ul>
		<ul class="logout">
			<li>
			<a href="index.php">
			<i class="icon-off nav-icon"></i>
			<span class="nav-text">
			Logout
			</span>
			</a>
			</li>
		</ul>
	</nav>
	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
		<section class="title-bar">
			<div class="logo">
				<h1><a href="dashboard.php?halaman=home"><img style="width:50px; height:50px;" src="images/logo.jpg" alt="" />Rental</a></h1>
			</div>
			<div class="full-screen">
				<section class="full-top">
					<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>	
				</section>
			</div>
			<div class="header-right">
				<div class="profile_details_left">
					<div class="header-right-left">
						<!--notifications of menu start -->
					</div>	

					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</section>
		<div class="main-grid">
		<?php
		if($_GET['halaman']) {
			include 'halaman/'.$_GET['halaman'].'.php';
		}
		?>
		</div>
		
		<!-- footer -->
		<div class="footer">
			<p>©Design by <a href="https://www.google.co.id/search?biw=1366&bih=608&tbm=isch&sa=1&q=rocky+si+batu&oq=rocky+si+batu&gs_l=img.3...692616.697214.0.697471.0.0.0.0.0.0.0.0..0.0....0...1c.1.64.img..0.0.0.p6Qr0y7KTQI">Rocky Si Batu</a></p>
		</div>
		<!-- //footer -->
	</section>
	<script src="js/bootstrap.js"></script>
	
	
</body>
</html>
.