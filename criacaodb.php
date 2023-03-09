<?php
// Adiciona o nome na tabela se o formulário foi enviado

include 'conexaodb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["data"];
    $hora_inicio = $_POST["hora_inicio"];
    $duracao = $_POST["duracao"];
    $nome = $_POST["nome"];

    for ($i = $hora_inicio; $i < $hora_inicio + $duracao; $i++) {
        
        $sql = "INSERT INTO wr1 (data, hora, nome) VALUES ('$data', '$hora', '$nome')";
        if (mysqli_query($conn, $sql)) {
            echo "Nome adicionado com sucesso para $data às $hora:00!<br>";
        } else {
            echo "Erro ao adicionar nome: " . mysqli_error($conn);
        }

        $hora ++;

    }
}

?>