<?php

// Cria a conexão
$conn = new mysqli('localhost', 'root', '', 'e_market');


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

function showArray($array)
{
    echo "<pre>";

    print_r($array);

    echo "</pre>";
}
