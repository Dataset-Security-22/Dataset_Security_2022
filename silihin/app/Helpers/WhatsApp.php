<?php

function WaSend($nomer, $nama, $invoice = null, $kendaraan = null, $harga = null, $dari = null, $tujuan = null, $hari = null)
{
	$my_apikey = "BQD0XCY7BTZA5EB8CTNS";
	$message = PesanWa($nama, $kendaraan, $harga, $invoice, $dari, $tujuan, $hari);
	$api_url = "http://panel.rapiwha.com/send_message.php";
	$api_url .= "?apikey=". urlencode ($my_apikey);
	$api_url .= "&number=". urlencode ($nomer);
	$api_url .= "&text=". urlencode ($message);
	$my_result_object = json_decode(file_get_contents($api_url, false));

	return;
}

function PesanWa($nama, $kendaraan, $harga, $invoice, $dari, $tujuan, $hari)
{
	$message = "Ada pesan dari web silihin.co.vu";
	$message .= "\n";
	$message .= "\n";
	$message .= "Dari : " . $nama;
	$message .= "\nInvoice : " . $invoice;
	$message .= "\nKendaraan : " . $kendaraan;
	$message .= "\nHarga : Rp." . $harga;
	$message .= "\nTujuan : " . $dari . " - " .$tujuan;
	$message .= "\nSelama : " . $hari . ' Hari';

	return $message;
}