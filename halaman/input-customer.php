<?php
if(isset($_POST['kirim'])) {
	$id_customer = $_POST['id_customer'];
	$nama_customer = $_POST['nama_customer'];
	$jenis_kelamin_customer = $_POST['jenis_kelamin_customer'];
	$umur_customer = $_POST['umur_customer'];
	$alamat_customer = $_POST['alamat_customer'];
	$no_hp_customer = $_POST['no_hp_customer'];
	$no_ktp_customer = $_POST['no_ktp_customer'];

	$query = mysql_query("INSERT INTO customer (id_customer,nama_customer,jenis_kelamin_customer,umur_customer,alamat_customer,no_hp_customer,no_ktp_customer) VALUES ('$id_customer','$nama_customer','$jenis_kelamin_customer','$umur_customer','$alamat_customer','$no_hp_customer','$no_ktp_customer') ");

	if ($query) {
    echo "<script>swal('Berhasil!', 'Data berhasil ditambahkan.', 'success');</script>";
    echo "<script>window.location = 'dashboard.php?halaman=daftar-customer'</script>";

	} else {
		echo mysql_error();
	}
}

?>	
						<div class="panel panel-widget forms-panel">
						<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Input Customer :</h4>
							</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
									<form class="form-horizontal" method="post">
									<input type="hidden" name="id_customer" value="<?php echo autogenerate('id_customer','customer',3,'')?>">

										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Nama</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="nama_customer" id="focusedinput" placeholder="Masukan Nama Customer" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="selector1" class="col-sm-1 control-label">JensKel</label>
											<div class="col-sm-8"><select name="jenis_kelamin_customer" id="selector1" class="form-control1" required="">
												<option value="">Pilih Jenis Kelamin</option>
												<option value="Laki-laki">Laki-Laki</option>
												<option value="Perempuan">Perempuan</option>
											</select></div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Umur</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="umur_customer" id="focusedinput" placeholder="Masukan Umur Customer" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Alamat</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="alamat_customer" id="focusedinput" placeholder="Masukan Alamat Customer" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">No Hp</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="no_hp_customer" id="focusedinput" placeholder="Masukan No HP Customer" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">No KTP</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="no_ktp_customer" id="focusedinput" placeholder="Masukan No KTP Customer" required="">
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
