<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapat Butonu</title>
</head>
<body>

<?php


$json_dosya_yolu = "dosya.json";


if (isset($_POST['kapat_butonu'])) {
    try {
        
        $json_icerik = json_decode(file_get_contents($json_dosya_yolu), true);

       
        $json_icerik['deger'] = 0;

        
        file_put_contents($json_dosya_yolu, json_encode($json_icerik, JSON_PRETTY_PRINT));

        echo "Deger basariyla guncellendi.";
    } catch (Exception $e) {
        echo "Hata: " . $e->getMessage();
    }
}

?>

<form method="post">
    <input type="submit" name="kapat_butonu" value="Kapat">
</form>

</body>
</html>