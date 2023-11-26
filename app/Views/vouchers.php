<!DOCTYPE html>
<html>

<head>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icone.png" />
    <title>V&G Events</title>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard">V&G Events</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="createEvent">Cadastrar Eventos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registeredEvent">Eventos Cadastrados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="showVoucher">Vouchers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout">logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true"><?php session('user_name')?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="dashboard">

        <h1>Seus Vouchers</h1>
        <br>
        <?php

        if (empty($vouchers)) {
            echo 'Você não possui vouchers.';
        } else {
            foreach ($vouchers as $voucher) {
                echo "Voucher: " . $voucher->id;
                echo "<br>";
                echo "Evento: " . $voucher->event_name;
                echo "<br>";
                echo "<br>";
            }
        }
        ?>
    </div>
</body>