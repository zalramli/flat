<?php
if ($_GET['delete']) {
    $id=$_GET['delete'];
    $delete = mysql_query("DELETE FROM mobil WHERE id_mobil='$id'");
    if($delete) {
    echo "<script>window.location = 'dashboard.php?halaman=daftar-mobil'</script>";
    }
  }
if($_GET['simpan']){
  $id_mobil = $_POST['id_mobil'];
  $id_rental = $_POST['id_rental'];
  $nopol = $_POST['nopol'];
  $merk_mobil = $_POST['merk_mobil'];
  $type_mobil = $_POST['type_mobil'];
  $tahun_mobil = $_POST['tahun_mobil'];
  $harga_mobil = $_POST['harga_mobil'];
  $kapasitas_mobil = $_POST['kapasitas_mobil'];
  $status_mobil = $_POST['status_mobil'];
  $query = mysql_query("UPDATE mobil SET id_rental='$id_rental',nopol='$nopol',merk_mobil='$merk_mobil',type_mobil='$type_mobil',tahun_mobil='$tahun_mobil',harga_mobil='$harga_mobil',kapasitas_mobil='$kapasitas_mobil',status_mobil='$status_mobil' WHERE id_mobil='$id_mobil'");
  if ($query) {
    echo "<script>swal('Berhasil!', 'Data Berhasil Di Update', 'success');</script>";
    echo "<script>window.location = 'dashboard.php?halaman=daftar-mobil'</script>";
  } else {
    echo mysql_error();
  }
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

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "edit-mobil.php",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#myModal").html(ajaxData);
            $("#myModal").modal('show',{backdrop: 'true'});
           }
         });
        });
      });
</script>


      <div class="agile-grids"> 
        <!-- tables -->
        <div class="agile-tables">
          <h3>Daftar Mobil</h3>

          <a style="margin-bottom:15px;" href="?halaman=input-mobil" class="btn btn-biru"><i class="btn-icon-only/ icon-plus"> </i>Tambah</a>

          <table width="100%" id="example1" class="two-axis">
          <thead>
            <tr>
              <th style="text-align:center;">Nopol</th>
              <th style="text-align:center;">Merk</th>
              <th style="text-align:center;">Type</th>
              <th style="text-align:center;">Tahun</th>
              <th style="text-align:center;">Kapasitas</th>
              <th style="text-align:center;">Harga</th>
              <th style="text-align:center;">Status</th>
            <th style="text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = mysql_query("SELECT * FROM mobil");
            while ($data=mysql_fetch_array($query)) {
          ?>
            <tr>
            <td><?php echo $data['nopol']; ?></td>
            <td><?php echo $data['merk_mobil']; ?></td>
            <td><?php echo $data['type_mobil']; ?></td>
            <td><?php echo $data['tahun_mobil']; ?></td>
            <td><?php echo $data['kapasitas_mobil']." Orang"; ?></td>
            <td><?php echo $data['harga_mobil']; ?></td>
            <td><?php echo $data['status_mobil']; ?></td>
            <td>
                      <a href="?halaman=detail-mobil&id=<?php echo $data['id_mobil']; ?>" class="btn btn-biru"><i class="btn-icon-only/ icon-search"> </i></a>
                      <a data-toggle="modal" data-target="#myModal" class="btn btn-primary open_modal" id="<?php echo $data['id_mobil']; ?>"><i class="btn-icon-only/ icon-edit"> </i></a>
                      <a onclick="return confirm('Yakin ingin menghapus data ?')"  href="?halaman=daftar-mobil&delete=<?php echo $data['id_mobil']; ?>" class="btn btn-danger"><i class="btn-icon-only/ icon-trash"> </i></a></td>
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
  <div id="myModal" class="modal fade" role="dialog">
  </div>

<script src="asset_datatable/datatables/jquery.dataTables.min.js"></script>
<script src="asset_datatable/datatables/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="asset_datatable/datatables/dataTables.bootstrap.css">

<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
  });
  </script>