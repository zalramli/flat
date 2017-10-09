<?php
    include "config/koneksi.php";
   
    $sel_prov="select * from mobil where id_mobil='".$_POST["mobil"]."'";
    $q=mysql_query($sel_prov);
    while($data_prov=mysql_fetch_array($q)){
   
    ?>
    <br>
    
        <option value="<?php echo $data_prov["harga_mobil"] ?>"><?php echo $data_prov["harga_mobil"] ?></option><br>
   
    <?php
    }
    ?>