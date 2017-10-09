<?php
if ($_GET['delete']) {
    $id=$_GET['delete'];
    $delete = mysql_query("DELETE FROM supir WHERE id_supir='$id'");
    if($delete) {
    echo "<script>window.location = 'dashboard.php?halaman=daftar-supir'</script>";
    }
  }
  if($_GET['simpan']) {
    $id_supir = $_POST['id_supir'];
    $id_rental = $_POST['id_rental'];
    $nama_supir =  $_POST['nama_supir'];
    $jenis_kelamin_supir =  $_POST['jenis_kelamin_supir'];
    $umur_supir =  $_POST['umur_supir'];
    $alamat_supir =  $_POST['alamat_supir'];
    $no_hp_supir = $_POST['no_hp_supir'];
    $status_supir = $_POST['status_supir'];
    $harga_supir = $_POST['harga_supir'];

    $query = mysql_query("UPDATE supir SET id_rental='$id_rental',nama_supir='$nama_supir',jenis_kelamin_supir='$jenis_kelamin_supir',umur_supir='$umur_supir',alamat_supir='$alamat_supir',no_hp_supir='$no_hp_supir',status_supir='$status_supir',harga_supir='$harga_supir' WHERE id_supir='$id_supir'");

  if ($query) {
    echo "<script>swal('Berhasil!', 'Data berhasil Di Update.', 'success');</script>";
    echo "<script>window.location = 'dashboard.php?halaman=daftar-supir'</script>";

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
          url: "edit-supir.php",
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
          <h3>Daftar Supir</h3>

          <a style="margin-bottom:15px;" href="?halaman=input-supir" class="btn btn-biru"><i class="btn-icon-only/ icon-plus"> </i>Tambah</a>

          <table width="100%" id="example1" class="two-axis">
          <thead>
            <tr>
              <th style="text-align:center;">Foto</th>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">Umur</th>
              <th style="text-align:center;">Alamat</th>
              <th style="text-align:center;">No Hp</th>
              <th style="text-align:center;">Status</th>
              <th style="text-align:center;">Harga</th>
            <th style="text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = mysql_query("SELECT * FROM supir");
            while ($data=mysql_fetch_array($query)) {
          ?>
            <tr>
            <td style="text-align:center;"><img class="circular" src="images/foto-supir/<?php echo $data['foto_supir']; ?>"</td>
            <td><?php echo $data['nama_supir']; ?></td>
            <td><?php echo $data['umur_supir']; ?></td>
            <td><?php echo $data['alamat_supir']; ?></td>
            <td><?php echo $data['no_hp_supir']; ?></td>
            <td><?php echo $data['status_supir']; ?></td>
            <td><?php echo $data['harga_supir']; ?></td>
            <td>
                      <a data-toggle="modal" data-target="#myModal" class="btn btn-small btn-primary open_modal" id="<?php echo $data['id_supir']; ?>"><i class="btn-icon-only/ icon-edit"> </i></a>
                      <a onclick="return confirm('Yakin ingin menghapus data ?')"  href="?halaman=daftar-supir&delete=<?php echo $data['id_supir']; ?>" class="btn btn-danger btn-small"><i class="btn-icon-only/ icon-trash"> </i></a></td>
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