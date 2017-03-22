<?php

/**
 * Created by PhpStorm.
 * User: Jurik Kähler
 * Date: 28.06.2016
 * Time: 16:08
 */
class CityShop extends Model {

    /**
     * Relation to City table
     *
     * @return $this|null
     */
    public function city(){
        return $this->belongs_to('City', 'idCity');
    }
    
    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIdClinton() {
        return $this->idClinton;
    }

    /**
     * @param string $idClinton
     */
    public function setIdClinton($idClinton) {
        $this->idClinton = $idClinton;
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
}