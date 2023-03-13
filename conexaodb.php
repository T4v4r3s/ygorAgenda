<?php

// Conecta ao banco de dados

$servername = "localhost";
$username = "debian-sys-maint";
$password = "7b5TjLNFRsLPjrro";
$dbname = "agendawrs";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>