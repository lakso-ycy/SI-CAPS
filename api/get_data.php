<?php
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 1);

function fetchData($tanggal_awal) {
    $api_url = "https://api-sp2kp.kemendag.go.id/report/api/average-price/export-area-daily-json";
    
    $found_dates = [];
    $max_check_days = 30; // Cek maksimal 30 hari ke belakang
    $current_date = strtotime($tanggal_awal);

    for ($i = 0; $i < $max_check_days; $i++) {
        $formatted_date = date("Y-m-d", $current_date);
        
        $post_data = [
            "start_date" => $formatted_date,
            "end_date" => $formatted_date,
            "level" => 3,
            "variant_ids" => "",
            "kode_provinsi" => 35,
            "kode_kab_kota" => 3528,
            "pasar_id" => 453,
            "skip_sat_sun" => true,
            "tipe_komoditas" => 1
        ];

        $form_data = http_build_query($post_data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/x-www-form-urlencoded",
            "Accept: application/json"
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $form_data);

        $response = curl_exec($ch);
        curl_close($ch);

        if ($response !== false) {
            $data = json_decode($response, true);
            if (!empty($data['data'])) {
                foreach ($data['data'] as $item) {
                    if (!empty($item['daftarHarga']) && $item['daftarHarga'][0]['harga'] > 0) {
                        $variant_id = $item['variant_id'];
                        $found_dates[$formatted_date][$variant_id] = $item;
                    }
                }
            }
        }

        // Jika sudah mendapatkan 3 tanggal valid, hentikan pencarian
        if (count($found_dates) >= 3) {
            break;
        }

        // Kurangi 1 hari dari tanggal saat ini
        $current_date = strtotime("-1 day", $current_date);
    }

    return $found_dates;
}

$selected_date = isset($_GET['tanggal']) ? $_GET['tanggal'] : date("Y-m-d");
$data_by_dates = fetchData($selected_date);

if (empty($data_by_dates)) {
    echo json_encode(["error" => "Tidak ada data dalam rentang waktu yang tersedia"]);
    exit;
}

// 🔹 Memproses data untuk frontend
$cleaned_data = [];

foreach ($data_by_dates as $date => $variant_items) {
    foreach ($variant_items as $variant_id => $item) {
        $variant_name = $item['variant'];
        $harga = $item['daftarHarga'][0]['harga'];

        // Jika belum ada data untuk variant_id ini, inisialisasi arraynya
        if (!isset($cleaned_data[$variant_id])) {
            $cleaned_data[$variant_id] = [
                "variant_id" => $variant_id,
                "variant" => $variant_name,
                "date" => [],
                "harga" => [],
                "status" => "turun", // Default status
                "jumlah" => 0,
                "persen" => "0%"
            ];
        }

        // Tambahkan harga & tanggal
        $cleaned_data[$variant_id]["date"][] = $date;
        $cleaned_data[$variant_id]["harga"][] = $harga;
    }
}

//  Menghitung kenaikan/penurunan harga
foreach ($cleaned_data as &$item) {
    $item['date'] = array_reverse($item['date']);
    $item['harga'] = array_reverse($item['harga']);

    if (count($item['harga']) > 1) {
        $last_price = $item['harga'][count($item['harga']) - 1]; // Harga terbaru
        $prev_price = $item['harga'][count($item['harga']) - 2]; // Harga sebelumnya

        if ($last_price > $prev_price) {
            $status = "naik";
            $jumlah = $last_price - $prev_price;
            $persen = round(($jumlah / $prev_price) * 100, 2);
        } elseif ($last_price < $prev_price) {
            $status = "turun";
            $jumlah = $prev_price - $last_price;
            $persen = round(($jumlah / $prev_price) * 100, 2);
        } else {
            $status = "tetap"; // Harga tidak berubah
            $jumlah = 0;
            $persen = "0%";
        }

        // Update status dan perubahan harga
        $item['status'] = $status;
        $item['jumlah'] = $jumlah;
        $item['persen'] = $persen;
    }
}


// 🔹 Ubah ke array numerik agar JSON rapi
echo json_encode(array_values($cleaned_data), JSON_PRETTY_PRINT);
?>
