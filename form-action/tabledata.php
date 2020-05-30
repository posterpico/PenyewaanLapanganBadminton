 <?php 
        //Deklarasi $iduser
        $iduser = $_SESSION['iduser'];
        //Memanggil Koneksi DB
        include "form-action/koneksi.php";
      
        //Mengecek Kondisi

        //Kondisi disaat iduser telah dideklarasi
        if(isset($iduser)){
          //Query untuk menampilkan data tabel NATURAL JOIN Pemesanan, Jadwal, Lapangan, User
          //Query2 untuk menampilkan data tabel NATURAL JOIN Pemesanan dan Pembayaran
          $query = "SELECT * FROM pemesanan natural join jadwal natural join lapangan natural join user where iduser='$iduser' ORDER BY idpesanan ASC";
          $query2 = "SELECT * FROM pemesanan natural join pembayaran where iduser='$iduser'";
          $getdata2 = mysqli_query($koneksi,$query2);

          //Mendapatkan data dari query $getdata2 dalam bentuk array
          while ($row = mysqli_fetch_assoc($getdata2)) {
            $idbayararr[]=$row['idpembayaran'];
            $metodearr[]=$row['metode'];
            $nominalarr[]=$row['nominal'];
          }

        //Kondisi iduser tidak dideklarasi
        }else{
          //Query untuk menampilkan data tabel NATURAL JOIN Pemesanan, Jadwal, Lapangan, User
          //Query2 untuk menampilkan data tabel NATURAL JOIN Pemesanan dan Pembayaran
          $query = "SELECT * FROM pemesanan natural join jadwal natural join lapangan natural join user ORDER BY idpesanan ASC";
           $query2 = "SELECT * FROM pemesanan natural join pembayaran ORDER BY idpesanan ASC";
          $getdata2 = mysqli_query($koneksi,$query2);
          while ($row = mysqli_fetch_assoc($getdata2)) {
            $idbayararr[]=$row['idpembayaran'];
            $metodearr[]=$row['metode'];
            $nominalarr[]=$row['nominal'];
          }
        }

        $getdata = mysqli_query($koneksi,$query);

        //Mendapatkan data Query $getdata dalam bentuk array
        while ($row = mysqli_fetch_assoc($getdata)) {
          $namauserarr[]=$row['nama'];
          $iduserarr[]=$row['iduser'];
          $idjadwalarr[]=$row['idjadwal'];
          $idpesananarr[]=$row['idpesanan'];
          $waktupesanarr[]=$row['waktupesan'];
          $hargaarr[]=$row['hargasewa'];
          $jamaarr[]=$row['jam'];
          $tanggalarr[]=$row['tanggal'];
          $namaarr[]=$row['namalapangan'];
          $durasiarr[]=$row['durasi'];
          $statuspesanarr[]=$row['statuspesan'];
        }
      
      //Deklarasi Variabel untuk yourorder.php
      $jumlah="";
      $jumlah = count($idjadwalarr);

?>