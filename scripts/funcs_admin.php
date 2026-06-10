<?php
    function Registos($conn)
    {
        $query = 
        "SELECT r.id_util, CONCAT(u.nome, ' ', u.apelido) as nome, t.descricao as funcao, r.data
        FROM registos r
        INNER JOIN utilizadores u ON r.id_util = u.id_util
        INNER JOIN tipo_util t ON u.id_tipo = t.id_tipo
        WHERE r.data = (
            SELECT MAX(data) 
            FROM registos r2 
            WHERE r2.id_util = r.id_util)
        ORDER BY r.data DESC";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            $data_formatada = date('d/m/Y H:i', strtotime($row['data']));
     
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['funcao'] . "</td>";
            echo "<td>" . $data_formatada . "</td></tr>";
            }
        } 
        else {
            echo "Sem resultados";
        }
    }


    function Get_Types($conn)
    {
        $sql = "SELECT id_tipo, descricao FROM tipo_util";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id_tipo'] . "'>" . $row['descricao'] . "</option>";
            }
        } 
        else {
            echo "<option value=''>Nenhum tipo disponível</option>";
        }
    }


?>