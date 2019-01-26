/*
*   Phone Number Script
*/
console.clear();


let backendUrl = 'phone_num/gethint.php';
let debugMode = true;


function logDebug(){
    if(debugMode) {
        console.log(...arguments);
    }
}


function encodeParam (param) {
    return encodeURIComponent(param).replace("%20", "+");
}


function processServerResponse(xhr) {
    logDebug("Recived: " + xhr.responseText);
    document.getElementById('tooltips').style.display = 'block';
    document.getElementById('tooltips').innerHTML = xhr.responseText;
}


function showTooltip (str) {
    str = silencePlus(str);
    if (str.length === "") {
        document.getElementById('tooltips').style.display = 'block';
        document.getElementById('tooltips').innerHTML = "";
        return;
    } else {
        logDebug("Data: " + str);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", backendUrl, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = processServerResponse.bind(null, xhr);
        xhr.send("enter=" + encodeParam(str));
    }
}


function chooseCode(node) {
    let nationalFlag = node.getAttribute('image');
    let code = node.getAttribute('code')
    let countryName = node.getAttribute('name');

    let flag = document.getElementById('national_flag');
    let phoneCode = document.getElementById('phone_code');
    let country = document.getElementById('country_name');

    flag.style.backgroundImage = `url('phone_num/images/${nationalFlag}.png')`;
    phoneCode.value = `+${code}`;
    country.value = countryName;

    document.getElementById('tooltips').style.display = 'none';

    let phoneNumber = document.getElementById('phone_number');

    phoneNumber.focus();
    phoneNumber.selectionStart = phoneNumber.value.length;
}

function silencePlus (str) {
    if (str !== "") {
        if (str === "+") {
            logDebug("silencePlus function: ", str);
            return str = "";
        } else {
            logDebug("silencePlus function", str);
            let silencedPlus = str.replace('+', '');
            return silencedPlus;
        }
    } else {
        return str;
    }
}

function toggleCheckboxes (str) {
    logDebug("toggleCheckboxes function: ", str);

    let listOfCodes = document.getElementsByClassName('codesList');

    if (str === 'all') {
        let i;
        for (i = 0; i < codesList.length; i++) {
            listOfCodes[i].setAttribute('disabled', '');
            listOfCodes[i].setAttribute('checked', '');
        }
    }

    if (str === 'codeset') {
        let i;
        for (i = 0; i < codesList.length; i++) {
            listOfCodes[i].removeAttribute('disabled');
            listOfCodes[i].removeAttribute('checked');
        }
    }
}