<?php
class OpenWeather {
        private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }


    public function getForecast(string $city): ?array
    {
       $curl = curl_init("https://home.openweathermap.org/data/2.5/weather?q={$city}&APPID={$this->apiKey}&units=metric&lang=fr");
       curl_setopt_array([
        CURLOPT_RETURNTRANSFER + true,
        CURLOPT_CAINFO => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cert.cer',
        CURLOPT_TIMEOUT => 1
       ]);
       $data = curl_exec($curl);
       if($data === false || curl_getinfo($curl,CURLINFO_HTTP_CODE) !== 200) {
           return null;
       }
    }
}