<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<html>
    <head>
        <title> GOR Online </title>
        <link href="styles/table.css" rel="stylesheet"/>
        <link href="styles/styles.css" rel="stylesheet"/>
        <link href="styles/form-style.css" rel="stylesheet"/>
        <script>
            $(document).ready(function() {
         $('input:radio').change(function() {
        var status= $(this).attr('id');
        var idorder= $(this).attr('value');
        var name= $(this).attr('name');
        $.post('form-action/admincontrolact.php', {idorder : idorder, status : status}, function(data){
            $('#update' + idorder).text(data);
        });

         });
        });
        </script>
    </head>
    
    <body>
        <?php
        include "nav.php";
        /* Call tabledata.php for Table Content */
        include "form-action/tabledata.php";
        /* Check Admin if Logged in */
        if(!isset($_SESSION['admin'])){
            echo "<script>
            alert('Anda tidak memiliki izin!!');
            window.location.replace('index.php?logout=1');
            </script>";
        }
        ?>
        
            
       <p style="text-align:center; font-size:30px; margin-top:30px; color:white;"><strong>Kelola Pemesanan Pengguna</strong</p>
       <br>

        <!-- Start to make Order History Table Here -->
       <div class="limiter">
	      <div class="container-table100">
		    <div class="wrap-table100">
	        	<div class="table100">
        <table>
        <thead>
        <tr class="table100-head">
            <th><strong>IDOrder</strong></th>
            <th><strong>Waktu Pesan</strong></th>
            <th><strong>ID User</strong></th>
            <th><strong>Nama</strong></th>
            <th><strong>Tanggal Pesan</strong></th>
            <th><strong>Nama Lapangan</strong></th>
            <th><strong>Jam Sewa</strong></th>
            <th><strong>Durasi Sewa</strong></th>
            <th><strong>Harga</strong></th>
            <th><strong>Status</strong></th>
        </tr>
        </thead>
        <tbody>
             <!-- Start show Table Data -->
             <!-- Make for Function to Show Generated Table Data -->
            <?php for($i = 0; $i < $jumlah; $i++) : ?>
            <tr>
            <td><strong>#<?php echo $idpesananarr[$i];?></strong></td>
            <td><strong><?php echo $waktupesanarr[$i];?></strong></td>
            <td ><strong><?php echo $iduserarr[$i];?></strong></td>
            <td ><strong><?php echo $namauserarr[$i];?></strong></td>
            <td><strong><?php echo $tanggalarr[$i];?></strong></td>
            <td><strong><?php echo $namaarr[$i];?></strong></td>
            <td><strong><?php echo $jamaarr[$i];?></strong></td>
            <td><strong><?php echo $durasiarr[$i];?> Jam</strong></td>   
            <td ><strong><?php echo $hargaarr[$i];?></strong></td>
            
            <td><strong><span id="update<?php echo $idpesananarr[$i];?>"><?php echo $statuspesanarr[$i];?></span></strong><br>
            <?php 
            /* Check if Status Pesan Lunas */
                if($statuspesanarr[$i]!="LUNAS") :?>
                <input type="radio" id="Tersedia" name="status<?php echo $i?>" value="<?php echo $idpesananarr[$i];?>" 
                <?php if($statuspesanarr[$i]=="Tersedia") : ?> checked <?php endif;?>/> Tersedia
                <input type="radio" id="Tidak Tersedia" name="status<?php echo $i?>" value="<?php echo $idpesananarr[$i];?>"
                <?php if($statuspesanarr[$i]=="Tidak Tersedia") : ?> checked <?php endif;?>/> Tidak Tersedia </input>
                </form>
                <?php elseif($statuspesanarr[$i]=="LUNAS") : ?>
                <form style="margin:0;" id="orderForm" action = "invoice.php" method="POST">
                <input type="hidden" value="<?php echo $idbayararr[$i]?>" name="idbayar">
                <input type="hidden" value="<?php echo $metodearr[$i]?>" name="metode">
                <input type="hidden" value="Rp<?php echo $nominalarr[$i]?>,00" name="nominal">
                <input type="hidden" value="<?php echo $idpesananarr[$i]?>" name="idpesanan">
                <button type="submit" class="tablebutton">Invoice</button>
                </form>
        </div>
                <?php endif;?>
            </td>
        </tr>
            <?php endfor;?>

        </tbody>
        </table>
        <!-- End of Tables-->

				</div>
			</div>
		</div>
    </div>
    
    <footer> GOR Caimulang 2019-2020 ©</footer>
    </body>
</html>