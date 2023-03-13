<!DOCTYPE html>
<html>
<head>
        <title>Cadastro</title>
</head>
<body>
        <h1>Cadastro</h1>
        <form method="POST" action="salvar.php">
                <label for="login">Login:</label>
                <input type="text" name="login" required><br><br>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" required><br><br>

                <label for="nome">Nome:</label>
                <input type="text" name="nome" required><br><br>

                <input type="submit" value="Cadastrar">
        </form>
</body>
</html>