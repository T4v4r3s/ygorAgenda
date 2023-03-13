<?php

session_start();

if($_SESSION['logado'] == true && $_SESSION != NULL){

}else{
  header('Location: login/index.php');
  die();
}

include_once 'conexaodb.php';

echo '<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Minha página</title>
    <link rel="stylesheet" href="css/style.css">
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
    $dia = date('d-m-Y', strtotime($row['dia']));
    $hora = $row['hora'];
    $nome = $row['nome'];
    $data[$dia][$hora] = $nome;
}

// Adicionar os dias sem células preenchidas
$inicio_mes = date('Y-m-01', strtotime('now'));
$fim_mes = date('Y-m-t', strtotime('now'));

$dia_atual = $inicio_mes;
while ($dia_atual <= $fim_mes) {
    $dia_atual_formatado = date('d-m-Y', strtotime($dia_atual));
    if (!isset($data[$dia_atual_formatado])) {
        $data[$dia_atual_formatado] = array_fill(0, 24, '');
    }
    $dia_atual = date('Y-m-d', strtotime($dia_atual . ' +1 day'));
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
ksort($data);
foreach ($data as $dia => $horas) {
    if (date('d-m-Y', strtotime(date('d-m-Y') . ' -7 day')) <= $dia && date('d-m-Y', strtotime(date('d-m-Y') . ' +14 day')) >= $dia)  {
      echo '<tr>';
      echo '<th>' . $dia . '</th>';
      for ($hora = 0; $hora < 24; $hora++) {
          echo '<td>' . (isset($horas[$hora]) ? $horas[$hora] : '') . '</td>';
      }
      echo '</tr>';
    }
    
}
echo '</tbody>';
echo '</table>';
echo '</body>';
echo '</html>';
?>