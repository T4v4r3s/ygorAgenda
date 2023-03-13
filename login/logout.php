<?php

    session_start();
    unset($_SESSION['logado']);
    unset($_SESSION['nom_usuario']);
    unset($_SESSION['cod_usuario']);
    session_destroy();
    header('Location: index.php');

?>