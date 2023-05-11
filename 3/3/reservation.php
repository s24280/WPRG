<?php
if (isset($_POST['submit'])) {
    $num_of_people = $_POST['num_of_people'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $credit_card = $_POST['credit_card'];
    $email = $_POST['email'];
    $check_in_date = $_POST['check_in_date'];
    $check_in_time = $_POST['check_in_time'];
    $extra_bed = isset($_POST['extra_bed']) ? "Yes" : "No";
    $amenities = isset($_POST['amenities']) ? implode(", ", $_POST['amenities']) : "None";


    $errors = array();

    if (!preg_match('/^[a-zA-Z]+$/', $first_name)) {
        $errors['first_name'] = "Name can contain only letters.";
    }

    if (!preg_match('/^[a-zA-Z]+$/', $last_name)) {
        $errors['last_name'] = "Surname can contain only letters.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid e-mail address";
    }

    if (count($errors) > 0) {
        echo "<h2>Unable to book a room, because:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        $data = array($num_of_people, $first_name, $last_name, $address, $credit_card, $email, $check_in_date, $check_in_time, $extra_bed, $amenities);

        $file = 'reservations.csv';
        $delimiter = ';';

        if (!file_exists($file)) {
            $header = array('Num of people', 'First name', 'Last name', 'Address', 'Credit card', 'Email', 'Check-in date', 'Check-in time', 'Extra bed', 'Amenities');
            $fp = fopen($file, 'w');
            fputcsv($fp, $header, $delimiter);
        } else {
            $fp = fopen($file, 'a');
        }

        fputcsv($fp, $data, $delimiter);
        fclose($fp);

        echo "<h2>Reservation summary</h2>";
        echo "<p>Number of people: $num_of_people</p>";
        echo "<p>Name: $first_name</p>";
        echo "<p>Surname: $last_name</p>";
        echo "<p>Address: $address</p>";
        echo "<p>Credit card number: $credit_card</p>";
        echo "<p>E-mail address: $email</p>";
        echo "<p>Date of arrival: $check_in_date</p>";
        echo "<p>Time of arrival: $check_in_time</p>";
        echo "<p>Extra bed for child: $extra_bed</p>";
        echo "<p>Amenities: $amenities</p>";

    }

    if (isset($_GET['load'])) {
        $fp = fopen('reservations.csv', 'r');
        echo "<table>";
        while ($data = fgetcsv($fp, 1000, ';')) {
            echo "<tr>";
            foreach ($data as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        fclose($fp);
    }
}
