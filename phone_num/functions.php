<?php
/**
 * User: Alina Ledova
 * Date: 12.01.2019
 * Time: 15:08
 */


function print_array($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}


function xml2array($fileName) {
    $simpleXMLIterator = new SimpleXMLIterator($fileName, null, true);
    return simpleXmlToArray($simpleXMLIterator);
}


function simpleXmlToArray($simpleXMLIterator){
    $arr = array();
    $i = 0;
    for ($simpleXMLIterator->rewind(); $simpleXMLIterator->valid(); $simpleXMLIterator->next()) {

        if(!array_key_exists($simpleXMLIterator->key(), $arr)) {
            $arr[$simpleXMLIterator->key()] = array();
        }
        if(!$simpleXMLIterator->hasChildren()) {

            foreach($simpleXMLIterator->current()->attributes() as $a => $b){

                if($a == 'name') {
                    $arr[$simpleXMLIterator->key()][$i][$a] = strval($b);
                }
                if($a == 'code') {
                    $arr[$simpleXMLIterator->key()][$i][$a] = strval($b);
                }
                if($a == 'image') {
                    $arr[$simpleXMLIterator->key()][$i][$a] = strval($b);
                }

            }

        }
        $i++;
    }
    return $arr;
}


function choosedToArray($choosed, $all) {
    if(count($choosed) > 0) {
        $choosedCodes = array();
        foreach ($choosed as $country) {
            for ($i = 0; $i < count($all); $i++) {
                if($all[$i]['image'] == $country) {
                    $choosedCodes[$i]['image'] = $all[$i]['image'];
                    $choosedCodes[$i]['name'] = $all[$i]['name'];
                    $choosedCodes[$i]['code'] = $all[$i]['code'];
                }
            }
        }
        $sortedCodes = array_values($choosedCodes);
    }
    return $sortedCodes;
}

function headerConnections () {
    $connection = '<>';
}