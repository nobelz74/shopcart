<?php

if( isset( $_POST['order-id'] ) ) {

	$customername	 = $_POST['customer-name'];
	$customeremail	 = $_POST['customer-email'];
	$customerphone	 = $_POST['customer-phone'] ? $_POST['customer-phone'] : '';
	$customeraddress = $_POST['customer-address'];
	$kodepos 		 = $_POST['kodepos'];
	$kecamatan  	 = $_POST['kecamatan'];
	$kabupaten   	 = $_POST['kabupaten'];
	$propinsi    	 = $_POST['propinsi'];
	$pengiriman 	 = $_POST['pengiriman'];
	$storename 		 = $_POST['store-name'];
	$storephone		 = $_POST['store-phone'];
	$storeemail		 = $_POST['store-email'];
	$storeaddress	 = $_POST['store-address'];
	$bankaccount1	 = $_POST['bank-info-1'] ? $_POST['bank-info-1'] : '';
	$bankaccount2	 = $_POST['bank-info-2'] ? $_POST['bank-info-2'] : '';
	$bankaccount3	 = $_POST['bank-info-3'] ? $_POST['bank-info-3'] : '';
	$bankaccount4	 = $_POST['bank-info-4'] ? $_POST['bank-info-4'] : '';
	$invoice 		 = $_POST['order-id'];
	$itemLength 	 = (int)$_POST['item_length'];
	$cartTotal		 = $_POST['cart_total'];
	$itemlist		 = '';
	$bankaccount	 = '';
	for( $i=0; $i<$itemLength; $i++ ) 
	{
		$j = $i + 1;
		$itemlist	.= '<tr>';
		$itemlist	.= '<td style="background-color: #ffffff; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">'.$_POST["item_name_".$j].'</td>';
		$itemlist	.= '<td style="background-color: #ffffff; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: center;">'.$_POST["item_qty_".$j].'</td>';
		$itemlist	.= '<td style="background-color: #ffffff; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">'.$_POST["item_price_".$j].'</td>';
		$itemlist	.= '<td style="background-color: #ffffff; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">'.$_POST["item_total_".$j].'</td>';
		$itemlist	.= '</tr>';	                                                      
	}
	
	if( $bankaccount1 != '' ) $bankaccount .= '<p>'.$bankaccount1.'</p>';
	if( $bankaccount2 != '' ) $bankaccount .= '<p>'.$bankaccount2.'</p>';
	if( $bankaccount3 != '' ) $bankaccount .= '<p>'.$bankaccount3.'</p>';
	if( $bankaccount4 != '' ) $bankaccount .= '<p>'.$bankaccount4.'</p>';
	
	// message
	$message  = '<html>';
	$message .= '<head>';
	$message .= '<title></title>';
	$message .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	$message .= '</head>';
	$message .= '<body style="background-color: #f1f1f5; color: #666666; font-weight: normal; line-height: 18px; font-style: normal; font-size: 12px; font-family: Calibri, Helvetica, sans-serif;">';
	$message .= '<div align="center">';
	$message .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
	$message .= '<tr>
					<td style="padding-bottom: 0px; padding-top: 10px;">&nbsp;</td>
	  			 </tr>';
	$message .= '
	  <tr>
		<td align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0" style="background: #FFF; border: 1px solid #d4d4d4;">
		  <tr>
			<td width="80%" style="border-bottom-color: #d4d4d4;background:#333333; border-bottom-style: solid; border-bottom-width: 3px; padding: 20px; font-weight: bold; font-size: 18px; color: #ffffff;">'.$storename.'</td>
			<td style="padding: 20px; border-bottom-color: #d4d4d4;background:#DC0000; border-bottom-style: solid; border-bottom-width: 3px; text-align: right; color: #ffffff; font-size: 16px; font-weight: bold;">No. Invoice : '.$invoice.'</td>
		  </tr>
		  <tr>
			<td colspan="2" style="line-height: 18px; padding: 20px; font-size: 13px; FONT-FAMILY:Calibri; color: #666666;"><p>Kepada : '.$customername.',</p>
			  <p>Terima kasih telah melakukan order di '.$storename.'. Email ini merupakan informasi tagihan terkait dengan order anda di toko kami. Berikut detail order anda :</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top: 1px solid #cccccc; border-left: 1px solid #cccccc">
				<tr>
				  <td width="40%" style="background-color: #DD5C14; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding:  5px 0 5px 10px; color: #ffffff; font-weight: bold; font-size: 12px; text-align: left;">Nama Item</td>
				  <td width="10%" style="background-color: #DD5C14; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px; color: #ffffff; font-weight: bold; font-size: 12px; text-align: center;">Qty</td>
				  <td width="21%" style="background-color: #DD5C14; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding:  5px 0 5px 10px; color: #ffffff; font-weight: bold; font-size: 12px; text-align: left;">Harga</td>
				  <td width="29%" style="background-color: #DD5C14; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding:  5px 0 5px 10px; color: #ffffff; font-weight: bold; font-size: 12px; text-align: left;">Sub Total</td>
				</tr>
				'.$itemlist.'
				<tr>
				  <td colspan="3" style="background-color: #ffffff; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: right;">Total</td>
				  <td style="background-color: #ffffff; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">'.$cartTotal.'</td>
				</tr>
			  </table> <br>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
 <td width="35%" style="background-color: #DADADA; border-right: 10px solid #ffffff; border-bottom: 2px solid #ffffff; padding:  5px 20px 5px 10px; color: #333333; font-weight: normal;font-size: 13px; FONT-FAMILY:Calibri; text-align: justify;line-height: 20px">

			  <p> Dengan rincian alamat pengiriman barang sebagai berikut: </p><br>
			  Nama Penerima : '.$customername.' <br>
			  E-mail Anda	: '.$customeremail.' <br>
			  Alamat Tujuan : '.$customeraddress.' <br>
			  No HP Anda	: '.$customerphone.'<br>
			  Kode Pos		: '.$kodepos.' <br>
			  Kecamatan     : '.$kecamatan.' <br>
			  Kabupaten		: '.$kabupaten.'<br>
			  Propinsi      : '.$propinsi.'<br>
			  Jasa Kirim    : '.$pengiriman.' <br><br>
			  
			  
			    <p >Kami akan mengirim order anda sesuai alamat yang tertera di atas, apabila ada perubahan data alamat pengiriman, mohon segera hubungi kami. '.$storename.' tidak bertanggung jawab apabila barang tidak terkirim ke tempat anda karena kesalahan penulisan alamat pengiriman.</p>
	
			 
			  </td>
			  		  
			  
			   <td width="65%" style="background-color: #DCDCDC; border-right: 2px solid #ffffff; border-bottom:2px solid #ffffff; padding:  5px 10px 5px 10px; color: #333333; font-weight: NORMAL; font-size: 13px; FONT-FAMILY:Calibri;text-align: justify;line-height: 20px;">
			  <p >Lakukan pembayaran sejumlah total order anda yaitu <span style="font-weight: bold">'.$cartTotal.'</span> + biaya pengiriman (Biaya pengiriman akan kami informasikan melalui email) ke salah satu rekening kami berikut ini :</p>
			  '.$bankaccount.'
			  
			  <p>Setelah melakukan pembayaran, konfirmasikan kepada kami dengan cara menghubungi kami via email atau sms ke '.$storephone.' dengan format :</p>	  
			  <p style="font-weight: bold; color: #DD5C15;">KONFIRMASI PEMBAYARAN # NO INVOICE # KE REKENING # DARI REKENING # ATAS NAMA</p> <p>Contoh :</p>
			  <p style="font-weight: bold; color: #DD5C15;">KONFIRMASI PEMBAYARAN # 2-320 # BANK MANDIRI # BANK BCA # AGUNG BHARATA</p>	
			  
			  <p>Order anda akan kami kirim, setelah pembayaran kami terima. Resi pengiriman kami infokan via SMS + Email.</p>
			  
			  <br>
 <p  style="font-weight: bold;text-align: right;">Terima kasih,</p>
 <p  style="font-weight: bold;text-align:right;">'.$storename.'<br>'.$storeaddress.'<br>'.$storephone.'<br>'.$storeemail.'</p>  <br> 
			  
</td>	</tr>

 
 </td>	</tr>
			  
			 
			  
		</table>

			  <tr>
			
			  
			  </td>
			</tr>
		</table></td>
	  </tr>
	  <tr>
		<td style="padding-bottom: 10px;">&nbsp;</td>
	  </tr>
	</table>
	</div>
	</body>
	</html>
	';
	
	$to  = $customername.' <'.$customeremail.'>';
	$subject = $storename.' - Informasi Order No. '.$invoice;
	$headers  = 'From: '.$storename.' <'.$storeemail.'>' . "\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

/////////////////////////////////////////////////////////////////////////////////////

	$to1 = $storeemail;
	$subject1  = $storename.' - New Order '.$invoice;
	$message1  = '<p>Ada order baru di '.$storename.'</p>';
	$message1 .= '<p>No Invoice: '.$invoice.'</p>';
	$message1 .= '<p>Nama Customer: '.$customername.'</p>';
	$message1 .= '<p>Email Customer: '.$customeremail.'</p>';
	$message1 .= '<p>Alamat Customer: '.$customeraddress.'</p>';
	$message1 .= '<p>No HP Customer: '.$customerphone.'</p>';
	$message1 .= '<p>Kode Pos:'.$kodepos.'</p>';
	$message1 .= '<p>Kecamatan : '.$kecamatan.'</p>';
	$message1 .= '<p>Kabupaten: '.$kabupaten.'</p>';				
	$message1 .= '<p>Provinsi: '.$propinsi.'</p>';
	$message1 .= '<p>Jasa Kirim: '.$pengiriman.'</p>';
	$message1 .= '<p>Data order sebagai berikut:</p>';
		$message1 .= '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top: 1px solid #cccccc; border-left: 1px solid #cccccc">
				<tr>
				  <td width="34%" style="background-color: #DD5C14; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px 0 5px 10px;  color: #ffffff; font-weight: bold; font-size: 12px; text-align: left;">Nama Item</td>
				  <td width="11%" style="background-color: #DD5C14; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px; color: #ffffff; font-weight: bold; font-size: 12px; text-align: center;">Qty</td>
				  <td width="26%" style="background-color: #DD5C14; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px 0 5px 10px; color: #ffffff; font-weight: bold; font-size: 12px; text-align: left;">Harga</td>
				  <td width="29%" style="background-color: #DD5C14; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px 0 5px 10px; color: #ffffff; font-weight: bold; font-size: 12px; text-align: left;">Sub Total</td>
				</tr>
				'.$itemlist.'
				<tr>
				  <td colspan="3" style="background-color: #ffffff; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: right;">Total</td>
				  <td style="background-color: #ffffff; border-right: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">'.$cartTotal.'</td>
				</tr>
			  </table>';
	$headers1  = 'From: '.$customername.' <'.$customeremail.'>' . "\r\n";
	$headers1 .= 'MIME-Version: 1.0' . "\r\n";
	$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$sendtocustomer = mail($to, $subject, $message, $headers);
	$sendtoowner = mail($to1, $subject1, $message1, $headers1);
	
	if( $sendtocustomer ) {
	  if ( $sendtoowner ) {
	    header('Location: '.$_POST['thankyoupage']);
	  }
	}
	
} else {
	echo 'php send script active!';
}

?>
