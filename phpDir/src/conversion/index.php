<?php

$result = '';

class Conversion {
    public $int;
    public $conversion;

    public function __construct($int, $conversion) {
        $this->int = (float)$int;
        $this->conversion = $conversion;
    }

    public function calculate() {

        switch ($this->conversion) {
            case "celsiustofahrenheit":
                return round($this->int * 9/5 + 32) . " F";
                break;
            case "celsiustokelvin":
                return round($this->int + 273.15) . " K";
                break;
            case "kmhtoms":
                return round($this->int * 5 / 18) . " m/s";
                break;
            case "kmhtoknots":
                return round($this->int / 1.852) . " knots";
                break;
            case "kgtog":
                return round($this->int * 1000) . " g";
                break;
            case "gtokg":
                return number_format((float)($this->int / 1000), 2, '.', '') . " kg";
                break;
        }
    }

}

if (isset($_POST['submit'])) {
    $conversion = new Conversion($_POST['value1'], $_POST['conversion']);
    $result = $conversion->calculate();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Converter</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="calculator">
        <h1>Unit Converter</h1>
        <form action="index.php" method="post">
            <label for="value1">Input value: </label>
            <input type="number" step="0.01" name="value1" />
            <select class="cselect" name="conversion" id="conversion">
                <option value="celsiustofahrenheit">Celsius to Fahrenheit</option>
                <option value="celsiustokelvin">Celsius to Kelvin</option>
                <option value="kmhtoms">km/h to m/s</option>
                <option value="kmhtoknots">km/h to Knots</option>
                <option value="kgtog">kg to g</option>
                <option value="gtokg">g to kg</option>
            </select>
            <br><br>
            
            <input type="submit" name="submit" value="Convert">
        </form>
        <p>Result: </p>
        <h2><?= $result ?></h2>
    </div>
</body>
</html>