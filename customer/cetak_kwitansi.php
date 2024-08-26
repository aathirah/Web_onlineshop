<body onload ="javascript:window.print()"
style="margin: auto; width: 100%">
<div style="margin-left: 10px; margin: 10px;"></div>



<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center"><font size="7"><b> 
            TOKO ANYAR
        </b></font></td>
    </tr>
    <tr>
        <td align="center"><font size="3"><b> 
        RT. 01/03, Jl. Raya Sunan Gunung Jati Blok Kecitran, Purwawinangun,
        Kec. Suranenggala, Kabupaten Cirebon, Jawa Barat 45152
        </font></td>
    </tr>

        
</table><br>
<div style="border-bottom: 3px dotted gray;"></div><br>
<label><font size="5"> <center><u>
    KWITANSI PEMBELIAN BARANG
</u></center></font></label>
<p>&nbsp;</p>

                        <table style="border: 1px solid gray" width="100%">
                        <tr>
                        <th style="border-right: 1px solid gray">Item</th>  
                        <th style="border-right: 1px solid gray">Nama Produk</th>
                        <th style="border-right: 1px solid gray">Harga Produk</th>
                        <th style="border-right: 1px solid gray">Jumlah Beli</th>
                        <th style="border-right: 1px solid gray">Total</th>
                        </tr>
                        

                        <?php 
						include"../koneksi.php"; 
						$tot = array();
						$sqlp = mysqli_query($con, "Select * From tbl_checkout INNER JOIN tbl_bayar ON tbl_bayar.no_referensi 
            =tbl_checkout.no_referensi INNER JOIN tbl_produk ON
						tbl_checkout.id_produk = tbl_produk.id_produk INNER JOIN tbl_customer ON tbl_checkout.id_customer = 
						tbl_customer.id_customer where tbl_checkout.id_customer = '$_GET[id]'AND tbl_checkout.status='Sudah di Bayar'");
						while ($rp = mysqli_fetch_array($sqlp)){
            $status=$rp['status_bayar'];
            $product_id = $rp['id_produk']; // Ambil ID produk sebagai kunci
            $total = $rp['total']; // Ambil nilai 'total'
            $tot[$product_id] = $total;
            



						
						 ?>
                         
                        
                      
                     
                      <tr>
                        <td style="border-right: 1px solid gray; border-top: 1px 
                      solid gray; padding: 3px 5px;"><img src="<?php echo"../admin/foto_produk/$rp[gambar]"?>" alt="" width='100' height='100' /></td>
                        <td style="border-right: 1px solid gray; border-top: 1px 
                      solid gray; padding: 3px 5px;"><?php echo"$rp[nm_produk]" ?><p>No Belanja:<?php echo"$rp[no_belanja]" ?> </p></td>
                        <td style="border-right: 1px solid gray; border-top: 1px 
                      solid gray; padding: 3px 5px;"><?php echo"$rp[harga]" ?></td>
                        <td style="border-right: 1px solid gray; border-top: 1px 
                      solid gray; padding: 3px 5px;"><?php echo"$rp[qty]" ?></td>
                        <td style="border-right: 1px solid gray; border-top: 1px 
                      solid gray; padding: 3px 5px;"><?php echo "$rp[total]"?></td>
                        
                      </tr>
                      <?php }?>
                      <tr>
                        <th colspan="4" style="border-right: 1px solid gray">Total Belanja</th> 
                        <td style="border-right: 1px solid gray; border-top: 1px 
                      solid gray; padding: 3px 5px;"><?php echo "Rp." .number_format(array_sum($tot),0,',','.').""?></td>
                      </tr>

                      <tr>
                        <th colspan="4" style="border-right: 1px solid gray">Pajak</th> 
                        <td style="border-right: 1px solid gray; border-top: 1px 
                      solid gray; padding: 3px 5px;">10%</td>
                      </tr>

                      <tr>
                        <th colspan="4" style="border-right: 1px solid gray">Ongkos Kirim</th> 
                        <td style="border-right: 1px solid gray; border-top: 1px 
                      solid gray; padding: 3px 5px;">Rp. 10.000</td>
                      </tr>
                      </tr>

                      </table>
</body>