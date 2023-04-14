<?php
if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];

    switch ($operator) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'sub':
            $result = $num1 - $num2;
            break;
        case 'mul':
            $result = $num1 * $num2;
            break;
        case 'div':
            if ($num2 == 0) {
                echo "Nie można dzielić przez zero";
            } else {
                $result = $num1 / $num2;
            }
            break;
        default:
            echo "Niepoprawne działanie";
            break;
    }

    echo "Wynik: " . $result;
}
