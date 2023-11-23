<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icone.png" />
    <title>V&G Events</title>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<body>
    <div class="dashboard">
        <div class="menu">
            <?php
            echo "Email do usuário: " . session('email');
            echo "<br>";
            echo "Data e hora login: " . session('data_login');
            echo "<br>";
            echo "Data e hora cadastro: " . session('data_cad');
            echo "<hr>";
            echo "<br>";
            echo lang('App.welcome', [], session('user_locale'));
            echo "<br>";
            ?>

            <br>
            <a class="btn btn-primary" href="/updateUser" role="button">Atualizar Usuário</a>
            <br><br>
            <a class="btn btn-primary" href="/createEvent" role="button">Cadastrar Eventos</a>
            <br><br>
            <a class="btn btn-primary" href="/registeredEvent" role="button">Eventos Cadastrados</a>
            <br><br>
            <a class="btn btn-primary" href="/showVoucher" role="button">Vouchers</a>
            <br>
        </div>
    </div>
</body>

</html>