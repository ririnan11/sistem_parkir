<?php
function hitungBiayaParkir($jenis_kendaraan, $jam_masuk, $jam_keluar) {
    $waktu_masuk = strtotime($jam_masuk);
    $waktu_keluar = strtotime($jam_keluar);
    
    $selisih_waktu = $waktu_keluar - $waktu_masuk;
   
    if ($jenis_kendaraan == "motor") {
        $biaya_per_jam = 5000;
        
        if ($selisih_waktu > 3600) {
            $biaya_per_jam += 2000; 
        }
    } elseif ($jenis_kendaraan == "mobil") {
        $biaya_per_jam = 7000; 
        
        if ($selisih_waktu > 3600) {
            $biaya_per_jam += 3000; 
        }
    } elseif ($jenis_kendaraan == "sepeda") {
        $biaya_per_jam = 2000; 
       
        if ($selisih_waktu > 3600) {
            $biaya_per_jam += 500; 
        }
    } else {
       
        $biaya_per_jam = 0;
        echo "Jenis Kendaraan Tidak Valid!";
        return;
    }
    $biaya_parkir = ($selisih_waktu / 3600) * $biaya_per_jam; 
    return $biaya_parkir;
}
$no_plat = $_POST['no_plat'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$jam_masuk = $_POST['jam_masuk'];
$jam_keluar = $_POST['jam_keluar'];
$biaya_parkir = hitungBiayaParkir($jenis_kendaraan, $jam_masuk, $jam_keluar);

echo "<h1>Hasil Perhitungan Biaya Parkir</h1>";
echo "Nomor Plat Kendaraan: " . $no_plat . "<br>";
echo "Jenis Kendaraan: " . $jenis_kendaraan . "<br>";
echo "Jam Masuk: " . $jam_masuk . "<br>";
echo "Jam Keluar: " . $jam_keluar . "<br>";
echo "Biaya Parkir: " . number_format($biaya_parkir, 0, ',', '.') . " Rupiah<br>";
?>
