<head>
    <title>Convert Temperature</title> 
    <style>
        h1 {
            text-align: center;
            padding-top: 25px;
            padding: 16px;
        }
        h3 {
            text-align: center;
            padding: inherit;
        }
        table {
            margin-left: auto;
            margin-right: auto;
            padding: 16px;
        }
        td {
            padding-left: 6px;
            padding-right: 6px;
        }
    </style>
</head>


<?php
// function to convert degrees based on radio boxes checked

     function Convert($degreesIn, $degreesOut, $input){
        $output="";
        if ($degreesIn == "Celsius" && $degreesOut == "Celsius"){
            $output = $input;
            return $output;
        }else if ($degreesIn == "Celsius" && $degreesOut == "Fahrenheit"){
            $output = $input * 9/5 + 32;
            return $output;
        } else if ($degreesIn == "Celsius" && $degreesOut == "Kelvin"){
            $output = $input + 273.15;
            return $output;
        } else if ($degreesIn == "Fahrenheit" && $degreesOut == "Celsius"){
                $output = ($input - 32) * 5/9;
            return $output;
        } else if ($degreesIn == "Fahrenheit" && $degreesOut == "Fahrenheit"){
            $output = $input;
            return $output;
        } else if ($degreesIn == "Fahrenheit" && $degreesOut == "Kelvin"){
            $output = ($input - 32) * 5/9 + 273.15;
            return $output;
        } else if ($degreesIn == "Kelvin" && $degreesOut == "Celsius"){
            $output = $input - 273.15;
            return $output;
        } else if ($degreesIn == "Kelvin" && $degreesOut == "Fahrenheit"){
            $output = ($input - 273.15) * 9/5 + 32;
            return $output;
        } else if ($degreesIn == "Kelvin" && $degreesOut == "Kelvin"){
            $output = $input;
            return $output;
        }
     }

// Gets and sets input and output values, rounds input to 2 decimal values, 
// uses number_format for output to display 2 decimal values even when output is an integer

     if(isset($_POST["Convert"])){
        $input =  $_POST['input']; 
        $input = round($input,2); 
        $degreesIn = $_POST['DegreesIn'];
        $degreesOut = $_POST['DegreesOut'];
        $output = Convert($degreesIn, $degreesOut, $input); 
        $output = number_format($output, 2);       
    } 
?> 

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
            </tr>    
            <tr>
                <td id="button"><button type="submit" name="Convert" value="Convert">Convert</button></td>
            </tr>
        </table>       
    </form>    
    <h3><?php
            // validated that input is numeric and outputs either result or in case of 
            // no input/invalid input prompts user to enter a number
            if (isset ($_POST['input']) && is_numeric($_POST['input'])){
                echo number_format($input, 2) . ' degrees ' . $degreesIn . ' is ' . $output . ' degrees ' . $degreesOut . '.';        
            } else {
                echo "<font color=red>Please enter a number!</font>";
            }
        ?>
    </h3>
</body>