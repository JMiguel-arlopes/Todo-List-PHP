<?php 
    require './models/Connect_db.php';
    $user = new Connect_db(); 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <script defer src="./js/label.js"></script>
</head>
<body>
    <main>
        <section class="container_login">
            <div class="content_side">
                <img src="../assets/student.png" alt="estudante">
            </div>
            <div class="content_side">
                <h2 class="title">Faça sua Lista de Tarefas aqui!</h2>
                <form method="post" class="form">
                    <h2 class="title_form">Entrar</h2>
                    <div class="box_input">
                        <input type="text" name="name" class="input_text" required>
                        <label for="name" class="label">Nome</label>
                    </div>
                    <div class="box_input">
                        <input type="password" name="password" class="input_text" required>
                        <label for="password" class="label">Senha</label>
                    </div>
                    <input type="submit" value="Entrar" class="btn_submit">
                    <h5 class="register-msg">Não tem conta? <a href="./register.php">Cadastre-se</a></h5>
                </form>
            </div>
        </section>
    </main>

    <?php 
        if(isset($_POST['name']) and isset($_POST['password'])) {
           $name = addslashes($_POST['name']);
           $psw = addslashes($_POST['password']);
            
           $user->connect();
        }
    ?>
</body>
</html>