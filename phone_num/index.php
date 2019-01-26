<?php
/**
 * User: Alina Ledova
 * Date: 17.01.2019
 * Time: 22:24
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Settings PhoneNum Module</title>
        <link type="text/css" rel="stylesheet" href="style/pn_style.css" />
        <script type="text/javascript" src="js/setphone.js"></script>
    </head>
    <body>
    <?php
        require_once "functions.php";
        require_once 'settings.php';

        $xmlData = xml2array('codes.xml');
        $codes = $xmlData['country'];
        $choosedCodes = choosedToArray($countries, $codes);
    ?>
    <div class="wrapper">
        <h1>Settings</h1>
        <form class="settings-form" method="post" action="#">
            <div>
                <label>Enable National Flags:</label>
                <label><input type="radio" name="natFlag" value="yes" <?php echo $natFlag == 'yes' ? 'checked' : ''; echo !$natFlag ? 'checked' : ''; ?>> Yes</label>
                <label><input type="radio" name="natFlag" value="no" <?php echo $natFlag == 'no' ? 'checked' : ''; ?>> No</label>
            </div>
            <div>
                <label>Choose Active Codes:</label>
                <label><input onfocus="toggleCheckboxes(this.value)" type="radio" name="activeCodes" value="all" <?php echo $activeCodes == 'all' ? 'checked' : ''; echo !$activeCodes ? 'checked' : ''; ?>> All Codes</label>
                <label><input id="codeset_on" onfocus="toggleCheckboxes(this.value)" type="radio" name="activeCodes" value="codeset" <?php echo $activeCodes == 'codeset' ? 'checked' : ''; ?>>Code Set</label>
            </div>
            <div id="codes">
                <?php

                    foreach ($codes as $code) {
                        $checked = '';
                        for ($i = 0; $i < count($choosedCodes); $i++) {
                            if ($choosedCodes[$i]['image'] == $code['image']) {
                                $checked = 'checked';
                            }
                        }
                        echo "<label><input class='codesList' type='checkbox' name='{$code['image']}' value='{$code['image']}' {$checked}><span class='flag' style='background-image: url(\"images/{$code['image']}.png\")'></span> +{$code['code']} - {$code['name']}</label><br/>";
                    }

                ?>
            </div>
            <button>Save</button>
        </form>
            <?php

                if ($_REQUEST) {

                    $textSettings = '<?php ';

                    foreach ($_REQUEST as $key => $val) {
                        if ($key == 'natFlag' || $key == 'activeCodes') {
                            if ($val == 'yes' || $val == 'no') {
                                $textSettings .= '$natFlag = "' . $val . '"; ';
                            }
                            if ($val == 'all') {
                                $textSettings .= '$activeCodes = "' . $val . '"; ';
                            } elseif ($val == 'codeset') {
                                $textSettings .= '$activeCodes = "' . $val . '"; ';
                                $textSettings .= '$countries = array(); ';
                            }
                        } else {
                            $textSettings .= '$countries[] = "' . $val . '"; ';
                        }
                    }

                    $fileSettings = fopen('settings.php', 'w');

                    if ($fileSettings) {
                        fwrite($fileSettings, $textSettings);
                    }

                    fclose($fileSettings);

                }
            ?>
    </div>
    <script>
        /* choose flags */

        let codesetOn = document.getElementById('codeset_on');
        let attr = codesetOn.getAttribute('checked');
        let codesList = document.getElementsByClassName('codesList');

        if(attr !== null) {
            let i;
            for (i = 0; i < codesList.length; i++) {
                codesList[i].removeAttribute('disabled');
            }
        } else {
            let i;
            for (i = 0; i < codesList.length; i++) {
                codesList[i].setAttribute('disabled', '');
                codesList[i].setAttribute('checked', '');
            }
        }
    </script>
    </body>
</html>
