<html>
    <head>
        <title> GOR Online </title>
        <link href="styles/table.css" rel="stylesheet"/>
    </head>
    
    <body>
        <!-- Check if User Access this page after order page or other pages -->
        <?php
        include "nav.php";
        if(isset($_SESSION['idjadwal']) && !isset($_SESSION['alertval'])) {
         echo "<script>alert('Order anda telah ditambahkan');</script>";
         $idjadwal = $_SESSION['idjadwal'];
         $_SESSION['alertval'] = 1;
        }

        //Call tabledata for table data
        include "form-action/tabledata.php";?>
            
       <p style="text-align:center; font-size:30px; margin-top:30px; color:white;"><strong>Histori Pemesanan</strong</p>
       <br>

       <!-- Check if user has Order History -->
       <?php if($jumlah=="") {
            echo "<script>
            alert('Anda tidak memiliki Histori Order');
            window.location.replace('dateselection.php');
            </script>";
        }
        ?>


    <!-- Start to build Table -->
    <div class="limiter">
	    <div class="container-table100">
		    <div class="wrap-table100">
		        <div class="table100">
                <table>
                <thead>
                <tr class="table100-head">
                    <th><strong>IDOrder</strong></th>
                    <th><strong>Waktu Pesan</strong></th>
                    <th><strong>Tanggal Pesan</strong></th>
                    <th><strong>Nama Lapangan</strong></th>
                    <th><strong>Jam Sewa</strong></th>
                    <th><strong>Durasi Sewa</strong></th>
                    <th><strong>Harga</strong></th>
                    <th><strong>Status</strong></th>
                </tr>
                </thead>
                <tbody>
                <?php for($i = 0; $i < $jumlah; $i++) : ?>
                        <tr>
                        <td><strong>#<?php echo $idpesananarr[$i];?></strong></td>
                        <td><strong><?php echo $waktupesanarr[$i];?></strong></td>
                        <td><strong><?php echo $tanggalarr[$i];?></strong></td>
                        <td><strong><?php echo $namaarr[$i];?></strong></td>
                        <td><strong><?php echo $jamaarr[$i];?></strong></td>
                        <td><strong><?php echo $durasiarr[$i];?> Jam</strong></td>
                        <td ><strong>Rp<?php echo $hargaarr[$i];?>,00</strong></td>
                        <td><strong><?php echo $statuspesanarr[$i];?></strong><br>
                        <?php if($statuspesanarr[$i]=="Tersedia") : ?>
                            <form style="margin:0;" id="orderForm" action = "form-action/bayaract.php" method="POST">
                            <input type="hidden" value="<?php echo $idpesananarr[$i]?>" name="idpesanan">
                            <input type="hidden" value="<?php echo $hargaarr[$i]?>" name="harga">
                            <input type="hidden" value="<?php echo $tanggalarr[$i]?>" name="tanggal">
                            <input type="hidden" value="<?php echo $jamaarr[$i]?>" name="jam">
                            <input type="hidden" value="<?php echo $durasiarr[$i]?>" name="durasi">
                            <button type="submit" class="tablebutton">Bayar</button>
                            </form>
                        <?php elseif($statuspesanarr[$i]=="LUNAS") : ?>
                            <form style="margin:0;" id="orderForm" action = "invoice.php" method="POST">
                            <input type="hidden" value="<?php echo $idbayararr[$i]?>" name="idbayar">
                            <input type="hidden" value="<?php echo $metodearr[$i]?>" name="metode">
                            <input type="hidden" value="<?php echo $nominalarr[$i]?>" name="nominal">
                            <input type="hidden" value="<?php echo $idpesananarr[$i]?>" name="idpesanan">
                            
                            <button type="submit" class="tablebutton">Invoice</button>
                            </form>
                        <?php endif;?>
                        </td>
                </tr>
                <?php endfor;?>
              
                </tbody>
                </table>
				</div>
			</div>
		</div>
	</div>
    <footer> GOR Caimulang 2019-2020 ©</footer>
    </body>
</html>