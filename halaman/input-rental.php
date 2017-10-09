<?php
if(isset($_POST['kirim'])) {
	$id_rental = $_POST['id_rental'];
	$nama_rental = $_POST['nama_rental'];
	$alamat_rental = $_POST['alamat_rental'];
	$no_hp_rental = $_POST['no_hp_rental'];


	$query = mysql_query("INSERT INTO rental(id_rental,nama_rental,alamat_rental,no_hp_rental) VALUES ('$id_rental','$nama_rental','$alamat_rental','$no_hp_rental')");
	if ($query) {
    echo "<script>swal('Berhasil!', 'Data berhasil ditambahkan.', 'success');</script>";
    echo "<script>window.location = 'dashboard.php?halaman=daftar-rental'</script>";
	} else {
		echo "error".mysql_error();
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
									<input type="hidden" name="id_rental">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Nama</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="nama_rental" id="focusedinput" placeholder="Masukan Nama Rental" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Alamat</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="alamat_rental" id="focusedinput" placeholder="Masukan Alamat Rental" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">No Hp</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="no_hp_rental" id="focusedinput" placeholder="Masukan No HP Rental" required="">
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

					