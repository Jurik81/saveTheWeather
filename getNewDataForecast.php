<?php

include_once('bootstrap.php');

$cities = Model::factory('City')->find_many();

$rawData = array();

/**
 * @var City $city
 */
foreach($cities as $city) {
    if($city->getIdOwm()) {

        $weatherData = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?id=' . $city->getIdOwm() . '&units=metric&APPID=678eabb1a8165c45f1ad4dba1ea7d19f&lang=de');

        //warning handling
        if($weatherData === false) {
            echo 'Fehler beim Laden der Daten von openweathermap.org!<br/>';
            continue;
        }

        $weatherData = json_decode($weatherData);

        foreach ($weatherData->list as $data) {
            if(explode(' ', $data->dt_txt)[1] == '12:00:00') {
                $rawData[$city->getIdOwm()] = $data;
            }
        }
    }
}

$count = 0;

foreach ($rawData as $idOwm =>$record) {

    if(!Helper::dataExists($idOwm, $record->dt)) {
        $insertData = array(
            'idOwm' => $idOwm,
            'humidity' => $record->main->humidity,
            'pressure' => $record->main->pressure,
            'temp' => $record->main->temp,
            'tempMin' => $record->main->temp_min,
            'tempMax' => $record->main->temp_max,
            'timestamp' => $record->dt,
            'weatherIdCondition' => $record->weather[0]->id,
            'weatherMain' => $record->weather[0]->main,
            'weatherDescription' => $record->weather[0]->description,
            'weatherIcon' => $record->weather[0]->icon,
            'raw' => json_encode($record)
        );

        if(isset($record->clouds)) {
            $insertData['clouds'] = $record->clouds->all;
        }

        if(isset($record->wind)) {
            $insertData['wind'] = $record->wind->speed;
        }

        if(isset($record->sys) && isset($record->sys->sunrise)) {
            $insertData['sunrise'] = $record->sys->sunrise;
            $insertData['sunset'] = $record->sys->sunset;
        }

        if (isset($record->visibility)) {
            $insertData['visibility'] = $record->visibility;
        }

        if(isset($record->dt_txt)) {
            $date = new DateTime($record->dt_txt);
            $insertData['timestampForecast'] = $date->getTimestamp();
        }

        $data = Model::factory('Data')->create($insertData);
        $data->save();
        $count++;
    }
}

echo '<br/>Es wurden ' . count($cities) . ' IDs an OpenWeatherMap.org geschickt.<br/>';
echo 'Es wurden ' . count($rawData) . ' Wetterdaten empfangen und davon waren ' . $count . ' neu und wurden gespeichert. <br/>';
echo 'Damit haben ' . $count . ' von ' . count($cities) . ' Städten neue Wetterdaten.';