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

        } else if ($inputType == "Kelvin") { //from Kelvin
            if($outputType == "Fahrenheit") { //to Fahrenheit
                $outputValue = ($inputValue - 273.15) * (9/5) + 32;
            } else { //to Celsius
                $outputValue = $inputValue - 273.15;
            }
            return $outputValue;

        } else if ($inputType == "Celsius") { //from Celsius
            if($outputType == "Fahrenheit") { //to Fahrenheit
                $outputValue = $inputValue * 9/5 + 32;
            } else { //to Kelvin
                $outputValue = $inputValue + 273.15;
            }
            return $outputValue;

        } else { //from Fahrenheit
            if($outputType == "Celsius") { //to Celsius
                $outputValue = ($inputValue - 32) * (5/9);
            } else { //to Kelvin
                $outputValue = ($inputValue - 32) * (5/9) + 273.15;
            }
            return $outputValue;
        }
    }

    //show form for additional calculations
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

    //if input is not numeric, show error message
    if (!is_numeric($inputValue)) {
        echo '<p id="result" class="invalid">Please enter a valid number</p>';
    } else { //else calculate value and show
        $outputValue = round(convert($inputType, $outputType, $inputValue), 2);
        echo '<p id="result" class="valid"> ' . $inputValue . '&#176;' . $inputType . ' is ' . $outputValue . '&#176;' . $outputType . '</p>';
    }

//IF DATA NOT SUBMITTED, SHOW FORM
} else {
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
}
?>
</body>
</html>