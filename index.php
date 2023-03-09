<?php

// Verifica a conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

include_once 'conexaodb.php';

// Busca os dados na tabela
$sql = "SELECT * FROM wr1";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

// Cria a tabela HTML
echo "<table>";
echo "<tr><th></th>"; // Cabeçalho vazio para a primeira célula
for ($i=0; $i<24; $i++) {
    echo "<th>" . str_pad($i, 2, "0", STR_PAD_LEFT) . ":00</th>";
}
echo "</tr>";
while($row = mysqli_fetch_assoc($result)) {
    $data = date("d/m", strtotime($row["data"]));
    $hora = date("H", strtotime($row["hora"]));
    $nome = $row["nome"];

    // Cria a célula
    if (!isset($table[$data])) {
        $table[$data] = array();
    }
    $table[$data][$hora] = $nome;
}

// Cria as células para cada data e hora
foreach ($table as $data => $horas) {
    echo "<tr><th>$data</th>";
    for ($i=0; $i<24; $i++) {
        $hora = str_pad($i, 2, "0", STR_PAD_LEFT);
        $nome = isset($horas[$hora]) ? $horas[$hora] : "";
        echo "<td>$nome</td>";
    }
    echo "</tr>";
}
echo "</table>";

// Cria o formulário para adicionar nomes
echo "<form method='post' action = 'criacaodb.php'>";
echo "<label>Data:</label><input type='date' name='data'><br>";
echo "<label>Hora de Início:</label><input type='number' name='hora_inicio' min='0' max='23'><br>";
echo "<label>Duração (em horas):</label><input type='number' name='duracao' min='1' max='8'><br>";
echo "<label>Nome:</label><input type='text' name='nome'><br>";
echo "<input type='submit' value='Adicionar'>";
echo "</form>";

?>