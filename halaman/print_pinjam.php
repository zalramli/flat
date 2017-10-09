<?php
session_start();
error_reporting();
 // Define relative path from this script to mPDF
$nama_dokumen='Rekap Bulan';
include '../config/koneksi.php';
include '../mpdf60/mpdf.php';
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
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
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<table border="" cellspacing="0" cellpadding="0" style:"margin-bottom:3px;">
    <tr style="padding-left:-20px;">
                <td rowspan="6" width="230"></td>
                <td style="text-align: center; font-size: 15px"><b>RENTAL MOBIL</b></td>
                <td rowspan="6" width="90"></td>
    </tr>
    <tr>
                <td style="text-align: center; font-size: 15px"><b>Jln. Mantap Jiwa No. 289</b></td>
            </tr>
            <tr>
                <td style="text-align: center; font-size: 15px"><b>Lumajang</b></td>
            </tr>
</table>
<hr style="color:2px solid black">
<br>
<br>
<table border="">

<?php 
$id = $_GET['pinjam'];
$query = mysql_query("SELECT id_transaksi,id_supir,transaksi.status_mobil,mobil.type_mobil,karyawan.nama_karyawan,customer.nama_customer,tgl_sewa_mobil,tgl_kembali_mobil,total_harga_transaksi from transaksi INNER JOIN mobil ON mobil.id_mobil = transaksi.id_mobil INNER JOIN karyawan ON karyawan.id_karyawan=transaksi.id_karyawan INNER JOIN customer ON customer.id_customer=transaksi.id_customer WHERE id_transaksi='$id'");
$data = mysql_fetch_array($query);
$supir=$data['id_supir'];
              $o=mysql_query("SELECT nama_supir FROM supir WHERE id_supir='$supir'");
              $b=mysql_fetch_assoc($o);

echo'
    <tr>
        <td style="text-align:left; height:50px;">Nama</td>
        <td style="padding-left:13px;"> : '.$data['nama_customer'].'  </td>
        <td style="text-align:left; height:50px; padding-left:200px;">Tgl Sewa</td>
        <td style="padding-left:50px;"> : '.TanggalIndo($data['tgl_sewa_mobil']).'  </td>

    </tr>
    <tr>
        <td style="text-align:left; height:50px;">Mobil</td>
        <td style="padding-left:13px;"> : '.$data['type_mobil'].'  </td>
        <td style="text-align:left; height:50px; padding-left:200px;">Tgl Kembali</td>
        <td style="padding-left:50px;"> : '.TanggalIndo($data['tgl_kembali_mobil']).'  </td>
    </tr>
    <tr>
        <td style="text-align:left; height:50px;">Supir</td>
        <td style="padding-left:13px;"> : '.$b['nama_supir'].'  </td>
        <td style="text-align:left; height:50px; padding-left:200px;">Total</td>
        <td style="padding-left:50px;"> : '.Rp." ".format_ribuan($data['total_harga_transaksi']).'  </td>
    </tr>
    <tr>
        <td style="text-align:left; height:50px;">Karyawan</td>
        <td style="padding-left:13px;"> : '.$data['nama_karyawan'].'  </td>

    </tr>';
?>
</table>
<!--CONTOH Code END-->
 
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>