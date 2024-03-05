<?php

namespace Model;

use Model\Weather_Interface as Weather_Interface;

require_once("./vendor/autoload.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Weather
 *
 * @author webre
 */
class Weather implements Weather_Interface
{
    //put your code here
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get_cities()
    {
        $cities_file_data = json_decode(file_get_contents(__CITIES_FILE__), true);
        $egyptain_cities = array_filter($cities_file_data, function ($city) {
            return $city["country"] === 'EG';
        });
        $egyptain_cities = array_map(function ($city) {
            return ["id" => $city["id"], "name" => $city["name"], "lat" => $city["coord"]["lat"], "lon" => $city["coord"]["lon"]];
        }, $egyptain_cities);
        return $egyptain_cities;
    }

    public function get_weather($cityId)
    {

        //http://api.openweathermap.org/data/2.5/weather?id=360542&lang=en&units=metric&APPID=65e8a7c28bd0ee44e85851d41e100087
        $url = __WEATHER_URL__ . "id=" . $cityId . "&lang=en&units=metric&" . "APPID=" . __API_KEY__;
        $curl_handler = curl_init($url);
        curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl_handler);
        curl_close($curl_handler);
        return json_decode($result, true);
    }

    public function get_current_time()
    {
        $time = date("l, h:i A");
        $date = date("d F Y");
        return ["time" => $time, "date" => $date];
    }

}
