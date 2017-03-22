<?php

/**
 * Created by PhpStorm.
 * User: Jurik Kähler
 * Date: 27.06.2016
 * Time: 15:10
 */
class Data extends Model {

    /**
     * Relation to City table
     * 
     * @return $this|null
     */
    public function city(){
        return $this->belongs_to('City', 'idOwm', 'idOwm');
    }

    /**
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdCity() {
        return $this->idCity;
    }

    /**
     * @param int $idCity
     */
    public function setIdCity($idCity) {
        $this->idCity = $idCity;
    }

    /**
     * @return int
     */
    public function getIdWeather() {
        return $this->idWeather;
    }

    /**
     * @param int $idWeather
     */
    public function setIdWeather($idWeather) {
        $this->idWeather = $idWeather;
    }

    /**
     * @return int
     */
    public function getClouds() {
        return $this->clouds;
    }

    /**
     * @param int $clouds
     */
    public function setClouds($clouds) {
        $this->clouds = $clouds;
    }

    /**
     * @return int
     */
    public function getHumidity() {
        return $this->humidity;
    }

    /**
     * @param int $humidity
     */
    public function setHumidity($humidity) {
        $this->humidity = $humidity;
    }

    /**
     * @return int
     */
    public function getPressure() {
        return $this->pressure;
    }

    /**
     * @param int $pressure
     */
    public function setPressure($pressure) {
        $this->pressure = $pressure;
    }

    /**
     * @return float
     */
    public function getTemp() {
        return $this->temp;
    }

    /**
     * @param float $temp
     */
    public function setTemp($temp) {
        $this->temp = $temp;
    }

    /**
     * @return float
     */
    public function getTempMin() {
        return $this->tempMin;
    }

    /**
     * @param float $tempMin
     */
    public function setTempMin($tempMin) {
        $this->tempMin = $tempMin;
    }

    /**
     * @return float
     */
    public function getTempMax() {
        return $this->tempMax;
    }

    /**
     * @param float $tempMax
     */
    public function setTempMax($tempMax) {
        $this->tempMax = $tempMax;
    }

    /**
     * @return int
     */
    public function getWind() {
        return $this->wind;
    }

    /**
     * @param int $wind
     */
    public function setWind($wind) {
        $this->wind = $wind;
    }

    /**
     * @return int
     */
    public function getVisibility() {
        return $this->visibility;
    }

    /**
     * @param int $visibility
     */
    public function setVisibility($visibility) {
        $this->visibility = $visibility;
    }

    /**
     * @return string
     */
    public function getWeatherMain() {
        return $this->weatherMain;
    }

    /**
     * @param string $weatherMain
     */
    public function setWeatherMain($weatherMain) {
        $this->weatherMain = $weatherMain;
    }

    /**
     * @return string
     */
    public function getWeatherDescription() {
        return $this->weatherDescription;
    }

    /**
     * @param string $weatherDescription
     */
    public function setWeatherDescription($weatherDescription) {
        $this->weatherDescription = $weatherDescription;
    }

    /**
     * @return string
     */
    public function getWeatherIcon() {
        return $this->weatherIcon;
    }

    /**
     * @param string $weatherIcon
     */
    public function setWeatherIcon($weatherIcon) {
        $this->weatherIcon = $weatherIcon;
    }

    /**
     * @return string
     */
    public function getTimestamp() {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     */
    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }
}