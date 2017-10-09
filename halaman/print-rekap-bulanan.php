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

<table border="1" style="border-collapse:collapse;margin-left:-40px;margin-right:-40px;" width="100%">
    <tr>
            <th style="text-align:center;">mobil</th>
              <th style="text-align:center;">supir</th>
              <th style="text-align:center;">karyawan</th>
              <th style="text-align:center;">customer</th>
              <th style="text-align:center;">sewa</th>
              <th style="text-align:center;">kembali</th>
              <th style="text-align:center;">Total</th>
              <th style="text-align:center;">Status</th>
    </tr>
<?php 
    $kalender=CAL_GREGORIAN;
    $tanggal1= "01";
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $tanggalakhir=cal_days_in_month($kalender, $bulan, $tahun);

    $awal_bulan = $tahun."-".$bulan."-".$tanggal1;
    $akhir_bulan=$tahun."-".$bulan."-".$tanggalakhir;
    $query = mysql_query("SELECT id_transaksi,id_supir,transaksi.status_mobil,mobil.type_mobil,karyawan.nama_karyawan,customer.nama_customer,tgl_sewa_mobil,tgl_kembali_mobil,total_harga_transaksi from transaksi INNER JOIN mobil ON mobil.id_mobil = transaksi.id_mobil INNER JOIN karyawan ON karyawan.id_karyawan=transaksi.id_karyawan INNER JOIN customer ON customer.id_customer=transaksi.id_customer WHERE tgl_sewa_mobil BETWEEN '$awal_bulan' AND '$akhir_bulan'");

    while($data=mysql_fetch_array($query)){
        $supir=$data['id_supir'];
              $o=mysql_query("SELECT nama_supir FROM supir WHERE id_supir='$supir'");
              $b=mysql_fetch_assoc($o);
echo'
    <tr>
        <td style="text-align:center; font-size:11.5;">'.$data['type_mobil'].'</td>
        <td style="padding-left:6px; font-size:11.5;">'.$b['nama_supir'].'</td>
        <td style="padding-left:6px; font-size:11.5;">'.$data['nama_karyawan'].'</td>
        <td style="text-align:center; font-size:11.5;">'.$data['nama_customer'].'</td>
        <td style="text-align:center; font-size:11.5;">'.TanggalIndo($data['tgl_sewa_mobil']).'</td>
        <td style="text-align:center; font-size:11.5;">'.TanggalIndo($data['tgl_kembali_mobil']).'</td>
        <td style="text-align:center; font-size:11.5;">'.format_ribuan($data['total_harga_transaksi']).'</td>
        <td style="text-align:center; font-size:11.5;">'.$data['status_mobil'].'</td>

    </tr>';
}
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