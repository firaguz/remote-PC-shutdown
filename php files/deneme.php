<?php


$json_data = file_get_contents("php://input");
$request_data = json_decode($json_data);


$json_dosya_yolu = "dosya.json";

try {
   
    if ($request_data->deger !== 0 && $request_data->deger !== 1) {
        throw new Exception("Hatalı değer. Sadece 0 veya 1 olmalı.");
    }

   
    $json_icerik = json_decode(file_get_contents($json_dosya_yolu), true);


    $json_icerik['deger'] = $request_data->deger;

   
    file_put_contents($json_dosya_yolu, json_encode($json_icerik, JSON_PRETTY_PRINT));

    
    echo json_encode(array("success" => true, "message" => "Değer başarıyla güncellendi."));
} catch (Exception $e) {
    echo json_encode(array("success" => false, "message" => "Hata: " . $e->getMessage()));
}

?>
