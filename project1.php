<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
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
        
        <?php
        if (isset($_POST['input'])) {
            $input =  $_POST['input'];
        } else {
            $input="";
        }
        
        if (isset($_POST['submit'])) {
            if(isset($_POST['DegreesIn']))
                {
                echo "You have selected :".$_POST['DegreesIn'];  
//  Displaying Selected Value
            }
        }
//pseudocode
        function Convert($input){
            $output="";
            if (DegreesIn == "Celsius" && DegreesOut == "Celsius"){
                $output=$input;
            }else if (DegreesIn == "Celsius" && DegreesOut == "Fahrenheit"){
                $output= ConvertCelsiusToFahrenheit;
            } else if (DegreesIn == "Celsius" && DegreesOut == "Kelvin"){
                $output= ConvertCelsiusToKelvin;
            } else if (DegreesIn == "Fahrenheit" && DegreesOut == "Celsius"){
                $output= ConvertFahrenheitToCelsius;
            } else if (DegreesIn == "Fahrenheit" && DegreesOut == "Fahrenheit"){
                $output=$input;
            } else if (DegreesIn == "Fahrenheit" && DegreesOut == "Kelvin"){
                $output= ConvertFahrenheitToKelvin;
            } else if (DegreesIn == "Kelvin" && DegreesOut == "Celsius"){
                $output= ConvertKelvinToCelsius;
            } else if (DegreesIn == "Kelvin" && DegreesOut == "Fahrenheit"){
                $output= ConvertKelvinToFahrenheit;
            } else if (DegreesIn == "Kelvin" && DegreesOut == "Kelvin"){
                $output=$input;
            }
            return $output;
        }
        
        ?>
        
        <h1>Temperature Converter</h1>
        <form action='project1.php' method="post">
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
                        <td><input type="text" name="output" size="6" value=" "></td>

                </tr>    
                <tr>
                    <td id="button"><button type="submit" onclick="Convert" value="Convert"> Convert  </button>
                        <button type="reset" value="Reset">Reset</button></td>
                </tr>
            </table>
        </form>    
    </body>
</html>
