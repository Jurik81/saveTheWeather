<?php

include_once('bootstrap.php');

$cities = Model::factory('City')->find_many();

$idCity = array();

$countCities = 0;
$countCitiesAll = 0;
$rawData = array();
$citiesOverall = 0;
/**
 * @var City $city
 */
foreach($cities as $city) {
    if($city->getIdOwm()) {
        array_push($idCity, $city->getIdOwm());
        $countCities++;
        $countCitiesAll++;

        if($countCities == 50 || count($cities) == $countCitiesAll) {
            $idString = implode(',', $idCity);
            $weatherData = file_get_contents('http://api.openweathermap.org/data/2.5/group?id=' . $idString . '&units=metric&APPID=678eabb1a8165c45f1ad4dba1ea7d19f&lang=de');

            //warning handling
            if($weatherData === false) {
                echo 'Fehler beim Laden der Daten von openweathermap.org!<br/>';
                $countCities = $countCities - 50;
                continue;
            }

            $weatherData = json_decode($weatherData);
            $rawData = array_merge($rawData, $weatherData->list);
            $citiesOverall = $citiesOverall + $countCities;
            $countCities = 0;
            $idCity = array();
        }
    }
}

$count = 0;

foreach ($rawData as $record) {

    if(!Helper::dataExists($record->id, $record->dt)) {
        $insertData = array(
            'idOwm' => $record->id,
            'clouds' => $record->clouds->all,
            'humidity' => $record->main->humidity,
            'pressure' => $record->main->pressure,
            'temp' => $record->main->temp,
            'tempMin' => $record->main->temp_min,
            'tempMax' => $record->main->temp_max,
            'wind' => $record->wind->speed,
            'weatherIdCondition' => $record->weather[0]->id,
            'weatherMain' => $record->weather[0]->main,
            'weatherDescription' => $record->weather[0]->description,
            'weatherIcon' => $record->weather[0]->icon,
            'sunrise' => $record->sys->sunrise,
            'sunset' => $record->sys->sunset,
            'timestamp' => $record->dt,
            'raw' => json_encode($record)
        );

        if (isset($record->visibility)) {
            $insertData['visibility'] = $record->visibility;
        }

        $data = Model::factory('Data')->create($insertData);
        $data->save();
        $count++;
    }
}

echo 'Es wurden ' . $citiesOverall . ' IDs an OpenWeatherMap.org geschickt.<br/>';
echo 'Es wurden ' . count($rawData) . ' Wetterdaten empfangen und davon waren ' . $count . ' neu und wurden gespeichert. <br/>';
echo 'Damit haben ' . $count . ' von ' . count($cities) . ' Städten neue Wetterdaten.';
