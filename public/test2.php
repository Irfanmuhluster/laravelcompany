<?php

$join_karyawan = '01-05-2021';
$rencana_cuti = '05-11-2021';
$ambil_cuti = 1;
$jumahcuti = 7;
$durasi_cuti = 1;


$join_karyawan_date = date('Y-m-d', strtotime($join_karyawan));
$rencana_cuti_date = date('Y-m-d', strtotime($rencana_cuti));


 
$karyawanbolehmengambilcuti = date('Y-m-d', strtotime($join_karyawan. ' + 180 days'));


if ($rencana_cuti_date <= $karyawanbolehmengambilcuti) {
	echo " belum 180 hari";
} else {
	if ($ambil_cuti > $durasi_cuti) {
		echo "hanya boleh mengambil 1 hari cuti";
	} else {
		echo " mengambil satu hari cuti";
	}

}

// $cutikantor = 14;

// $karyawwanbaru = 180;

// $cutipribadi = $cutikantor - $cutibersama;

