<!DOCTYPE html>
<html>

<head>
    <title>Eventos Cadastrados</title>
</head>

<body>
    <h1>Eventos Cadastrados</h1>

    <?php

    foreach ($events as $event) : ?>
            <?php echo "Nome do Evento: " . $event->name ?> <br><br>
            <?php echo "Local: " . $event->local ?> <br><br>
            <?php echo "Data/Hora: " . $event->date_time, timestamp2br('d/m/y') ?><br><br>
            <?php echo "Descrição: " . $event->description ?><br><br>
            <?php echo $event->creator ?> <br><br>

        </form>
    <?php endforeach ?>
    <a href="<?php echo base_url('event/updateEvent/'. $event->id) ?>">Atualizar</a>
    <a href="<?php echo base_url('event/deleteEvent/'. $event->id) ?>">Deletar</a>

</body>

</html>