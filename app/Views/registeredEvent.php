<!DOCTYPE html>
<html>

<head>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
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



        <h1>Eventos Cadastrados</h1>

        <?php
        if (empty($events)) {
            echo "Nenhum evento cadastrado.";
        } else {
            foreach ($events as $event) {
                echo "Nome: " . $event->name;
                echo "<br>";
                echo "Local: " . $event->local;
                echo "<br>";
                echo "Data/Hora: " . timestamp2br($event->date_time);
                echo "<br>";
                echo "Descrição: " . $event->description;
                echo "<br>";
                echo "<br>";
                //echo "<form action='".base_url('confirmed')."' method='POST'>";
                //echo "<input type='hidden' name='id_voucher' value='".$event->id."'/>";
                //echo '<button type="submit">Confirmar Presença</button>';
                //echo '</form>';
                echo "<form action='" . base_url('confirmed') . "' method='POST'>";
                echo '<a class="btn btn-primary" href="' . base_url('confirmed') . "/" . $event->id . '" role="button">Confirmar Presença</a>';
                echo "<br>";
                echo "<br>";
                if ($event->creator === session()->get('id')) {
                    echo '<a class="btn btn-primary" href="' . base_url('event/updateEvent/' . $event->id) . '" role="button">Atualizar</a>';
                    echo '<a class="btn btn-primary" href="' . base_url('event/deleteEvent/' . $event->id) . '" role="button">Deletar</a>';
                }

                echo "<hr>";
            }
        }
        ?>
    </div>
</body>


</html>