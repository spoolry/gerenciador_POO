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

        <form method="POST" action="/updateUser">
            <input type="hidden" name="id" id="id" value="<?php echo $user->id ?>" />
            <label for="text">Nome:</label>
            <input type="text" name="name" id="name" value="<?php echo $user->name ?>" required />
            <label for="text">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $user->email ?>" readonly />
            <label for="text">Senha:</label>
            <input type="password" name="password" id="password" />
            <button type="submit">Atualizar</button>
        </form>

        <a href="/deleteUser">Deletar</a>
    </div>
</body>