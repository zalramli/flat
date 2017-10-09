<?php
include 'config/koneksi.php';
$id = $_GET['id'];
$query1 = mysql_query("SELECT * FROM customer WHERE id_customer='$id'");
$data1 = mysql_fetch_array($query1);
?> 
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Customer</h4>
        </div>
        <!-- body modal -->

            <div class="forms">
                <h3 class="title1"></h3>
                <div class="form-three widget-shadow">
                  <form class="form-horizontal" action="?halaman=daftar-customer&simpan=succes" method="post">
                  <input type="hidden" name="id_customer" value="<?php echo $data1['id_customer'] ?>">
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="nama_customer" id="focusedinput" value="<?php echo $data1['nama_customer'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="selector1" class="col-sm-2 control-label">JensKel</label>
                      <div class="col-sm-8"><select name="jenis_kelamin_customer" id="selector1" class="form-control1" required="">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" <?php $data1['jenis_kelamin_customer'] == 'Laki-laki' ? print "selected" : ""; ?>>Laki-Laki</option>
                        <option value="Perempuan" <?php $data1['jenis_kelamin_customer'] == 'Perempuan' ? print "selected" : ""; ?>>Perempuan</option>
                      </select></div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Umur</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="umur_customer" id="focusedinput" value="<?php echo $data1['umur_customer'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="alamat_customer" id="focusedinput" value="<?php echo $data1['alamat_customer'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">No Hp</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="no_hp_customer" id="focusedinput" value="<?php echo $data1['no_hp_customer'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">No KTP</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="no_ktp_customer" id="focusedinput" value="<?php echo $data1['no_ktp_customer'] ?>" required="">
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