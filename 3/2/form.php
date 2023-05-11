<?php
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];

    $file = fopen ( './text.txt' , 'a+' );

    fwrite($file, "$first_name, $last_name, $address\n");


    fclose($file);

}
