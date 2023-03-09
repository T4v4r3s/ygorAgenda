<?php

include_once 'conexaodb.php';

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

// Criar um array para armazenar os eventos da agenda
$eventos = array();

// Iterar sobre o resultado e criar objetos para os eventos
while ($row = $result->fetch_assoc()) {
    $nome = $row['nome'];
    $hora = $row['hora'];
    $dia = new DateTime($row['dia']);
    $evento = array(
        'nome' => $nome,
        'hora' => $hora,
        'dia' => $dia
    );
    $eventos[] = $evento;
}

// Exibir a agenda na página da web
echo '<h1>Agenda</h1>';
echo '<ul>';
foreach ($eventos as $evento) {
    echo '<li>';
    echo '<strong>' . $evento['nome'] . '</strong><br>';
    echo $evento['hora'] . ' horas, ';
    echo $evento['dia']->format('d/m/Y');
    echo '</li>';
}
echo '</ul>';

?>