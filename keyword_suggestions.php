<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if (isset($_GET['keyword']) && isset($_GET['engine'])) {
    // Anahtar kelimeyi filtrele ve geçersiz karakterleri kontrol et
    $keyword = filter_input(INPUT_GET, 'keyword', FILTER_SANITIZE_STRING);
    if (preg_match('/[^a-zA-Z0-9ğüşıöçĞÜŞİÖÇ ]/', $keyword)) {
        echo json_encode(["error" => "Geçersiz karakterler içeren anahtar kelime"]);
        exit;
    }

    $keyword = urlencode($keyword);
    $engine = $_GET['engine'];

    $url = '';

    // Seçilen arama motoruna göre URL'yi belirle
    switch ($engine) {
        case 'google':
            $url = "https://suggestqueries.google.com/complete/search?client=chrome&q=$keyword";
            break;
        case 'bing':
            $url = "https://api.bing.com/osjson.aspx?JsonType=callback&Query=$keyword&Market=tr-tr";
            break;
        case 'youtube':
            $url = "https://suggestqueries.google.com/complete/search?client=chrome&ds=yt&q=$keyword";
            break;
        case 'yahoo':
            $url = "https://search.yahoo.com/sugg/gossip/gossip-us-ura/?command=$keyword&nresults=20";
            break;
        case 'duckduckgo':
            $url = "https://duckduckgo.com/ac/?q=$keyword";
            break;
        case 'wikipedia':
            $url = "https://en.wikipedia.org/w/api.php?action=query&list=search&srsearch=$keyword&format=json";
            break;
        default:
            echo json_encode(["error" => "Geçersiz arama motoru"]);
            exit;
    }

    // API isteğini yap
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // HTTPS sertifikası sorunlarını atlamak için
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36",
        "Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7",
        "Accept: application/json, text/javascript, */*; q=0.01",
        "Connection: keep-alive"
    ]);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo json_encode(["error" => "API isteği başarısız: " . curl_error($ch)]);
        curl_close($ch);
        exit;
    }
    curl_close($ch);

    // Yanıtı işleyin ve önerileri çıkarın
    echo json_encode(processResponse($engine, $response));
} else {
    echo json_encode(["error" => "Anahtar kelime ve arama motoru parametreleri gereklidir"]);
}

function processResponse($engine, $response) {
    $suggestions = [];

    if ($engine === 'yahoo') {
        // XML yanıtını SimpleXML ile yükleyelim
        $xmlData = simplexml_load_string($response);

        // XML verisi doğru yüklendiyse önerileri işleyelim
        if ($xmlData !== false) {
            foreach ($xmlData->s as $result) {
                // 'k' özniteliğini suggestions dizisine ekleyelim
                $suggestions[] = (string) $result['k'];
            }
        } else {
            // XML okunamazsa hata mesajı döndür
            return ["error" => "XML verisi işlenemedi veya beklenen formatta değil."];
        }
    } elseif ($engine === 'duckduckgo') {
        // DuckDuckGo JSON yanıtı işleme
        $data = json_decode($response, true);
        if (isset($data)) {
            foreach ($data as $item) {
                $suggestions[] = $item['phrase'];
            }
        } else {
            return ["error" => "DuckDuckGo yanıtı işlenemedi."];
        }
    } elseif ($engine === 'wikipedia') {
        // Wikipedia JSON yanıtını işleme
        $data = json_decode($response, true);
        if (isset($data['query']['search'])) {
            foreach ($data['query']['search'] as $item) {
                $suggestions[] = $item['title'];
            }
        } else {
            return ["error" => "Wikipedia yanıtı işlenemedi."];
        }
    } else {
        // JSON formatındaki diğer yanıtlar için
        $data = json_decode(trim($response, '()'), true);
        if (isset($data[1])) {
            $suggestions = $data[1];
        } else {
            return ["error" => "Beklenmedik yanıt formatı."];
        }
    }

    // Önerileri JSON formatında döndür
    return ["suggestions" => $suggestions];
}
