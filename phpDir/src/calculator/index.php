<?php

$result = '';

class Calculation {
    public $int1;
    public $int2;
    public $operator;

    public function __construct($int1, $int2, $operator) {
        $this->int1 = (int)$int1;
        $this->int2 = (int)$int2;
        $this->operator = $operator;
    }

    public function calculate(int $int1, int $int2, $operator) {
        $this->int1 = $int1;
        $this->int2 = $int2;
        $this->operator = $operator;

        switch ($operator) {
            case "addition":
                return $int1 + $int2;
                break;
            case "subtraction":
                return $int1 - $int2;
                break;
            case "division":
                return $int1 / $int2;
                break;
            case "multiplication":
                return $int1 * $int2;
                break;
        }
    }

}

if ($_POST['submit']) {
    new Calculation($_POST['int1'], $_POST['int2'], $_POST['operaotr']);
    $result = calculate();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <h1>Calculator</h1>
        <form action="index.php" action="post">
            <label for="value1">Value 1: </label>
            <input type="text" name="value1" />
            <select name="operator" id="operator">
                <option value="addition">+ Add</option>
                <option value="subtract">- Subtract</option>
                <option value="division">/ Divide</option>
                <option value="multiplication">* Multiply</option>
            </select>
            <br>
            <label for="value2">Value 2: </label>
            <input type="text" name="value2" />
            
            <button type="submit" value="=">
        </form>
        <p>Result: <?= $result ?></p>
    </div>
</body>
</html>