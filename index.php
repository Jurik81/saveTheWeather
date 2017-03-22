<?php

include_once('bootstrap.php');

$data = Model::factory('Data')->find_many();

$rows = '';

/**
 * @var $row Data
 * @var $city City
 */
foreach($data AS $row) {
    $time = date('Y-m-d H:i:s', $row->getTimestamp());

    $city = $row->city()->find_one();
    
    $rows.= <<<HTML
        <tr>
            <td><img src="http://www.openweathermap.org/img/w/{$row->getWeatherIcon()}.png"/></td>
            <td style="border: 1px solid black; padding: 5px;">{$city->getName()} ({$city->getIdOwm()})</td>
            <td style="border: 1px solid black; padding: 5px;">{$row->getWeatherDescription()}</td>
            <td style="border: 1px solid black; padding: 5px;"><strong>{$row->getTemp()}</strong>/{$row->getTempMin()}/{$row->getTempMax()}</td>
            <td style="border: 1px solid black; padding: 5px;">{$row->getClouds()}</td>
            <td style="border: 1px solid black; padding: 5px;">{$row->getWind()}</td>
            <td style="border: 1px solid black; padding: 5px;">{$row->getVisibility()}</td>
            <td style="border: 1px solid black; padding: 5px;">$time</td>
        </tr>
HTML;

}

?>

<table>
    <thead>
        <tr>
            <td></td>
            <td>Stadt (ID)</td>
            <td>Wetterbeschreibung</td>
            <td>Temperatur (avg/min/max)</td>
            <td>Bewölkung</td>
            <td>Wind in m/s</td>
            <td>Sichtweite</td>
            <td>Zeit der Datenerfassung</td>
        </tr>
    </thead>
    <tbody>
        <?= $rows?>
    </tbody>
</table>
