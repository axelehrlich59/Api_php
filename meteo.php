<?php
$curl = curl_init('https://samples.openweathermap.org/data/2.5/weather?q=Paris,fr&APPID=363cf9c55fee5ebdd4c5215e5a487bea&units=metric&lang=fr');
curl_setopt_array($curl, [
    CURLOPT_CAINFO => __DIR__ . DIRECTORY_SEPARATOR . 'cert.cer',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 1

]);

$data = curl_exec($curl);
if($data === false) {
  var_dump(curl_error($curl));
}else {
    if(var_dump(curl_getinfo($curl , CURLINFO_HTTP_CODE)) === 200) {
        $data = json_decode($data, true);
        echo 'il fera' . $data['main']['temp'] . '°C';
    }
   
}
curl_close($curl);