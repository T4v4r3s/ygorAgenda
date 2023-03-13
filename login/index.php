<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="styles.css">
    <link  rel="stylesheet" href="../css/Login.css?v=<?php echo time(); ?>">
    <link  rel="stylesheet" href="../css/shared.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
<header class="p-3 text-bg-dark">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center ">
      <a href="../Index.php" class="d-flex align-items-center text-center mb-2 me-4 mb-lg-0 text-white text-decoration-none">
        <h5>TABELA PW</h5>
      </a>
    </div>
  </div>
</header>



    <div id="Container" class=" position-absolute top-50 start-50 translate-middle" >
        <div class="text-center">
            <h1 class="">Login</h1>
        </div>
        <form method="post" class="form" action="login.php">
            <div class="d-grid gap-2 col-12 mb-2 px-3">
                <label class="d-grid  col-2">Código</label>
                <input type="text" name="Codlogin" id="Codlogin" class="form-control">
            </div>

            <div class="d-grid gap-2 col-12 mb-2 px-3 pt-2">
                <label class="d-grid col-2">Senha</label>
                <input type="password" name="senhaLogin" id="senhaLogin" class="form-control" >
            </div>


            <div class="d-grid gap-2 col-12 mb-3 px-3 pt-3">
                <button class="btn btn-primary">Entrar</button>
            </div>
        </form>
    </div>
</body>

<footer class="pt-3 mt-4 text-bg-white">
  <p class="text-center  text-dark">© Ygor Enterprises</p>
</footer>


</html>