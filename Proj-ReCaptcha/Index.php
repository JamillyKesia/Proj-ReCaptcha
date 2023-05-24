
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Document</title>
</head>

<body>
    <section class="geral">
        <h1>Acesso Uvão 🍇</h1>
        <h2>Digite sua senha e seu login para ter acesso a plataforma Uvão.</h2><br>
        <form method="POST" action="index.php">
            <label for="email"> <br>
                <input type="email" id="email" name="email" class="inputForm" placeholder="E-mail" required>
            </label><br>
            <label for="login">
                <input type="text" name="login" id="login" class="inputForm" placeholder="Login">
            </label><br>
            <label for="senha">
                <input type="password" id="senha" name="senha" class="inputForm" placeholder="Senha" required>
            </label><br>
            <div class="g-recaptcha" data-sitekey="6LfLzx4mAAAAAGaA-zwo0t9ae-GXTKhAKu2ZdWfG"></div>
            <input type="submit" value="Entrar">

        </form>
    </section>
</body>

</html>

<?php





?>