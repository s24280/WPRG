<?php
if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];

    switch ($operator) {
        case 'sum':
            include 'functions.php';
            echo "Wynik dodawania: " . sum($num1, $num2);
            break;
        case 'sub':
            include 'functions.php';
            echo "Wynik odejmowania: " . sub($num1, $num2);
            break;
        case 'mul':
            include 'functions.php';
            echo "Wynik mnozenia: " . mul($num1, $num2);
            break;
        case 'div':
            include 'functions.php';
            echo "Wynik dzielenia: " . div($num1, $num2);
            break;
        default:
            echo "Nie wybrano dzialania!";
            break;
    }

}
