<!DOCTYPE html>
<html>

<head>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <title>Eventos Cadastrados</title>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icone.png" />
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<div class="dashboard">

    <body>

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
                //echo "<form action='".base_url('confirmed')."' method='POST'>";
                //echo "<input type='hidden' name='id_voucher' value='".$event->id."'/>";
                //echo '<button type="submit">Confirmar Presença</button>';
                //echo '</form>';
                echo "<form action='" . base_url('confirmed') . "' method='POST'>";
                echo "<a href='" . base_url('confirmed') . "/" . $event->id . "'>Confirmar Presença</a>";
                echo "<br>";
                if ($event->creator === session()->get('id')) {
                    echo '<a href="' . base_url('event/updateEvent/' . $event->id) . '">Atualizar | </a>';
                    echo '<a href="' . base_url('event/deleteEvent/' . $event->id) . '">Deletar</a>';
                }

                echo "<hr>";
            }
        }
        ?>
    </body>
</div>

</html>