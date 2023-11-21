<?php if (session('errors')) : ?>
    <div class="alert alert-danger"><?= implode('<br>',  session('errors')) ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<!-- <form method="POST" action="/createUser">
    <label for="text">Nome:</label>
    <input type="text" name="name" id="name" required />
    <label for="text">Email:</label>
    <input type="email" name="email" id="email" required />
    <label for="text">Senha:</label>
    <input type="password" name="password" id="password" required />
    <button type="submit">Criar usuário</button>
</form> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NOME EMPRESA</title>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="wrapper">

        <div class="login-box">
            <form method="POST" action="/createUser">
                <h2>Cadastre-se</h2>

                <div class="input-box">
                    <!-- <span class="icon">
                        <ion-icon name="name"></ion-icon>
                    </span> -->
                    <input type="text" name="name" id="name" required />
                    <label>Nome</label>
                </div>

                <div class="input-box">
                    <!-- <span class="icon">
                        <ion-icon name="email"></ion-icon>
                    </span> -->
                    <input type="email" name="email" id="email" required />
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <!-- <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span> -->
                    <input type="password" name="password" id="password" required />
                    <label>Senha</label>
                </div>

                <button type="submit">Cadastrar-se</button>

                <div class="register-link">
                    <p>Já tem uma conta? <a href="/">Login</a></p>
                </div>
            </form>
        </div>

    </div>
    <!-- partial -->
    <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
    <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
</body>

</html>