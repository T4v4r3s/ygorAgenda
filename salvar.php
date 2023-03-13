<?php

//conecta ao banco
include_once 'conexaodb.php';

// Obter dados do formulário de cadastro
$login = $_POST['login'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];


// Verificar se o login já existe na tabela
$sql = "SELECT login FROM login WHERE login='$login'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Login já existe na tabela!";
    exit;
}

// Verificar se o nome já existe na tabela
$sql = "SELECT nome FROM login WHERE nome='$nome'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Nome já existe na tabela!";
    exit;
}

// Inserir dados na tabela de login
$sql = "INSERT INTO login (login, senha, nome) VALUES ('$login', '$senha', '$nome')";
if ($conn->query($sql) === TRUE) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar usuário: " . $conn->error;
}

$conn->close();
?>