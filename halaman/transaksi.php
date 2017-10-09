<?php
	session_start();

	$user=$_SESSION['username'];
	$o=mysql_query("SELECT id_karyawan FROM user_login WHERE username='$user' ");
	$b = mysql_fetch_array($o);

	if(isset($_POST['kirim'])){
	$id_transaksi = $_POST['id_transaksi'];
	$x=$_POST['id_supir'];
	$a=$_POST['id_karyawan'];
	$b=$_POST['id_customer'];
	$d=$_POST['tgl_sewa_mobil'];
	$e=$_POST['tgl_kembali_mobil'];
	$f=$_POST['harga_supir'];
	$g=$_POST['harga_mobil'];
   	$selisih = ((abs(strtotime ($e) - strtotime ($d)))/(60*60*24));

	$h= $f + $g; 
	$total = $h * $selisih;
	$tidak = $_POST['kosong'];


	if ($_POST['kosong'] == '0') {
		$query=mysql_query("insert into transaksi (id_transaksi,id_mobil,id_supir,id_karyawan,id_customer,tgl_sewa_mobil
		,tgl_kembali_mobil,total_harga_transaksi,status_mobil) values ('$id_transaksi','$_POST[id_mobil]','$tidak','$a','$b','$d','$e','$total','Disewa')");
	} else {
		$query=mysql_query("insert into transaksi (id_transaksi,id_mobil,id_supir,id_karyawan,id_customer,tgl_sewa_mobil
		,tgl_kembali_mobil,total_harga_transaksi,status_mobil) values ('$id_transaksi','$_POST[id_mobil]','$x','$a','$b','$d','$e','$total','Disewa')");
	}
	
	$query_mobil = mysql_query("SELECT * FROM mobil WHERE id_mobil='$_POST[id_mobil]'");
	$data2 = mysql_fetch_array($query_mobil);
	$status_mobil = $data['status_mobil'];
	$Update2 = mysql_query("UPDATE mobil SET status_mobil='Tidak Ada' WHERE id_mobil='$_POST[id_mobil]' ");

	$query_supir = mysql_query("SELECT * FROM supir WHERE id_supir='$x'");
	$data = mysql_fetch_array($query_supir);
	$status = $data['status_supir'];
	$Update = mysql_query("UPDATE supir SET status_supir='Tidak Ada' WHERE id_supir='$x'");

	$query = mysql_query("INSERT INTO pemasukan (id_pemasukan,tgl_pemasukan,perihal_pemasukan,pendapatan) VALUES (NULL,'$d','Penyewaan Mobil','$total')");


	
	  if ($query) {
    echo "<script>swal('Berhasil!', 'Data berhasil Di Update', 'success');</script>";
    echo "<script>window.location = 'dashboard.php?halaman=daftar-transaksi'</script>";

  } else {
    echo mysql_error();
  }

}
?>
						<div class="panel panel-widget forms-panel">
						<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Input Rental :</h4>
							</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
									<form class="form-horizontal" method="post">
									<input type="hidden" name="id_transaksi">
										
									<div class="form-group">
											<label for="selector1" class="col-sm-1 control-label">ID Mobil</label>
											<div class="col-sm-8"><select name="id_mobil" id="mobil" class="form-control1" required="">
											<option>PILIH MOBIL</option>
											<?php
											$query = mysql_query("SELECT * FROM mobil WHERE status_mobil='Ada'");
											while($data = mysql_fetch_array($query)){
											?>

												<option value="<?php echo $data['id_mobil']; ?>"><?php echo $data['type_mobil']; ?></option>
												<?php } ?>
											</select>
											Harga : <select required="" name="harga_mobil" id="harga">
										    <!-- hasil data dari cari_kota.php akan ditampilkan disini -->
											</select>
											</div>
									</div>
									
												<input type="hidden" name="id_karyawan" readonly="" value="<?php echo $b['id_karyawan']?>" class="form-control1">

										<div class="form-group">
											<label for="selector1" class="col-sm-1 control-label">Customer</label>
											<div class="col-sm-8"><select name="id_customer" id="selector1" class="form-control1">
											<?php
											$query3 = mysql_query("SELECT * FROM customer");
											while($data3 = mysql_fetch_array($query3)){
											?>
												<option value="<?php echo $data3['id_customer']; ?>"><?php echo $data3['nama_customer']; ?></option>
												<?php } ?>
											</select></div>
										</div>
										
										<div class="form-group">
											<label for="checkbox" class="col-sm-1 control-label">Supir</label>
											<div class="col-sm-2">
											<div class="checkbox-inline"><label for="chkYes">
											<input type="checkbox" name="cod" />
											YA
											</label> 
											</div>
											<div class="checkbox-inline"><label for="chkNo">
											<input value="0" type="checkbox"  name="kosong" />
											TIDAK
											</label></div>
											</div>
										</div>

										<div class="form-group">
										<label for="selector1" class="col-sm-1 control-label"></label>
										<div class="col-sm-5">
										<select name="id_supir" style="padding-left:0px;" id='select' class="supir">
										<option>Pilih Supir</option>
										<?php
										$query4 = mysql_query("SELECT * FROM supir WHERE status_supir='Ada'");
										while($data4 = mysql_fetch_array($query4)){
										?>
										<option value="<?php echo $data4['id_supir']; ?>"><?php echo $data4['nama_supir']; ?></option>
										<?php } ?>
										</select>
										Harga : <select name="harga_supir" id="harga_supir">
											</select>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Sewa</label>
											<div class="col-sm-2">
												<input type="text"  class="form-control1" name="tgl_sewa_mobil" id="tanggal_sewa" required="">
											</div>
											<div class="col-sm-2">
												<p class="help-block"></p>
											</div>
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-1 control-label">Kembali</label>
											<div class="col-sm-2">
												<input type="text" class="form-control1" name="tgl_kembali_mobil" id="tanggal_kembali" required="">
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
<script src="js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="css/default.css" />

<script>
    $(document).ready(function(){
    	$('#tanggal_sewa').Zebra_DatePicker({
    direction: true
});
    });
</script>
<script>
    $(document).ready(function(){
    	$('#tanggal_kembali').Zebra_DatePicker({
    direction: true
});
    });
</script>
<script>
	$('[name="cod"]').on('change', function() {
  $('#select').toggle(this.checked);
}).change();
</script>
<script type="text/javascript">
$('[name="cod"]').on('change', function() {
  $('#select').toggle(this.checked);
}).change();
</script>
<script>
   
    $("#mobil").change(function(){
   
        // variabel dari nilai combo box provinsi
        var ambil_harga = $("#mobil").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "ambil_harga_mobil.php",
            data: "mobil="+ambil_harga,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada Mobil');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#harga").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>
<script>
   
    $(".supir").change(function(){
   
        // variabel dari nilai combo box provinsi
        var ambil_harga = $(".supir").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "ambil_harga_supir.php",
            data: "supir="+ambil_harga,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada supir');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#harga_supir").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>
