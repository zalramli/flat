<?php
if ($_GET['kembali']) {
  $id = $_GET['kembali'];
  $query_trx = mysql_query("SELECT * FROM transaksi WHERE id_transaksi='$id'");
  $data_trx = mysql_fetch_array($query_trx);
  $id_mobil = $data_trx['id_mobil'];
  $id_supir = $data_trx['id_supir'];

  $query_mobil = mysql_query("SELECT * FROM mobil");
  $data2 = mysql_fetch_array($query_mobil);
  $status_mobil = $data['status_mobil'];
  $Update2 = mysql_query("UPDATE mobil SET status_mobil='Ada' WHERE id_mobil='$id_mobil'");

  $query_supir = mysql_query("SELECT * FROM supir");
  $data = mysql_fetch_array($query_supir);
  $status = $data['status_supir'];
  $Update = mysql_query("UPDATE supir SET status_supir='Ada' WHERE id_supir='$id_supir'");

$update_mobil = mysql_query("UPDATE transaksi SET status_mobil='Kembali' WHERE id_transaksi='$id'");
if($update_mobil) {
    echo "<script>window.location = 'dashboard.php?halaman=daftar-transaksi'</script>";
    }
}
function format_ribuan ($nilai){
  return number_format ($nilai, 0, ',', '.');
}
if ($_GET['delete']) {
    $id=$_GET['delete'];
    $delete = mysql_query("DELETE FROM transaksi WHERE id_transaksi='$id'");
    if($delete) {
    echo "<script>window.location = 'dashboard.php?halaman=daftar-transaksi'</script>";
    }   
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
          <h3>Daftar Transaksi</h3>

          <a style="margin-bottom:15px;" href="?halaman=transaksi" class="btn btn-small btn-biru"><i class="btn-icon-only/ icon-print"> </i>Tambah</a>

          <table width="100%" id="example1" class="two-axis">
          <thead>
            <tr>
              <th width="2%" style="text-align:center;">No</th>
              <th style="text-align:center;">mobil</th>
              <th style="text-align:center;">supir</th>
              <th style="text-align:center;">customer</th>
              <th style="text-align:center;">sewa</th>
              <th style="text-align:center;">kembali</th>
              <th style="text-align:center;">Total</th>
            <th style="text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = mysql_query("SELECT id_transaksi,id_supir,transaksi.status_mobil,mobil.type_mobil,karyawan.nama_karyawan,customer.nama_customer,tgl_sewa_mobil,tgl_kembali_mobil,total_harga_transaksi from transaksi INNER JOIN mobil ON mobil.id_mobil = transaksi.id_mobil INNER JOIN karyawan ON karyawan.id_karyawan=transaksi.id_karyawan INNER JOIN customer ON customer.id_customer=transaksi.id_customer ORDER BY id_transaksi");
            while ($data=mysql_fetch_array($query)) {
              $supir=$data['id_supir'];
              $o=mysql_query("SELECT nama_supir FROM supir WHERE id_supir='$supir'");
              $b=mysql_fetch_assoc($o);
          ?>
            <tr>
              <td><?php echo $data['id_transaksi'] ?></td>
              <td><?php echo $data['type_mobil'] ?></td>
              <td><?php echo $b['nama_supir'] ?></td>
              <td><?php echo $data['nama_customer'] ?></td>
              <td><?php echo TanggalIndo($data['tgl_sewa_mobil']) ?></td>
              <td><?php echo TanggalIndo($data['tgl_kembali_mobil']) ?></td>
              <td><?php echo Rp.' '. format_ribuan($data['total_harga_transaksi']) ?></td>
            <?php
            if ($data['status_mobil']== 'Disewa') {
            ?>
            <td>
                      <a onclick="return confirm('Yakin ingin mengembalikan mobil ?')"  href="?halaman=daftar-transaksi&kembali=<?php echo $data['id_transaksi']; ?>" class="btn btn-danger btn-small"><i class="btn-icon-only/ icon-arrow-left"> Belum Kembali </i></a>
                      <a href="halaman/print_pinjam.php?pinjam=<?php echo $data['id_transaksi']; ?>" class="btn btn-biru btn-small"><i class="btn-icon-only/ icon-print"> </i></a>
            </td>

            <?php  
            } else {
            ?>

            <td>
                      <a class="btn btn-primary"><i class="btn-icon-only/ icon-check"> Sudah Kembali </i></a>
                      <a onclick="return confirm('Yakin ingin menghapus data ?')"  href="?halaman=daftar-transaksi&delete=<?php echo $data['id_transaksi']; ?>" class="btn btn-danger btn-small"><i class="btn-icon-only/ icon-trash"> </i></a>
            </td>

            <?php
            }
            ?>
            
            </tr>

          <?php
          }
          ?>
          </tbody>
          </table>

        </div>
        <!-- //tables -->
      </div>
        <!-- Modal -->

<script src="asset_datatable/datatables/jquery.dataTables.min.js"></script>
<script src="asset_datatable/datatables/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="asset_datatable/datatables/dataTables.bootstrap.css">

<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
  });
  </script>