<?php

include_once 'conexaodb.php';

echo '<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Minha página</title>
    <link rel="stylesheet" href="style.css">
  </head>';

echo '<body>';

// Cria o formulário para adicionar nomes
echo "<form method='post' action = 'criacaodb.php'>";
echo "<label>Data:</label><input type='date' name='dia'><br>";
echo "<label>Hora de Início:</label><input type='number' name='hora_inicio' min='0' max='23'><br>";
echo "<label>Duração (em horas):</label><input type='number' name='duracao' min='1' max='8'><br>";
echo "<label>Nome:</label><input type='text' name='nome'><br>";
echo "<input type='submit' value='Adicionar'>";
echo "</form>";

// Busca os dados na tabela
$sql = "SELECT * FROM wr1";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

// Organizar os dados em uma matriz bidimensional, com dias nas linhas e horas nas colunas
$data = array();
while ($row = $result->fetch_assoc()) {
    $dia = date('Y-m-d', strtotime($row['dia']));
    $hora = $row['hora'];
    $nome = $row['nome'];
    $data[$dia][$hora] = $nome;
}

// Criar a tabela HTML a partir dos dados organizados
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th></th>'; // Célula vazia no canto superior esquerdo
for ($hora = 0; $hora < 24; $hora++) {
    echo '<th>' . $hora . ':00</th>';
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($data as $dia => $horas) {
    echo '<tr>';
    echo '<th>' . $dia . '</th>';
    for ($hora = 0; $hora < 24; $hora++) {
        echo '<td>' . (isset($horas[$hora]) ? $horas[$hora] : '') . '</td>';
    }
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</body>';
echo '</html>';
?>