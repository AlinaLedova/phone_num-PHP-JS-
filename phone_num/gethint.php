<?php
/**
 * User: Alina Ledova
 * Date: 12.01.2019
 * Time: 14:58
 */

require_once 'functions.php';
require_once 'settings.php';

$tooltip = "";

$xmlData = xml2array('codes.xml');
$phoneCodes = $xmlData['country'];

if (!$countries || count($countries) < 1) {
    $codesFromSettings = $phoneCodes;
} else {
    $codesFromSettings = choosedToArray($countries, $phoneCodes);
}

$q = $_POST['enter'];

if($q !== "") {

    if(!is_numeric($q)) {
        $tooltip = "<p>You need enter a number</p>";
    } else {

        $countOfMatches = 0;
        $len = strlen($q);

        foreach ($codesFromSettings as $code) {

            $partOfPhoneCode = substr($code['code'], 0, $len);
            $partOfRequest = substr($q, 0, $len);

            if($partOfPhoneCode == $partOfRequest) {

                if($tooltip === "") {

                    $tooltip = "<p onclick='chooseCode(this)' class='tooltip' name='{$code['name']}' code='{$code['code']}' image='{$code['image']}'><span class='flag' style='background-image: url(\"phone_num/images/{$code['image']}.png\")' ></span>{$code['name']}</p>";

                } else {

                    $tooltip .= "<p onclick='chooseCode(this)' class='tooltip' name='{$code['name']}' code='{$code['code']}' image='{$code['image']}'><span class='flag' style='background-image: url(\"phone_num/images/{$code['image']}.png\")' ></span>{$code['name']}</p>";

                }

            };

        }
    }

} else if ($q === "" || $q === false || $q === null || $q === "undefined") {
    $tooltip = "";
}


echo $tooltip === "" ? "<p class='tooltip'>No Suggestion</p>" : $tooltip;
