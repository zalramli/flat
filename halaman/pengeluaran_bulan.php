<?php
if(isset($_POST['printprint'])) {
      $kalender=CAL_GREGORIAN;
    $tanggal1= "01";
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $tanggalakhir=cal_days_in_month($kalender, $bulan, $tahun);

    $awal_bulan = $tahun."-".$bulan."-".$tanggal1;
    $akhir_bulan=$tahun."-".$bulan."-".$tanggalakhir;
}
function TanggalIndo($date){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);
 
  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
}
function format_ribuan ($nilai){
  return number_format ($nilai, 0, ',', '.');
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
          <h3>Pengeluaran/bulan</h3>
            <?php
          $tanggalakhir2=cal_days_in_month($kalender, $_POST['bulan'], $_POST['tahun']);
          $awal_bulan2 = $_POST['tahun']."-".$_POST['bulan']."-01";
          $akhir_bulan2 = $_POST['tahun']."-".$_POST['bulan']."-".$tanggalakhir2;
          $query2 = mysql_query("SELECT SUM(total_pengeluaran) AS total FROM pengeluaran WHERE tgl_pengeluaran BETWEEN '$awal_bulan2' AND '$akhir_bulan2'");
          $data2 = mysql_fetch_array($query2);
          $total = Rp." ".format_ribuan($data2['total']);
          ?>

          <strong><center>PENGELUARAN BULAN ke <?php echo $_POST['bulan'] ?> Tahun <?php echo $_POST['tahun'] ?>   adalah <?php echo "$total"; ?></center></strong>

          <a style="margin-bottom:1%;" href="" data-toggle="modal" data-target="#myModal" class="btn btn-biru"><i class="btn-icon-only/ icon-print"> </i>Pilih Bulan</a>
          <table width="100%" id="example1" class="two-axis">
          <thead>
            <tr>
              <th style="text-align:center;">Tgl</th>
              <th style="text-align:center;">Perihal</th>
              <th style="text-align:center;">Pengeluaran</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $query = mysql_query("SELECT * FROM pengeluaran where tgl_pengeluaran BETWEEN '$awal_bulan' AND '$akhir_bulan'");
          while ($data = mysql_fetch_array($query)) {
          
          ?>
          

            <tr>
            <td><?php echo TanggalIndo($data['tgl_pengeluaran']); ?></td>
            <td><?php echo $data['perihal_pengeluaran']; ?></td>
            <td><?php echo Rp." ". format_ribuan($data['total_pengeluaran']); ?></td>

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
                  <form class="form-horizontal" method="post">

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

