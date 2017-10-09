<?php
if ($_GET['delete']) {
    $id=$_GET['delete'];
    $delete = mysql_query("DELETE FROM customer WHERE id_customer='$id'");
    if($delete) {
    echo "<script>window.location = 'dashboard.php?halaman=daftar-customer'</script>";
    }
  }
  if($_GET['simpan']) {
  $id_customer = $_POST['id_customer'];
  $nama_customer = $_POST['nama_customer'];
  $jenis_kelamin_customer = $_POST['jenis_kelamin_customer'];
  $umur_customer = $_POST['umur_customer'];
  $alamat_customer = $_POST['alamat_customer'];
  $no_hp_customer = $_POST['no_hp_customer'];
  $no_ktp_customer = $_POST['no_ktp_customer'];

  $query = mysql_query("UPDATE customer SET nama_customer='$nama_customer',jenis_kelamin_customer='$jenis_kelamin_customer',umur_customer='$umur_customer',alamat_customer='$alamat_customer',no_hp_customer='$no_hp_customer',no_ktp_customer='$no_ktp_customer' WHERE id_customer='$id_customer'");

  if ($query) {
    echo "<script>swal('Berhasil!', 'Data berhasil Di Update', 'success');</script>";
    echo "<script>window.location = 'dashboard.php?halaman=daftar-customer'</script>";

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
          url: "edit-customer.php",
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
          <h3>Daftar Customer</h3>

          <a style="margin-bottom:15px;" href="?halaman=input-customer" class="btn btn-small btn-biru"><i class="btn-icon-only/ icon-plus"> </i>Tambah</a>

          <table width="100%" id="example1" class="two-axis">
          <thead>
            <tr>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">JensKel</th>
              <th style="text-align:center;">Umur</th>
              <th style="text-align:center;">Alamat</th>
              <th style="text-align:center;">No HP</th>
              <th style="text-align:center;">No KTP</th>
            <th style="text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = mysql_query("SELECT * FROM customer");
            while ($data=mysql_fetch_array($query)) {
          ?>
            <tr>
            <td><?php echo $data['nama_customer']; ?></td>
            <td><?php echo $data['jenis_kelamin_customer']; ?></td>
            <td><?php echo $data['umur_customer']." Tahun"; ?></td>
            <td><?php echo $data['alamat_customer']; ?></td>
            <td><?php echo $data['no_hp_customer']; ?></td>
            <td><?php echo $data['no_ktp_customer']; ?></td>
            <td>
                      <a data-toggle="modal" data-target="#myModal" class="btn btn-small btn-primary open_modal" id="<?php echo $data['id_customer']; ?>"><i class="btn-icon-only/ icon-edit"> </i></a>
                      <a onclick="return confirm('Yakin ingin menghapus data ?')"  href="?halaman=daftar-customer&delete=<?php echo $data['id_customer']; ?>" class="btn btn-danger btn-small"><i class="btn-icon-only/ icon-trash"> </i></a></td>
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