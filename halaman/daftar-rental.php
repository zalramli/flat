<?php
if ($_GET['delete']) {
    $id=$_GET['delete'];
    $delete = mysql_query("DELETE FROM rental WHERE id_rental='$id'");
        if($delete) {
    echo "<script>window.location = 'dashboard.php?halaman=daftar-rental'</script>";
    }
  }
  if($_GET['simpan']) {
  $id_rental = $_POST['id_rental'];
  $nama_rental = $_POST['nama_rental'];
  $alamat_rental = $_POST['alamat_rental'];
  $no_hp_rental = $_POST['no_hp_rental'];

  $query2 = mysql_query("UPDATE rental SET nama_rental='$nama_rental',alamat_rental='$alamat_rental',no_hp_rental='$no_hp_rental' WHERE id_rental='$id_rental'");
  if ($query2) {
    echo "<script>swal('Berhasil!', 'Data Berhasil Di Update', 'success');</script>";
    echo "<script>window.location = 'dashboard.php?halaman=daftar-rental'</script>";

  } else {
    echo "error".mysql_error();
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
          url: "edit-rental.php",
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
          <h3>Daftar Rental</h3>
          <a style="margin-bottom:15px;" href="?halaman=input-rental" class="btn btn-biru"><i class="btn-icon-only/ icon-plus"> </i>Tambah</a>

          <table width="100%" id="example1" class="two-axis">
          <thead>
            <tr>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">Alamat</th>
              <th style="text-align:center;">No</th>
            <th style="text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = mysql_query("SELECT * FROM rental");
            while ($data=mysql_fetch_array($query)) {
          ?>
            <tr>
            <td><?php echo $data['nama_rental']; ?></td>
            <td><?php echo $data['alamat_rental']; ?></td>
            <td><?php echo $data['no_hp_rental']; ?></td>
            <td>
                      <a data-toggle="modal" data-target="#myModal" class="btn btn-small btn-primary open_modal" id="<?php echo $data['id_rental']; ?>"><i class="btn-icon-only/ icon-edit"> </i></a>
                      <a onclick="return confirm('Yakin ingin menghapus data ?')"  href="?halaman=daftar-rental&delete=<?php echo $data['id_rental']; ?>" class="btn btn-danger btn-small"><i class="btn-icon-only/ icon-trash"> </i></a></td>
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