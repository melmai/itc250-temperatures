<html>
<head>
    <title>P1: Temperature Converter</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker|Walter+Turncoat" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="reset.css" rel="stylesheet" />
    <link href="p1-style.css" rel="stylesheet" />
</head>
<body>

<?php
//project2.php

//create constant to refer to name of current page
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//show form for calculations
echo '
    <h1>Temperature Converter</h1>
    <p>Please enter a numeric value in the box below and select the corresponding temperature formats.</p>
    <form action="' . THIS_PAGE . '" method="post">
        <div id="values">
            <input type="text" name="inputValue" />

            <div id="input-options">
                <input type="radio" name="inputType" value="Fahrenheit"> Fahrenheit<br />
                <input type="radio" name="inputType" value="Celsius"> Celsius<br />
                <input type="radio" name="inputType" value="Kelvin"> Kelvin<br />
            </div> <!-- #input-options -->

            <p>to</p>

            <div id="output-options">
                <input type="radio" name="outputType" value="Fahrenheit"> Fahrenheit<br />
                <input type="radio" name="outputType" value="Celsius"> Celsius<br />
                <input type="radio" name="outputType" value="Kelvin"> Kelvin<br />
            </div> <!-- #output-options -->
        </div> <!-- #values -->

        <div id="buttons">
            <input type="submit" name="submit" value="Convert" />
            <button href="' . THIS_PAGE . '">Reset</button>
        </div> <!-- #buttons -->
    </form>
';

//IF DATA IS SUBMITTED, SHOW RESULTS
if(isset($_POST['submit'])) {

    //create variables for post data
    $inputType = $_POST['inputType'];
    $outputType = $_POST['outputType'];
    $inputValue = $_POST['inputValue'];
    $outputValue = 0;

    //function to calculate conversion
    function convert($inputType, $outputType, $inputValue) {

        if($inputType == $outputType) { //if input and output are the same...
            $outputValue = $inputValue; //return input as output
            return $outputValue;

        } else if ($inputType == "Kelvin") { //else if input: K
            if($outputType == "Fahrenheit") { //K to F
                $outputValue = ($inputValue - 273.15) * (9/5) + 32;
            } else { //else K to C
                $outputValue = $inputValue - 273.15;
            }
            return $outputValue;

        } else if ($inputType == "Celsius") { //else if input: C
            if($outputType == "Fahrenheit") { //C to F
                $outputValue = $inputValue * 9/5 + 32;
            } else { //else C to K
                $outputValue = $inputValue + 273.15;
            }
            return $outputValue;

        } else { //else input: F
            if($outputType == "Celsius") { //F to C
                $outputValue = ($inputValue - 32) * (5/9);
            } else { //else F to K
                $outputValue = ($inputValue - 32) * (5/9) + 273.15;
            }
            return $outputValue;
        }
    }

    if (!is_numeric($inputValue)) { //if input is not numeric, show error message
        echo '<p id="result" class="invalid">Please enter a valid number</p>';
    } else if (!isset($inputType) || !isset($outputType)) { //if temperature scales not selected, show error message
        echo '<p id="result" class="invalid">Please select temperature scales for both input and output.</p>';
    } else { //else calculate value and show
        $outputValue = number_format(convert($inputType, $outputType, $inputValue), 2);
        echo '<p id="result" class="valid"> ' . $inputValue . '&#176;' . $inputType . ' is ' . $outputValue . '&#176;' . $outputType . '</p>';
    }
}

?>
</body>
</html>
