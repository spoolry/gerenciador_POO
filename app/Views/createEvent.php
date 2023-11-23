<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Eventos</title>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icone.png" />
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<div class="dashboard">

    <body>
        <h1>Cadastro de Eventos</h1>

        <form action="/createEvent" method="POST">
            <label for="name">Nome do Evento:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="local">Local:</label>
            <input type="text" id="local" name="local" required><br><br>

            <label for="date_time">Data e hora:</label>
            <input type="datetime-local" id="date_time" name="date_time" required><br><br>

            <label for="description">Descrição:</label><br>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

            <input type="hidden" name="creator" value="<?php echo session()->get('id') ?>" readonly><br><br>
            <input type="submit" value="Cadastrar Evento">
        </form>
    </body>
</div>

</html>