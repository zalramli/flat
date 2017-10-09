<?php
    include "config/koneksi.php";
   
    $sel_prov="select * from supir where id_supir='".$_POST["supir"]."'";
    $q=mysql_query($sel_prov);
    while($data_prov=mysql_fetch_array($q)){
   
    ?>
    <br>

        <option value="<?php echo $data_prov["harga_supir"] ?>"><?php echo $data_prov["harga_supir"] ?></option><br>
    <?php
    }
    ?>