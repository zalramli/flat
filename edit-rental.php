<?php
include 'config/koneksi.php';
$id = $_GET['id'];
$query1 = mysql_query("SELECT * FROM rental WHERE id_rental='$id'");
$data = mysql_fetch_array($query1);
?> 
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Rental</h4>
        </div>
        <!-- body modal -->

            <div class="forms">
                <h3 class="title1"></h3>
                <div class="form-three widget-shadow">
                  <form class="form-horizontal" action="?halaman=daftar-rental&simpan=succes" method="post">
                  <input type="hidden" name="id_rental" value="<?php echo $data['id_rental'] ?>">
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="nama_rental" id="focusedinput" value="<?php echo $data['nama_rental'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="alamat_rental" id="focusedinput" value="<?php echo $data['alamat_rental'] ?>" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">No Hp</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="no_hp_rental" id="focusedinput" value="<?php echo $data['no_hp_rental'] ?>" required="">
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