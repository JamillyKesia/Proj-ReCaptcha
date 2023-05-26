
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Uvão 🍇</title>
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
            <div class="g-recaptcha" data-sitekey="6Ld8Mz0mAAAAAO3Oa5rrYUtCM2KKPZO3OD1G052B"></div>
            <input type="submit" value="Entrar" name="Entrar" onclick="return valida()">
            <section class="sessaoDados">
                Login Correto: <strong>UserTest</strong>
                <br>
                Senha Correta: <strong>senha123</strong>
            </section>
        </form>
    </section>
</body>

    <!-- Validação de marcação do recaptcha-->
    <script type="text/javascript">
        function valida() {
            if (grecaptcha.getResponse() == ""){
                alert("Você precisa marcar a validação!");
                return false;
            }
        }
    </script>

    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Dados inseridos no formulário
            $emailInserido = $_POST["email"];
            $senhaInserida = $_POST["senha"];
            $loginInserido = $_POST["login"];
        
            // Email e senha já definidos
            $loginCorreto = "UserTest";
            $senhaCorreta = "senha123";
        
            // Verifica se o email e a senha estão corretos
            if ($loginInserido == $loginCorreto && $senhaInserida == $senhaCorreta) {
  
                //Verificação da ação do botão "entrar"
                if (isset($_POST['Entrar'])){
                    //Se caso for clicado, ele verificará se há um código inserido no captcha
                if (!empty($_POST['g-recaptcha-response'])){
                    $url = "https://www.google.com/recaptcha/api/siteverify";
                    $secret = "6Ld8Mz0mAAAAALsVs_L54ZovMV2jWRvJ2ucW8-OP";
                    $response = $_POST['g-recaptcha-response'];
                    $variaveis = "secret=".$secret."&response=".$response;

                    //Passos de verificação no servidor
                    $ch = curl_init($url);
                    curl_setopt( $ch, CURLOPT_POST, 1);
                    curl_setopt( $ch, CURLOPT_POSTFIELDS, $variaveis);
                    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt( $ch, CURLOPT_HEADER, 0);
                    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                    $resposta = curl_exec($ch);
                    
                    //Verifica se a válidação e o recebimento do código são True 
                    $resultado = json_decode($resposta);
                    if ($resultado -> success == 1) {
                        echo '<meta http-equiv="refresh" content="0;URL=\'codig-valido.html\'" />';     //Se for verdadeira, será redirecionado até a página de validação
                    }

                }
            } else {echo '<script language="javascript" type="text/javascript">
                alert("LOGIN E SENHA ERRADO!");
                </script>';} 
        }  
    }

    ?>


</html>
