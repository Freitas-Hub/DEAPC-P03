<?php


    $conn = new mysqli("localhost", "root", "", "hospital_p03");
    if ($conn->connect_error) {
        die("Erro de ligação: " . $conn->connect_error);
    }
?>