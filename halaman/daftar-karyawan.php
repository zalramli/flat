<?php
if ($_GET['delete']) {
    $id=$_GET['delete'];
    $delete = mysql_query("DELETE FROM karyawan WHERE id_karyawan='$id'");
    if($delete) {
    echo "<script>window.location = 'dashboard.php?halaman=daftar-karyawan'</script>";
    }
  }
if($_GET['simpan']) {
  $id_karyawan = $_POST['id_karyawan'];
  $id_rental = $_POST['id_rental'];
  $nama_karyawan = $_POST['nama_karyawan'];
  $jenis_kelamin_karyawan = $_POST['jenis_kelamin_karyawan'];
  $alamat_karyawan = $_POST['alamat_karyawan'];
  $no_hp_karyawan = $_POST['no_hp_karyawan'];

  $query = mysql_query("UPDATE karyawan SET id_rental='$id_rental',nama_karyawan='$nama_karyawan',jenis_kelamin_karyawan='$jenis_kelamin_karyawan',alamat_karyawan='$alamat_karyawan',no_hp_karyawan='$no_hp_karyawan' WHERE id_karyawan='$id_karyawan'");
  if ($query) {
    echo "<script>swal('Berhasil!', 'Data berhasil Di Update', 'success');</script>";
    echo "<script>window.location = 'dashboard.php?halaman=daftar-karyawan'</script>";

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
          url: "edit-karyawan.php",
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
          <h3>Daftar Karyawan</h3>

          <a style="margin-bottom:15px;" href="?halaman=input-karyawan" class="btn btn-biru"><i class="btn-icon-only/ icon-plus"> </i>Tambah</a>

          <table width="100%" id="example1" class="two-axis">
          <thead>
            <tr>
              <th style="text-align:center;">Foto</th>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">JensKel</th>
              <th style="text-align:center;">Alamat</th>
              <th style="text-align:center;">No Hp</th>
            <th style="text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = mysql_query("SELECT * FROM karyawan");
            while ($data=mysql_fetch_array($query)) {
          ?>
            <tr>
            <td style="text-align:center;"><img class="circular" src="images/foto-karyawan/<?php echo $data['foto_karyawan']; ?>"</td>
            <td><?php echo $data['nama_karyawan']; ?></td>
            <td><?php echo $data['jenis_kelamin_karyawan']; ?></td>
            <td><?php echo $data['alamat_karyawan']; ?></td>
            <td><?php echo $data['no_hp_karyawan']; ?></td>
            <td>
                      <a data-toggle="modal" data-target="#myModal" class="btn btn-small btn-primary open_modal" id="<?php echo $data['id_karyawan']; ?>"><i class="btn-icon-only/ icon-edit"> </i></a>
                      <a onclick="return confirm('Yakin ingin menghapus data ?')"  href="?halaman=daftar-karyawan&delete=<?php echo $data['id_karyawan']; ?>" class="btn btn-danger btn-small"><i class="btn-icon-only/ icon-trash"> </i></a></td>
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