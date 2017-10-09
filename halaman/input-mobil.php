<?php
if(isset($_POST['simpan'])) {
	$id_mobil = $_POST['id_mobil'];
	$id_rental = $_POST['id_rental'];
	$temp  = $_FILES['foto_mobil']['tmp_name']; // untuk menyimpan sementara file yang di upload 
  	$format = $_FILES['foto_mobil']['type']; // untuk menentukan format gambar
 
  //maksud $_FILES['gambar'] adalag mengambil nilai pada form dengan input yang bernama gambar tadi
  
  //membuat validasi file yang di upload gambar atau bukan
   

  	$foto_mobil  = $_FILES['foto_mobil']['name']; // definisi variabel nama gambar
  	$dir  = "images/foto-mobil/$foto_mobil"; // definisi direktori atau folder tempat untuk disimpan gambar
	$nopol = $_POST['nopol'];
	$merk_mobil = $_POST['merk_mobil'];
	$type_mobil = $_POST['type_mobil'];
	$tahun_mobil = $_POST['tahun_mobil'];
	$harga_mobil = $_POST['harga_mobil'];
	$kapasitas_mobil = $_POST['kapasitas_mobil'];
	$status_mobil = $_POST['status_mobil'];

	$query = mysql_query("INSERT INTO mobil (id_mobil,id_rental,foto_mobil,nopol,merk_mobil,type_mobil,tahun_mobil,harga_mobil,kapasitas_mobil,status_mobil) VALUES ('$id_mobil','$id_rental','$foto_mobil','$nopol','$merk_mobil','$type_mobil','$tahun_mobil','$harga_mobil','$kapasitas_mobil','$status_mobil')");
	if ($query) {
    move_uploaded_file($temp, $dir);
    echo "<script>swal('Berhasil!', 'Data berhasil ditambahkan.', 'success');</script>";
    echo "<script>window.location = 'dashboard.php?halaman=daftar-mobil'</script>";
  } else {
  	echo mysql_error();
  }
}
?>				
					<div class="panel panel-widget forms-panel">
						<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Input Mobil :</h4>
							</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
									<form class="form-horizontal" enctype="multipart/form-data" method="post">
									<input type="hidden" name="id_mobil">

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
												<input type="file" class="form-control1" name="foto_mobil" id="focusedinput" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Nopol</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="nopol" id="focusedinput" placeholder="masukan Nomor polisi" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Merk</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="merk_mobil" id="focusedinput" placeholder="Masukan Merk Mobil" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Type</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="type_mobil" id="focusedinput" placeholder="Masukan Type Mobil" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Tahun</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="tahun_mobil" id="focusedinput" placeholder="Masukan Tahun Mobil" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Kapasitas</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="kapasitas_mobil" id="focusedinput" placeholder="Masukan Kapasitas Mobil" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Harga</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="harga_mobil" id="focusedinput" placeholder="Masukan Sisa Mobil" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="selector1" class="col-sm-1 control-label">Status</label>
											<div class="col-sm-8"><select name="status_mobil" id="selector1" class="form-control1" required="">
												<option value="">Pilih Status Mobil</option>
												<option value="Ada">Ada</option>
												<option value="Tidak Ada">Tidak Ada</option>
											</select></div>
										</div>
										<div class="form-group">
											<button style="margin-left:110px;" type="submit" name="simpan" class="btn btn-hover btn-dark">Submit</button> 
										</div>

									</form>
								</div>
						</div>
					</div>
					</div>
