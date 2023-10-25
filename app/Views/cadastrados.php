<!DOCTYPE html>
<html>

<head>
    <title>Eventos Cadastrados</title>
</head>

<body>
    <h1>Eventos Cadastrados</h1>

    <?php
    foreach ($eventos as $evento) :
        echo "Nome: " . $evento->name;
        echo "<br>";
        echo "Local: " . $evento->local;
        echo "<br>";
        echo "Data/Hora: " . timestamp2br($evento->data_hora);
        echo "<br>";
        echo "Descrição: " . $evento->descricao;
        echo "<hr>";
    endforeach ?>
</body>

</html>