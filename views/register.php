<?php  
    require './models/Connect_db.php';
    $user = new Connect_db();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./css/login.css">
    <script defer src="./js/label.js"></script>
</head>
<body>
    <main>
        <section class="container_login">
            <div class="content_side">
                <img src="../assets/student_2.png" alt="estudante">
            </div>
            <div class="content_side">
                <h2 class="title">Realize seu cadastro na plataforma!</h2>
                <form method="post" class="form">
                    <h2 class="title_form">Cadastrar</h2>
                    <div class="box_input">
                        <input type="text" name="name" class="input_text" required>
                        <label for="name" class="label">Novo Nome</label>
                    </div>
                    <div class="box_input">
                        <input type="password" name="password" class="input_text" required>
                        <label for="password" class="label">Senha</label>
                    </div>
                    <div class="box_input">
                        <input type="password" name="re-password" class="input_text" required>
                        <label for="re-password" class="label">Confirme sua Senha</label>
                    </div>
                    <input type="submit" value="Entrar" class="btn_submit">
                    <h5 class="register-msg">Já tem conta? <a href="./register.php">Retorne ao Login</a></h5>
                </form>
            </div>
        </section>
    </main>

    <?php 
        if (isset($_POST["name"]) and isset($_POST["password"]) and isset($_POST["re-password"])) {
            $name = addslashes($_POST["name"]);
            $psw = addslashes($_POST["password"]);
            $re_psw = addslashes($_POST["re-password"]);

            if(!empty($name) and !empty($psw) and !empty($re_psw)) {

            } else {
                echo "Prencha todos os campos";
            }
            if($_POST["password"] == $_POST["re-password"]) {
                $user->connect("todo_list", "localhost", "root", "");
                if($user->msgErro == "") {
                    if($user->register($name, $psw)) {
                        echo "cadastrado com sucesso, irmão";                    
                    } else {
                        echo $user->msgErro;
                    }
                } else {
                    echo "erro:".$user->msgErro;
                }
            } else {
                echo "As senhas estão diferentes";
            }
        }
    ?>
</body>
</html>