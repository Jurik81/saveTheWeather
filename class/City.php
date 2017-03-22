<?php

/**
 * Created by PhpStorm.
 * User: Jurik Kähler
 * Date: 27.06.2016
 * Time: 14:33
 */
class City extends Model {

    /**
     * Relation to Data table
     *
     * @return ORMWrapper
     */
    public function data() {
        return $this->has_many('Data', 'idOwm', 'idOwm');
    }

    /**
     * Relation to City Shop table
     *
     * @return ORMWrapper
     */
    public function cityShop() {
        return $this->has_many('CityShop', 'idCity');
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
    public function getIdOwm() {
        return $this->idOwm;
    }

    /**
     * @param int $idOwm
     */
    public function setIdOwm($idOwm) {
        $this->idOwm = $idOwm;
    }

    /**
     * @return int
     */
    public function getIdClinton() {
        return $this->idClinton;
    }

    /**
     * @param int $idClinton
     */
    public function setIdClinton($idClinton) {
        $this->idClinton = $idClinton;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getLongitude() {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude() {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country) {
        $this->country = $country;
    }
}