<?php
function format_ribuan ($nilai){
  return number_format ($nilai, 0, ',', '.');
}
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
          <h3>Pendapatan Hari Ini</h3>
          <?php
          $tgl =date('Y-m-d');
          $query_sum = mysql_query("SELECT SUM(pendapatan) AS total FROM pemasukan WHERE tgl_pemasukan='$tgl'");
          $data = mysql_fetch_array($query_sum);
          $query_sum2 = mysql_query("SELECT SUM(total_pengeluaran) AS totals FROM pengeluaran WHERE tgl_pengeluaran='$tgl'");
          $data2 = mysql_fetch_array($query_sum2);
          $laba = $data['total'] - $data2['totals'];
          ?>

          <strong><center>Laba Bersih Hari Ini adalah <?php echo Rp.' '. format_ribuan($laba) ?></center></strong>
          <strong>PEMASUKAN</strong>
          <table width="100%" id="example1" class="two-axis">
          <thead>
            <tr>
              <th style="text-align:center;">Tgl Pemasukan</th>
              <th style="text-align:center;">Perihal Pemasukan</th>
              <th style="text-align:center;">Pendapatan</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $query = mysql_query("SELECT * FROM pemasukan WHERE tgl_pemasukan='$tgl'");
          while ($data1 = mysql_fetch_array($query)) {
          ?>

            <tr>
            <td><?php echo TanggalIndo($data1['tgl_pemasukan']) ?></td>
            <td><?php echo $data1['perihal_pemasukan'] ?></td>
            <td><?php echo Rp.' '. format_ribuan($data1['pendapatan']) ?></td>

            </tr>

          <?php  
          }
          ?>
          </tbody>
          </table>
          <strong>PENGELUARAN</strong>
          <table width="100%" id="example2" class="two-axis">
          <thead>
            <tr>
              <th style="text-align:center;">Tgl Pengeluaran</th>
              <th style="text-align:center;">Perihal Pengeluaran</th>
              <th style="text-align:center;">Pengeluaran</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $query3 = mysql_query("SELECT * FROM pengeluaran WHERE tgl_pengeluaran='$tgl'");
          while ($data3 = mysql_fetch_array($query3)) {
          ?>

            <tr>
            <td><?php echo TanggalIndo($data3['tgl_pengeluaran']) ?></td>
            <td><?php echo $data3['perihal_pengeluaran'] ?></td>
            <td><?php echo Rp.' '. format_ribuan($data3['total_pengeluaran']) ?></td>

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
  <script type="text/javascript">
  $(function () {
    $("#example2").DataTable();
  });
  </script>

