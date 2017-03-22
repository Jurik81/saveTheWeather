<?php
/**
 * Created by PhpStorm.
 * User: Jurik Kähler
 * Date: 28.06.2016
 * Time: 14:56
 */
include_once('bootstrap.php');

$xml = simplexml_load_file('ClintonStandorte01.xml');

/**
 * Import all cities and stores from XML to database. Take care of duplicates.
 */
foreach ($xml->Tablix1->Details_Collection->Details as $store) {

    /**
     * Check if city already exists, if not, save it to database
     */
    if(Helper::validateXmlStoreData($store) && !Helper::cityExists($store['City'])) {

        $store['City'] = Helper::filterCity($store['City']);
        
        $cityData = array(
            'name' => $store['City'],
            'country' => strtoupper($store['Country_Region_Code'])
        );

        if(isset($store['Latitude']) && isset($store['Longitude'])) {
            $cityData['latitude'] = $store['Latitude'];
            $cityData['longitude'] = $store['Longitude'];
        }

        $city = Model::factory('City')->create($cityData);
        $city->save();
    }

    /**
     * Check if Clinton store already exists, if not, save it to database
     */
    if(!Helper::shopExists($store['Store_Code'])) {
        if(!isset($city) || !is_object($city)) {
            $city = Model::factory('City')
                ->where('name', $store['City'])
                ->find_one();
        }

        $cityShop = Model::factory('CityShop')->create(array(
           'idClinton' => $store['Store_Code'],
            'idCity' => $city->getId()
        ));
        $cityShop->save();
    }
}
