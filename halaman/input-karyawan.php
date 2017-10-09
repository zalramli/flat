<?php
if(isset($_POST['kirim'])) {
	$id_karyawan = $_POST['id_karyawan'];

	$temp  = $_FILES['foto_karyawan']['tmp_name']; // untuk menyimpan sementara file yang di upload 
  	$format = $_FILES['foto_karyawan']['type']; // untuk menentukan format gambar
 
  //maksud $_FILES['gambar'] adalag mengambil nilai pada form dengan input yang bernama gambar tadi
  
  //membuat validasi file yang di upload gambar atau bukan
   

  	$foto_karyawan  = $_FILES['foto_karyawan']['name']; // definisi variabel nama gambar
  	$dir  = "images/foto-karyawan/$foto_karyawan"; // definisi direktori atau folder tempat untuk disimpan gambar
	$id_rental = $_POST['id_rental'];
	$nama_karyawan = $_POST['nama_karyawan'];
	$jenis_kelamin_karyawan = $_POST['jenis_kelamin_karyawan'];
	$alamat_karyawan = $_POST['alamat_karyawan'];
	$no_hp_karyawan = $_POST['no_hp_karyawan'];

	$query = mysql_query("INSERT INTO karyawan (id_karyawan,id_rental,foto_karyawan,nama_karyawan,jenis_kelamin_karyawan,alamat_karyawan,no_hp_karyawan) VALUES ('$id_karyawan','$id_rental','$foto_karyawan','$nama_karyawan','$jenis_kelamin_karyawan','$alamat_karyawan','$no_hp_karyawan')");
	if ($query) {

    move_uploaded_file($temp, $dir);
    echo "<script>swal('Berhasil!', 'Data berhasil ditambahkan.', 'success');</script>";
    echo "<script>window.location = 'dashboard.php?halaman=daftar-karyawan'</script>";
  } else {
  	echo mysql_error();
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
									<form class="form-horizontal" enctype="multipart/form-data" method="post">
									<input type="hidden" name="id_karyawan">
									<div class="form-group">
											<label for="selector1" class="col-sm-1 control-label">ID Rental</label>
											<div class="col-sm-8"><select name="id_rental" id="selector1" class="form-control1">
											<?php
											$query = mysql_query("SELECT * FROM rental");
											while($data = mysql_fetch_array($query)){
											?>
												<option value="<?php echo $data['id_rental']; ?>"><?php echo $data['nama_rental']; ?></option>
												<?php } ?>
											</select></div>
										</div>
									<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Foto</label>
											<div class="col-sm-3">
												<input type="file" class="form-control1" name="foto_karyawan" id="focusedinput" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Nama</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="nama_karyawan" id="focusedinput" placeholder="Masukan Nama Karyawan" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="selector1" class="col-sm-1 control-label">JensKel</label>
											<div class="col-sm-8"><select name="jenis_kelamin_karyawan" id="selector1" class="form-control1" required="">
												<option value="">Pilih Jenis Kelamin</option>
												<option value="Laki-laki">Laki-Laki</option>
												<option value="Perempuan">Perempuan</option>
											</select></div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Alamat</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="alamat_karyawan" id="focusedinput" placeholder="Masukan Alamat Karyawan" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">No Hp</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="no_hp_karyawan" id="focusedinput" placeholder="Masukan No Hp Karyawan" required="">
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