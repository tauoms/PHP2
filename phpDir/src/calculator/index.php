<?php

$result = '';

class Calculation {
    public $int1;
    public $int2;
    public $operator;

    public function __construct($int1, $int2, $operator) {
        $this->int1 = (float)$int1;
        $this->int2 = (float)$int2;
        $this->operator = $operator;
    }

    public function calculate() {

        switch ($this->operator) {
            case "addition":
                return $this->int1 + $this->int2;
                break;
            case "subtraction":
                return $this->int1 - $this->int2;
                break;
            case "division":
                return $this->int1 / $this->int2;
                break;
            case "multiplication":
                return $this->int1 * $this->int2;
                break;
        }
    }

}

if (isset($_POST['submit'])) {
    $calculation = new Calculation($_POST['value1'], $_POST['value2'], $_POST['operator']);
    $result = $calculation->calculate();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="calculator">
        <h1>Calculator</h1>
        <form action="index.php" method="post">
            <label for="value1">Value 1: </label>
            <input type="number" step="0.01" name="value1" id="value1" />
            <select name="operator" id="operator">
                <option value="addition">+ Add</option>
                <option value="subtraction">- Subtract</option>
                <option value="division">/ Divide</option>
                <option value="multiplication">* Multiply</option>
            </select>
            <br><br>
            <label for="value2">Value 2: </label>
            <input type="number" step="0.01" name="value2" id="value2" />
            
            <input type="submit" name="submit" value=" = ">
        </form>
        <p>Result: </p>
        <h2><?= $result ?></h2>
    </div>
</body>
</html>