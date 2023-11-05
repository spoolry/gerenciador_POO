<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Eventos</title>
</head>

<body>
    <h1>Cadastro de Eventos</h1>

    <form action="/createEvent" method="POST">
        <label for="name">Nome do Evento:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="local">Local:</label>
        <input type="text" id="local" name="local" required><br><br>

        <label for="datetime">Data e hora:</label>
        <input type="datetime-local" id="datetime" name="datetime" required><br><br>

        <label for="description">Descrição:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <input type="hidden" name="creator" value="<?php echo session()->get('id') ?>" readonly><br><br>
        <input type="submit" value="Cadastrar Evento">
    </form>
</body>

</html>