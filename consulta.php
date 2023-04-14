<?php
session_start();
if (!isset($_SESSION['token'])) {
    header('Location: ./index.php');
    exit;
}
if (isset($_POST['nome']) && ($_POST['id_user'])) {

    $token   = $_SESSION['token'];
    $user    = $_POST['nome'];
    $num     = $_POST['id_user'];

    include './controller/MainController.php';
    $tk = new TokenClass();
    $retorno = $tk->BuscarUser($token, $user, $num);

    if ($retorno == false) {
        $retorno = "Nenhum registro encontrado!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo de Api</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body class="consulta">
    <a href="index.php" style="text-decoration: none;">
        <h1>Consumir Api</h1>
    </a>

    <div class="container">
        <div class="box">
            <h2>Buscar Users</h2>
            <form action="" method="POST">
                <input type="text" name="nome" placeholder="Digite o nome do usuario">
                <input type="number" name="id_user" placeholder="Digite o id do usuario">
                <input type="submit" value="Buscar">
            </form>
        </div>
        <?php
        if (isset($retorno)) {
        ?>
            <div class="listaRegistros">
                <h2>Resultado</h2>
                <div class="lista">
                    <ul>
                        <li>
                            <?php if ($retorno == "Nenhum registro encontrado!") { ?>
                                <p><?php echo $retorno; ?></p>
                            <?php } else { ?>
                                <p>Id: <?php echo $retorno['id']; ?></p>
                                <p>Nome: <?php echo $retorno['username']; ?></p>
                                <p>Idade: <?php echo $retorno['idade']; ?></p>
                                <p>Tipo Usuário: <?php echo $retorno['tipo']; ?></p>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>

</body>

</html>