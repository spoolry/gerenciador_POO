<!DOCTYPE html>
<html>

<head>
    <title>Eventos Cadastrados</title>
</head>

<body>
    <h1>Eventos Cadastrados</h1>

    <?php

    foreach ($eventos as $evento) : ?>
            <?php echo "nOME:" . $evento->name ?> <br><br>
            <?php echo $evento->local ?> <br><br>
            <?php echo $evento->data_hora, timestamp2br('d/m/y') ?><br><br>
            <?php echo $evento->descricao ?><br><br>
            <?php echo $evento->creator ?> <br><br>

        </form>
    <?php endforeach ?>
    <a href="<?php echo base_url('eventos/updateEvento/'. $evento->id) ?>">Atualizar</a>
    <a href="/deleteEvento">Deletar</a>

</body>

</html>