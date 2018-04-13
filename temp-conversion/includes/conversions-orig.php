<?php 
// conversions.php

// form handler to convert temperature 
if(isset($_POST['convert'])) {

    $tempValue = (float)$_POST['tempvalue'];
    $tempType = $_POST['temptype'];
    
    if (is_numeric($_POST['tempvalue'])){ //is tempvalue a number?
        $convert = $tempValue;
        $celsius = convertCelsius ($tempValue, $tempType);
        $fahrenheit = convertFahrenheit ($tempValue, $tempType);
        $kelvin = convertKelvin ($tempValue, $tempType);
        echo "You entered $convert degrees $tempType<br><br><br>";
        echo "$celsius ˚C <br><br>";
        echo "$fahrenheit ˚F <br><br>";
        echo "$kelvin K ";
        echo '
        <br>
        <br>
        <form action="">
            <input type="submit" value="BACK" class="btn"/>
        </form>
        ';
    }else { //it's not a number
       echo 'Your input is invalid';
       echo '
        <br>
        <br>
        <form action="">
            <input type="submit" value="BACK" class="btn"/>
        </form>
        ';
    }
} else {
    echo '<form action="" method="post">
    <p>Temperature to Convert</p>
    <input type="text" name="tempvalue" placeholder="Enter the Temperature" required/> <br><br>

    <p>Temperature Unit</p>
    <select name="temptype" required>
        <option value="">Please select a temperature unit </option>
        <option value="Celsius">Celsius</option>
        <option value="Fahrenheit">Fahrenheit </option>
        <option value="Kelvin">Kelvin</option>
    </select>
    <br>
    <br>
    <br>
    <input type="submit" name="convert" class="btn" value="CONVERT"/> 
    </form>';
}

function convertCelsius ($tempValue, $tempType) //converts Fahren or Kelvin to Celsius
{
    if ($tempType == 'Fahrenheit') { //convert from fahrenheit to celsius
        $celsConver = ($tempValue -32) / 1.8;
    } else if ($tempType == 'Kelvin') { //convert from Kelvin to celsius
        $celsConver = $tempValue - 273.15;
    } else { //it's already celsius, do nothing
        $celsConver = $tempValue;
    }
    return round ($celsConver, 2);
}

function convertFahrenheit ($tempValue, $tempType) //converts celsius or Kelvin to fahren
{
    if ($tempType == 'Kelvin') { // convert from kelvin to fahren
        $farConver = $tempValue * 1.8 - 459.67;
    } else if ($tempType == 'Celsius') { //convert from celsius to fahren
        $farConver = $tempValue * 1.8 + 32;
    } else {// already fahren, do nothing
        $farConver = $tempValue;
    }
    return round ($farConver, 2);
}

function convertKelvin ($tempValue, $tempType) //converts celsius or fahren to Kelvin
{
    if ($tempType == 'Fahrenheit') { // convert from fahren to kelvin
        $kelConver = ($tempValue + 459.67) * 5/9;
    } else if ($tempType == 'Celsius') { //convert from celsius to kelvin
        $kelConver = $tempValue + 273.15;
    } else { //already kelvin, do nothing.
        $kelConver = $tempValue;
    }
    return round ($kelConver, 2);
}