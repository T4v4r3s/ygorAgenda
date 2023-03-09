<?php
// Adiciona o nome na tabela se o formulário foi enviado

include_once 'conexaodb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dia = $_POST["dia"];
    $hora_inicio = $_POST["hora_inicio"];
    $duracao = $_POST["duracao"];
    $nome = $_POST["nome"];
    $diaConvertido =  date('Y-m-d',  strtotime($dia));

    $hora = $hora_inicio;
    
    for ($i = $hora_inicio; $i < $hora_inicio + $duracao; $i++) {

        $validate_consulta = "SELECT * FROM wr1 WHERE dia LIKE '$diaConvertido' AND hora = $hora";
        $result = mysqli_query($conn, $validate_consulta);
        $row = mysqli_fetch_assoc($result);
        if ($row != null){

            header('Location: index.php');
            return;
        }
        $hora ++;
    }

    $hora = $hora_inicio;


    for ($i = $hora_inicio; $i < $hora_inicio + $duracao; $i++) {

        $sql = "INSERT INTO wr1 (dia, hora, nome) VALUES ('$dia', '$hora', '$nome')";
            if (mysqli_query($conn, $sql)) {
                echo "Nome adicionado com sucesso para $dia às $hora:00!<br>";
            } else {
                echo "Erro ao adicionar nome: " . mysqli_error($conn);
            }

        $hora ++;
        
    }
}

header('Location: index.php');

?>