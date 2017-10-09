<?php
$id = $_GET['id'];
$query = mysql_query("SELECT * FROM mobil WHERE id_mobil='$id'");
$data=mysql_fetch_array($query);
?>

					<div class="panel panel-widget forms-panel">
						<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Detail Mobil :</h4>
							</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
								<table>
									<tr>

						                <td><img class="square" style="float:left;" src="images/foto-mobil/<?php echo $data['foto_mobil']; ?>"</td>

					                    <td style="text-align:left; position: absolute; top:240px; left:48%;"><b>Nopol</b> </td>
					                    <td style="padding-left:60px; position: absolute; top:240px; left:51% ;">: <?php echo $data['nopol']; ?></td>

					                    <td style="text-align:left; position: absolute; top:280px; left:48% ;"><b>Merk Mobil</b> </td>
					                    <td style="padding-left:60px; position: absolute; top:280px; left:51% ;">: <?php echo $data['merk_mobil']; ?></td>

					                    <td style="text-align:left; position: absolute; top:320px; left:48% ;"><b>Type Mobil</b> </td>
					                    <td style="padding-left:60px; position: absolute; top:320px; left:51% ;">: <?php echo $data['type_mobil']; ?></td>

					                    <td style="text-align:left; position: absolute; top:360px; left:48% ;"><b>Tahun Mobil</b> </td>
					                    <td style="padding-left:60px; position: absolute; top:360px; left:51% ;">: <?php echo $data['tahun_mobil']; ?></td>

					                    <td style="text-align:left; position: absolute; top:400px; left:48% ;"><b>Kapasitas</b> </td>
					                    <td style="padding-left:60px; position: absolute; top:400px; left:51% ;">: <?php echo $data['kapasitas_mobil']." Orang"; ?></td>

					                    <td style="text-align:left; position: absolute; top:240px; left:67% ;"><b>Harga Mobil</b> </td>
					                    <td style="padding-left:300px; position: absolute; top:240px; left:55% ;">: <?php echo $data['harga_mobil']; ?></td>

					                     <td style="text-align:left; position: absolute; top:280px; left:67%;"><b>Status</b> </td>
					                    <td style="padding-left:300px; position: absolute; top:280px; left:55% ;">: <?php echo $data['status_mobil']; ?></td>

					                    <td style="text-align:left; position: absolute; top:355px; left:900px ;"><a style="margin-bottom:15px;" href="?halaman=daftar-mobil" class="btn btn-small btn-primary"><i class="btn-icon-only/ icon-arrow-left"> </i>Kembali</a> </td>
                  
									</tr>
								</table>
								</div>
						</div>
					</div>
					</div>
