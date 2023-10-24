<!DOCTYPE html>
<html>
<head>
    <title>Eventos Cadastrados</title>
</head>
<body>
    <h1>Eventos Cadastrados</h1>

    <?php
    foreach ($eventos as $evento): ?> 
    <form action="/createEvento" method="POST">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="<?php echo $evento->name ?>" required><br><br>

        <label for="local">Local:</label>
        <input type="text" id="local" name="local" value="<?php echo $evento->local ?>" required><br><br>

        <label for="data_hora">Data e hora:</label>
        <input type="datetime-local" id="data_hora" name="data_hora" value="<?php echo $evento->data_hora ?>"required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4" cols="50" value="<?php echo $evento->descricao ?>"required></textarea><br><br>

        <label for="descricao">Criador:</label><br>
        <input type="text" id="creator" name="creator" value="<?php echo $evento->creator ?>" readonly><br><br>

        <input type="submit" value="Cadastrar Evento">
    </form>
    <?php endforeach?>
</body>
</html>
