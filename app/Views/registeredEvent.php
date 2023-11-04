</html>

<!DOCTYPE html>
<html>

<head>
    <title>Eventos Cadastrados</title>
</head>

<body>
    <h1>Eventos Cadastrados</h1>

    <?php

    foreach ($events as $event) :
        echo "Nome: " . $event->name;
        echo "<br>";
        echo "Local: " . $event->local;
        echo "<br>";
        echo "Data/Hora: " . timestamp2br($event->datetime);
        echo "<br>";
        echo "Descrição: " . $event->description;
        echo "<hr>";
    endforeach ?>
</body>

<a href="<?php echo base_url('event/updateEvent/' . $event->id) ?>">Atualizar</a>
<a href="<?php echo base_url('deleteEvent/' . $event->id) ?>">Deletar</a>

</html>