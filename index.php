<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/media_queryLogin.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <form action="login.php" method="post">
            <?php
            if (isset($_GET['mensagem'])) {
                if ($_GET['mensagem'] != '') {
                    echo $_GET['mensagem'];
                    $_GET['mensagem'] = '';
                }
            }
            ?>
            <img class="imglabela" src="image/labelimage/iconNameLabel.jpeg" alt="La bela">
            <h2>LOGIN</h2>
            <div class="input-group">
                <label for="nome">Usuário</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
                <span class="material-symbols-outlined">
                    visibility
                </span>
            </div>
            <div class="input-group">
                <input type="submit" value="Entrar">
            </div>
        </form>
    </div>
    <script>
        /*Sayuy*/
        let btn = document.querySelector('.material-symbols-outlined');
        btn.addEventListener('click', function() {
            let input = document.querySelector('#senha');
            if (input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
            } else {
                input.setAttribute('type', 'password');
            }
        });
    </script>
</body>

</html>