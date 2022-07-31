<?php

function handphone($nohp)
{
	$nohp = str_replace(" ","",$nohp);
	$nohp = str_replace("(","",$nohp);
	$nohp = str_replace(")","",$nohp);
	$nohp = str_replace(".","",$nohp);
	$nohp = str_replace("-","",$nohp);

	if (!preg_match('/[^+0-9]/', trim($nohp))) {
		if (substr(trim($nohp), 0, 3) == "+62") {
			$nohp = '62'.substr(trim($nohp), 3);
		} elseif (substr(trim($nohp), 0, 1) == 0) {
			$nohp = '62'.substr(trim($nohp), 1);
		}

		return $nohp;
	}
}

function reHandphone($nohp) {
	if (substr(trim($nohp), 0, 2) == "62") {
		$nohp = '0'.substr(trim($nohp), 2);
	}

	return $nohp;
}

function rupiah($value)
{
	$harga = number_format($value,0,',','.');

	return $harga;
}