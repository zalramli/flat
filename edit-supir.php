 <?php
include 'config/koneksi.php';
$id = $_GET['id'];
$query1 = mysql_query("SELECT * FROM supir WHERE id_supir='$id'");
$data1 = mysql_fetch_array($query1);
?> 
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Supir</h4>
        </div>
        <!-- body modal -->

						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
									<form class="form-horizontal" action="?halaman=daftar-supir&simpan=succes" method="post">
									<input type="hidden" name="id_supir" value="<?php echo $data1['id_supir'] ?>">
									<div class="form-group">
					                  <label for="focusedinput" class="col-sm-2 control-label">ID</label>
					                  <div class="col-sm-8">
					                    <input type="text" class="form-control1" name="id_rental" id="focusedinput" value="<?php echo $data1['id_rental'] ?>" readonly="" required="">
					                  </div>
					                  <div class="col-sm-2">
					                    <p class="help-block"></p>
					                  </div>
					                </div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Nama</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="nama_supir" id="focusedinput" value="<?php echo $data1['nama_supir'] ?>" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>

					                    <div class="form-group">
					                      <label for="selector1" class="col-sm-2 control-label">JensKel</label>
					                      <div class="col-sm-8"><select name="jenis_kelamin_supir" id="selector1" class="form-control1" required="">
					                        <option value="">Pilih Jenis Kelamin</option>
					                        <option value="Laki-laki" <?php $data1['jenis_kelamin_supir'] == 'Laki-laki' ? print "selected" : ""; ?>>Laki-Laki</option>
					                        <option value="Perempuan" <?php $data1['jenis_kelamin_supir'] == 'Perempuan' ? print "selected" : ""; ?>>Perempuan</option>
					                      </select></div>
					                    </div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Umur</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="umur_supir" id="focusedinput" value="<?php echo $data1['umur_supir'] ?>" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Alamat</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="alamat_supir" id="focusedinput" value="<?php echo $data1['alamat_supir'] ?>" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">No Hp</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="no_hp_supir" id="focusedinput" value="<?php echo $data1['no_hp_supir'] ?>" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>

										<div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Status</label>
											<div class="col-sm-8"><select name="status_supir" id="selector1" class="form-control1" required="">
												<option value="Ada" <?php $data1['status_supir'] == 'Ada' ? print "selected" : ""; ?>>Ada</option>
												<option value="Tidak Ada" <?php $data1['status_supir'] == 'Tidak Ada' ? print "selected" : ""; ?>>Tidak Ada</option>
											</select></div>
										</div>
											<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Harga</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="harga_supir" id="focusedinput" value="<?php echo $data1['harga_supir']?>" required="">
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