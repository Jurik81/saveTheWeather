<?php

/**
 * Created by PhpStorm.
 * User: Jurik Kähler
 * Date: 28.06.2016
 * Time: 13:33
 */
class Helper {

    /**
     * Checks if this datarow already exists.
     * Returns true if this data row exists.
     * 
     * @param integer $id
     * @param integer $timestamp
     * @return bool
     */
    public static function dataExists($id, $timestamp) {
        return Model::factory('Data')
            ->where(array(
                'idOwm' => $id,
                'timestamp' => $timestamp
            ))
            ->find_one() ? true : false;
    }

    /**
     * Checks if this Clinton shop already exists in database.
     * Returns true if it exists.
     *
     * @param string $idClinton
     * @return bool
     */
    public static function shopExists($idClinton) {
        return Model::factory('CityShop')
            ->where('idClinton', $idClinton)
            ->find_one() ? true : false;
    }

    /**
     * Checks if this city already exists in database.
     * Returns true if it exists.
     *
     * @param string $name
     * @return bool
     */
    public static function cityExists($name) {
        return Model::factory('City')
            ->where('name', $name)
            ->find_one() ? true : false;
    }

    /**
     * Checks if XML Store Data is valid.
     * Returns true if it is valid.
     * 
     * @param array $store
     * @return bool
     */
    public static function validateXmlStoreData($store) {
        if(strlen($store['Store_Code']) == 0 
            || strlen($store['Post_Code']) == 0
            || strlen($store['City']) == 0
            || strlen($store['Country_Region_Code']) == 0
        ) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Ersetzt Ortsteile oder unterschiedliche Schreibweisen eines Ortes mit einer festen Schreibweise.
     *
     * @param string $city
     * @return string
     */
    public static function filterCity($city) {
        switch ($city) {
            case 'Bernburg':
                $city = 'Bernburg (Saale)';
                break;
            case 'Dallgow':
                $city = 'Dallgow-Döberitz';
                break;
            case 'Frankfurt':
            case 'Frankfurt a. Main':
                $city = 'Frankfurt am Main';
                break;
            case 'Frankfurt/Oder':
                $city = 'Frankfurt (Oder)';
                break;
            case 'Halle':
            case 'Halle-Neustadt':
            case 'Halle/Saale':
                $city = 'Halle (Saale)';
                break;
            case 'Heringsdorf':
                $city = 'Heringsdorf';
                break;
            case 'Kempten':
                $city = 'Kempten (Allgäu)';
                break;
            case 'Mühlhausen/Thür.':
                $city = 'Mühlhausen';
                break;
            case 'Mülheim':
                $city = 'Mülheim an der Ruhr';
                break;
            case 'Neunkirchen/Saar':
                $city = 'Neunkirchen (Saar)';
                break;
            case 'Schwedt/Oder':
                $city = 'Schwedt (Oder)';
                break;
            case 'Waren':
                $city = 'Waren (Müritz)';
                break;
            case 'Posthausen':
                $city = 'Ottersberg';
                break;
            case 'Sievershagen':
                $city = 'Lambrechtshagen';
                break;
        }

        return $city;
    }
}