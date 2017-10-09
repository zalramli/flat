<?php
if(isset($_POST['kirim'])) {
	$id_pengeluaran = $_POST['id_pengeluaran'];
	$tgl_pengeluaran = $_POST['tgl_pengeluaran'];
	$perihal_pengeluaran = $_POST['perihal_pengeluaran'];
	$total_pengeluaran = $_POST['total_pengeluaran'];

	$query = mysql_query("INSERT INTO pengeluaran (id_pengeluaran,tgl_pengeluaran,perihal_pengeluaran,total_pengeluaran) VALUES ('$id_pengeluaran','$tgl_pengeluaran','$perihal_pengeluaran','$total_pengeluaran')");

	if ($query) {
    echo "<script>window.location = 'dashboard.php?halaman=pengeluaran_hari'</script>";
		
	}
}

?>

						<div class="panel panel-widget forms-panel">
						<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Input Rental :</h4>
							</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
									<form class="form-horizontal" method="post">
									<input type="hidden" name="id_pengeluaran">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Tanggal</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="tgl_pengeluaran" id="focusedinput" placeholder="Masukan Nama Rental" value="<?php echo date('Y-m-d') ?>" readonly="" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Perihal</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="perihal_pengeluaran" id="focusedinput" placeholder="Masukan Perihal Pengeluaran" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Total</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="total_pengeluaran" id="focusedinput" placeholder="Masukan Total Pengeluaran" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
										<button style="margin-left:110px;" type="submit" name="kirim" class="btn btn-hover btn-dark">Submit</button> 
										</div>

									</form>
								</div>
						</div>
					</div>
					</div>

					