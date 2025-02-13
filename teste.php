<?php

$mysqli = new mysqli("localhost", "root", "1a250ZZ95", "bancoteste");

// Verifica se houve erro na conexão
if ($mysqli->connect_error) {
    die(json_encode(["error" => "Erro ao conectar ao banco de dados: " . $mysqli->connect_error]));
}

// Consulta SQL corrigida
$query = "SELECT * FROM projects WHERE status = 'true'";
$result = $mysqli->query($query);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    die(json_encode(["error" => "Erro na consulta: " . $mysqli->error]));
}

// Converte os resultados em um array associativo
$projects = [];
while ($row = $result->fetch_assoc()) {
    $projects[] = $row;
}

// Fecha a conexão
$mysqli->close();

// Retorna os resultados como JSON
echo json_encode($projects);

?>
