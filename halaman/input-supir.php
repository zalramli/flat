<?php
if(isset($_POST['kirim'])) {
	$id_supir = $_POST['id_supir'];
	$id_rental = $_POST['id_rental'];

	$temp  = $_FILES['foto_supir']['tmp_name']; // untuk menyimpan sementara file yang di upload 
  	$format = $_FILES['foto_supir']['type']; // untuk menentukan format gambar
 
  //maksud $_FILES['gambar'] adalag mengambil nilai pada form dengan input yang bernama gambar tadi
  
  //membuat validasi file yang di upload gambar atau bukan
   
  	$foto_supir = $_FILES['foto_supir']['name']; // definisi variabel nama gambar
  	$dir  = "images/foto-supir/$foto_supir"; // definisi direktori atau folder tempat untuk disimpan gambar
	
  	$nama_supir =  $_POST['nama_supir'];
  	$jenis_kelamin_supir =  $_POST['jenis_kelamin_supir'];
  	$umur_supir =  $_POST['umur_supir'];
  	$alamat_supir =  $_POST['alamat_supir'];
  	$no_hp_supir = $_POST['no_hp_supir'];
  	$status_supir = $_POST['status_supir'];
  	$harga_supir = $_POST['harga_supir'];

  	$query =mysql_query("INSERT INTO supir (id_supir,id_rental,foto_supir,nama_supir,jenis_kelamin_supir,umur_supir,alamat_supir,no_hp_supir,status_supir,harga_supir) VALUES ('$id_supir','$id_rental','$foto_supir','$nama_supir','$jenis_kelamin_supir','$umur_supir','$alamat_supir','$no_hp_supir','$status_supir','$harga_supir')");

	if ($query) {

    move_uploaded_file($temp, $dir);
    echo "<script>swal('Berhasil!', 'Data berhasil ditambahkan.', 'success');</script>";
    echo "<script>window.location = 'dashboard.php?halaman=daftar-supir'</script>";

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
									<input type="hidden" name="id_supir">
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
												<input type="file" class="form-control1" name="foto_supir" id="focusedinput" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Nama</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="nama_supir" id="focusedinput" placeholder="Masukan Nama Supir" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="selector1" class="col-sm-1 control-label">JensKel</label>
											<div class="col-sm-8"><select name="jenis_kelamin_supir" id="selector1" class="form-control1" required="">
												<option value="">Pilih Jenis Kelamin</option>
												<option value="Laki-laki">Laki-Laki</option>
												<option value="Perempuan">Perempuan</option>
											</select></div>
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Umur</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="umur_supir" id="focusedinput" placeholder="Masukan Umur Supir" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Alamat</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="alamat_supir" id="focusedinput" placeholder="Masukan Alamat Supir" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">No Hp</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="no_hp_supir" id="focusedinput" placeholder="Masukan No Hp Supir" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>

										<div class="form-group">
											<label for="selector1" class="col-sm-1 control-label">Status</label>
											<div class="col-sm-8"><select name="status_supir" id="selector1" class="form-control1" required="">
												<option value="">Pilih Status Supir</option>
												<option value="Ada">Ada</option>
												<option value="Tidak Ada">Tidak Ada</option>
											</select></div>
										</div>
											<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Harga</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="harga_supir" id="focusedinput" placeholder="Masukan Harga Supir" required="">
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