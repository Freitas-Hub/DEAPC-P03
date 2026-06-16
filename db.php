<?php


    $conn = new mysqli("localhost", "root", "", "hospital_p03");
    if ($conn->connect_error) {
        die("Erro de ligação: " . $conn->connect_error);
        echo $conn->connection_status;
    }

    function registarAcesso($id_util, $conn)
    {
        $sql = "INSERT INTO registos (id_util, data)
                VALUES ($id_util, NOW())";

        $conn->query($sql);
    }

?>