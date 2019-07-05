<?php
/**
 * User: Alina Ledova
 * Date: 26.01.2019
 * Time: 17:13
 */

require_once 'functions.php';
require_once 'settings.php';

$headTags = "<script type='text/javascript' src='phone_num/js/setphone.js'></script>\n<link rel='stylesheet' type='text/css' href='phone_num/style/pn_style.css'>";

$phoneNumWidget = '';

if (!$natFlag || $natFlag === 'yes') {
    $phoneNumWidget = "<div class=\"num-container\">
        <form id=\"phone_num\" action=\"#\" method=\"POST\">
            <div id=\"national_flag\" class=\"flag\"></div>
            <input id=\"phone_code\" name=\"phone_code\" placeholder=\"+N\" onkeyup=\"showTooltip(this.value)\">
            <input id=\"country_name\" type=\"hidden\" name=\"country_name\" value=\"\">
            <input id=\"phone_number\" name=\"phone_number\" placeholder=\"Phone Number (without Code)\">
            <button id=\"btn\" name=\"submit\" value=\"ok\">Send</button>
        </form>
        <div id=\"tooltips\"></div>
    </div>";
} else {
    $phoneNumWidget = "<div class=\"num-container\">
        <form id=\"phone_num\" action=\"#\" method=\"POST\">
            <input id=\"phone_code\" name=\"phone_code\" placeholder=\"+N\" onkeyup=\"showTooltip(this.value)\">
            <input id=\"country_name\" type=\"hidden\" name=\"country_name\" value=\"\">
            <input id=\"phone_number\" name=\"phone_number\" placeholder=\"Phone Number (without Code)\">
            <button id=\"btn\" name=\"submit\" value=\"ok\">Send</button>
        </form>
        <div id=\"tooltips\"></div>
    </div>";
}
