<?php
function TanggalIndo($date){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);
 
  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
}
?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>

      <div class="agile-grids"> 
        <!-- tables -->
        <div class="agile-tables">
          <h3>Daftar Pengembalian</h3>

          <a style="margin-bottom:1%;" href="" data-toggle="modal" data-target="#myModal" class="btn btn-biru"><i class="btn-icon-only/ icon-print"> </i>Print Bulanan</a>

          <table width="100%" id="example1" class="two-axis">
          <thead>
            <tr>
              <th width="3%" style="text-align:center;">ID</th>
              <th style="text-align:center;">Mobil</th>
              <th style="text-align:center;">Supir</th>
              <th style="text-align:center;">Karyawan</th>
              <th style="text-align:center;">Customer</th>
              <th style="text-align:center;">Sewa</th>
              <th style="text-align:center;">Kembali</th>
              <th style="text-align:center;">Status</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = mysql_query("SELECT id_transaksi,id_supir,transaksi.status_mobil,mobil.type_mobil,karyawan.nama_karyawan,customer.nama_customer,tgl_sewa_mobil,tgl_kembali_mobil,total_harga_transaksi from transaksi INNER JOIN mobil ON mobil.id_mobil = transaksi.id_mobil INNER JOIN karyawan ON karyawan.id_karyawan=transaksi.id_karyawan INNER JOIN customer ON customer.id_customer=transaksi.id_customer");
            while ($data=mysql_fetch_array($query)) {
              $supir=$data['id_supir'];
              $o=mysql_query("SELECT nama_supir FROM supir WHERE id_supir='$supir'");
              $b=mysql_fetch_assoc($o);
          ?>  
            <tr>
            <td><?php echo $data['id_transaksi'] ?></td>
            <td><?php echo $data['type_mobil'] ?></td>
            <td><?php echo $b['nama_supir'] ?></td>
            <td><?php echo $data['nama_karyawan'] ?></td>
            <td><?php echo $data['nama_customer'] ?></td>
            <td><?php echo TanggalIndo($data['tgl_sewa_mobil']) ?></td>
            <td><?php echo TanggalIndo($data['tgl_kembali_mobil']) ?></td>
            <td><?php echo $data['status_mobil'] ?></td>

            </tr>

          <?php
          }
          ?>
          </tbody>
          </table>

        </div>
        <!-- //tables -->
      </div>

<script src="asset_datatable/datatables/jquery.dataTables.min.js"></script>
<script src="asset_datatable/datatables/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="asset_datatable/datatables/dataTables.bootstrap.css">

<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
  });
  </script>

   <div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Print Bulanan</h4>
        </div>
        <div class="forms">
                <h3 class="title1"></h3>
                <div class="form-three widget-shadow">
                  <form class="form-horizontal" action="halaman/print-rekap-bulanan.php" method="post">

                    <div class="form-group">
                                <label for="selector1" class="col-sm-2 control-label">Bulan</label>
                                <div class="col-sm-8"><select name="bulan" id="selector1" class="form-control1" required="">
                                  <option value="">Pilih Bulan</option>
                                  <option value="01">Januari</option>
                                  <option value="02">Februari</option>
                                  <option value="03">Maret</option>
                                  <option value="04">April</option>
                                  <option value="05">Mei</option>
                                  <option value="06">Juni</option>
                                  <option value="07">Juli</option>
                                  <option value="08">Agustus</option>
                                  <option value="09">September</option>
                                  <option value="10">Oktober</option>
                                  <option value="11">November</option>
                                  <option value="12">Desember</option>
                                </select></div>
                              </div>
                    <div class="form-group">
                      <label for="focusedinput" class="col-sm-2 control-label">Tahun</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control1" name="tahun" id="focusedinput" required="">
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>

                    <div class="modal-footer">
                    <button class="btn btn-primary" name="printprint">Print</button>
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                  </form>
                </div>
            </div>

        </div>
        </div>

  </div>

