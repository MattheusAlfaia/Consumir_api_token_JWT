<?php
if(isset($_POST['user']) && ($_POST['password'])){
    
    $user = $_POST['user'];
    $password = $_POST['password'];

    include './controller/MainController.php';

    $tk = new TokenClass();
    $token = $tk->CriarToken($user, $password);

    session_start();
    $_SESSION['token'] = $token;

    header('Location: ./consulta.php');
    exit;
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
<body>
    <h1>Consumir Api</h1>

    <div class="container">
        <div class="box">
            <h2>Gerar o Token</h2>
            <form action="" method="POST">
                <input type="text" name="user" placeholder="Digite o usuario">
                <input type="password" name="password" placeholder="Digite a senha">
                <input type="submit" value="Gerar">
            </form>
        </div>
    </div>
    
</body>
</html>