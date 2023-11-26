<!DOCTYPE html>
<html>

<head>
    <title>V&G Events</title>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icone.png" />
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

   
        <h1>Cadastro de Eventos</h1>

        <form action="/createEvent" method="POST">
            <label for="name">Nome do Evento:</label>
            <input type="text" textarea style="color: white; background-color: transparent;" id="name" name="name" required><br><br>

            <label for="local">Local:</label>
            <input type="text" textarea style="color: white; background-color: transparent;" id="local" name="local" required><br><br>

            <label for="date_time">Data e hora:</label>
            <input type="datetime-local" textarea style="color: white; background-color: transparent;" id="date_time" name="date_time" required><br><br>

            <label for="description">Descrição:</label><br>
            <textarea id="description" textarea style="color: white; background-color: transparent;" name="description" rows="4" cols="50" required></textarea><br><br>

            <input type="hidden" name="creator" value="<?php echo session()->get('id') ?>" readonly><br><br>
            <input class="btn btn-primary" type="submit" value="Cadastrar Evento">
        </form>
    </body>
</div>

</html>