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
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
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
                <td><?php echo Convert($degreesIn, $degreesOut, $input); ?></td>
            </tr>    
            <tr>
                <td id="button"><button type="submit" name="Convert" value="Convert">Convert</button>
                    <button type="reset" value="Reset">Reset</button></td>
            </tr>
        </table>
    </form>    
</body>

<?php
    
    function Convert($degreesIn, $degreesOut, $input){
        $output="";
        if ($degreesIn == "Celsius" && $degreesOut == "Celsius"){
            $output=$input;
            echo $output;
        }else if ($degreesIn == "Celsius" && $degreesOut == "Fahrenheit"){
            $output= $input*9/5+32;
            return $output;
        } else if ($degreesIn == "Celsius" && $degreesOut == "Kelvin"){
            $output= $input+273.15;
            return $output;
        } else if ($degreesIn == "Fahrenheit" && $degreesOut == "Celsius"){
                $output= FahrenheitToCelsius($input);
            return $output;
        } else if ($degreesIn == "Fahrenheit" && $degreesOut == "Fahrenheit"){
            $output=$input;
            return $output;
        } else if ($degreesIn == "Fahrenheit" && $degreesOut == "Kelvin"){
            $output= FahrenheitToKelvin;
            return $output;
        } else if ($degreesIn == "Kelvin" && $degreesOut == "Celsius"){
            $output= KelvinToCelsius;
            return $output;
        } else if ($degreesIn == "Kelvin" && $degreesOut == "Fahrenheit"){
            $output= KelvinToFahrenheit;
            return $output;
        } else if ($degreesIn == "Kelvin" && $degreesOut == "Kelvin"){
            $output=$input;
        }
     }
    
    
     if(isset($_POST["Convert"])){
            $input =  $_POST['input'];
            $degreesIn = $_POST['DegreesIn'];
            $degreesOut = $_POST['DegreesOut'];
            echo Convert($degreesIn, $degreesOut, $input);   
     } 
?> 