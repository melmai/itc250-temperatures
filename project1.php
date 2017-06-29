<head>
    <title>Convert Temperature</title> 
    <style>
        h1 {
            text-align: center;
            padding: 16p;
        }
        table {
            margin-left:auto;
            margin-right:auto;
            padding: 16px;
        }
        td {
            padding: 6px;
        }
        #button {
            text-align: center;
        }
        #output {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Temperature Converter</h1>
    <form action="<?php ' . THIS_PAGE . ' ?>" method="post">
        <table>    
            <tr>
                <td><h3>Convert from:</h3></td>
                <td><input type="text" name="input" size="6"></td>
                <td><input type="radio" name="DegreesIn" value="Celsius" checked="checked">Celsius<br>
                    <input type="radio" name="DegreesIn" value="Fahrenheit">Fahrenheit<br>
                    <input type="radio" name="DegreesIn" value="Kelvin">Kelvin<br></td>
                <td><h3> to: </h3></td>
                <td><input type="radio" name="DegreesOut" value="Celsius" checked="checked">Celsius<br>
                    <input type="radio" name="DegreesOut" value="Fahrenheit">Fahrenheit<br>
                    <input type="radio" name="DegreesOut" value="Kelvin">Kelvin<br></td>
                <td><?php $output ?></td>
            </tr>    
            <tr>
                <td id="button"><button type="submit"  value="Convert">Convert</button>
                    <button type="reset" value="Reset">Reset</button></td>
            </tr>
        </table>
    </form>    
</body>
<?php

    define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

    if (isset($_POST['input'])) {
        $input =  $_POST['input'];
    } else {
        $input="";
    }
        
    if(isset($_POST["Convert"])){
        $output=Convert($input);
    }
    
    function Convert($input){
        $output="";
        if ($_POST['DegreesIn'] == "Celsius" && $_POST['DegreesOut'] == "Celsius"){
            $output=$input;
            return $output;
        }else if ($_POST['DegreesIn'] == "Celsius" && $_POST['DegreesOut'] == "Fahrenheit"){
            $output= $input*9/5+32;
            return $output;
        } else if ($_POST['DegreesIn'] == "Celsius" && $_POST['DegreesOut'] == "Kelvin"){
            $output= $input+273.15;
            return $output;
        } else if ($_POST['DegreesIn'] == "Fahrenheit" && $_POST['DegreesOut'] == "Celsius"){
                $output= FahrenheitToCelsius($input);
            return $output;
        } else if ($_POST['DegreesIn'] == "Fahrenheit" && $_POST['DegreesOut'] == "Fahrenheit"){
            $output=$input;
            return $output;
        } else if ($_POST['DegreesIn'] == "Fahrenheit" && $_POST['DegreesOut'] == "Kelvin"){
            $output= FahrenheitToKelvin;
            return $output;
        } else if ($_POST['DegreesIn'] == "Kelvin" && $_POST['DegreesOut'] == "Celsius"){
            $output= KelvinToCelsius;
            return $output;
        } else if ($_POST['DegreesIn'] == "Kelvin" && $_POST['DegreesOut'] == "Fahrenheit"){
            $output= KelvinToFahrenheit;
            return $output;
        } else if ($_POST['DegreesIn'] == "Kelvin" && $_POST['DegreesOut'] == "Kelvin"){
            $output=$input;
        }
     }
?> 