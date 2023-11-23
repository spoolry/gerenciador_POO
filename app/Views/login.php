<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icone.png" />
    <title>V&G Events</title>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="wrapper">

        <div class="login-box">
            <form action="authenticate" method="post">
                <h2>Login</h2>

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

                <button type="submit">Login</button>

                <div class="register-link">
                    <p>Não tem uma conta? <a href="/registerUser">Cadastre-se</a></p>
                </div>
            </form>
        </div>

    </div>
    <!-- partial -->
    <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
    <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
</body>

</html>