<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Выбор телефонного номера</title>
    <script type="text/javascript" src="phone_num/js/setphone.js"></script>
    <link rel="stylesheet" type="text/css" href="phone_num/style/pn_style.css">
</head>
<body>
    <div class="num-container">
        <form id="phone_num" action="#" method="POST">
            <div id="national_flag" class="flag"></div>
            <input id="phone_code" name="phone_code" placeholder="+N" onkeyup="showTooltip(this.value)">
            <input id="country_name" type="hidden" name="country_name" value="">
            <input id="phone_number" name="phone_number" placeholder="Phone Number (without Code)">
            <button id="btn" name="submit" value="ok">Отправить</button>
        </form>
        <div id="tooltips"></div>
    </div>
<a href="phone_num/gethint.php">GetHint.php</a>
</body>
</html>
