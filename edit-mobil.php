<?php
include 'config/koneksi.php';
$id = $_GET['id'];
$query1 = mysql_query("SELECT * FROM mobil WHERE id_mobil='$id'");
$data = mysql_fetch_array($query1);
?> 
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Mobil</h4>
        </div>
        <!-- body modal -->

            <div class="forms">
                <h3 class="title1"></h3>
                <div class="form-three widget-shadow">
                  <form class="form-horizontal" action="?halaman=daftar-mobil&simpan=succes" enctype="multipart/form-data" method="post">
                  <input type="hidden" name="id_mobil" value="<?php echo $data['id_mobil'] ?>">
                  <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">ID rental</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="id_rental" id="focusedinput" value="<?php echo $data['id_rental'] ?>" readonly="" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Nopol</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="nopol" id="focusedinput" value="<?php echo $data['nopol'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Merk</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="merk_mobil" id="focusedinput" value="<?php echo $data['merk_mobil'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Type</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="type_mobil" id="focusedinput" value="<?php echo $data['type_mobil'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Tahun</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="tahun_mobil" id="focusedinput" value="<?php echo $data['tahun_mobil'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Kapasitas</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="kapasitas_mobil" id="focusedinput" value="<?php echo $data['kapasitas_mobil'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Harga</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="harga_mobil" id="focusedinput" value="<?php echo $data['harga_mobil'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="selector1" class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-8"><select name="status_mobil" id="selector1" class="form-control1" required="">
                        <option value="Ada" <?php $data['status_mobil'] == 'Ada' ? print "selected" : ""; ?>>Ada</option>
                        <option value="Tidak Ada" <?php $data['status_mobil'] == 'Tidak Ada' ? print "selected" : ""; ?>>Tidak Ada</option>
                      </select></div>
                    </div>

                    <div class="form-group">
                    <button style="margin-left:110px;" type="submit" name="kirim" class="btn btn-hover btn-dark">Submit</button> 
                    </div>

                  </form>
                </div>
            </div>
          </div>
      </div>
    </div>