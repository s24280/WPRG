<?php

function sum($a, $b) {
    return $a + $b;
}

function sub($a, $b) {
    return $a - $b;
}

function mul($a, $b) {
    return $a * $b;
}

function div($a, $b) {
    if ($b == 0) {
        return "Nie mozna dzielic przez zero!";
    } else {
        return $a / $b;
    }
}
