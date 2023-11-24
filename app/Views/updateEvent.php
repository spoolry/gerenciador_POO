<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icone.png" />
    <title>V&G Events</title>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="dashboard">

        <form method="POST" action="<?php echo base_url('event/updateEvent/' . $event->id) ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $event->id ?>" />
            <label for="text">Nome:</label>
            <input type="text" name="name" textarea style="color: white; background-color: transparent;" id="name" value="<?php echo $event->name ?>" required />
            <label for="text">Local:</label>
            <input type="text" name="local" textarea style="color: white; background-color: transparent;" id="local" value="<?php echo $event->local ?>" required />
            <label for="text">Data/Hora:</label>
            <input type="datetime-local" name="date_time" textarea style="color: white; background-color: transparent;" id="date_time" value="<?php echo $event->date_time ?>" required />
            <label for="text">Descrição:</label>
            <input type="text" name="description" textarea style="color: white; background-color: transparent;" id="description" value="<?php echo $event->description ?>" />


            <input class="btn btn-primary" type="submit" value="Atualizar">
        </form>
    </div>
</body>