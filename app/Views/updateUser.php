<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icone.png" />
    <title>V&G Events</title>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard">V&G Events</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="createEvent">Cadastrar Eventos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registeredEvent">Eventos Cadastrados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="showVoucher">Vouchers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout">logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true"><?php session('user_name')?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="dashboard">

        <form method="POST" action="/updateUser">
            <input type="hidden" name="id" id="id" value="<?php echo $user->id ?>" />
            <label for="text">Nome:</label>
            <input type="text" name="name" textarea style="color: white; background-color: transparent;" id="name" value="<?php echo $user->name ?>" required />
            <label for="text">Email:</label>
            <input type="email" name="email" textarea style="color: white; background-color: transparent;" id="email" value="<?php echo $user->email ?>" readonly />
            <label for="text">Senha:</label>
            <input type="password" name="password" textarea style="color: white; background-color: transparent;" id="password" />
            <input class="btn btn-primary" type="submit" value="Atualizar"> 
            <a class="btn btn-primary" href="/deleteUser" role="button">Deletar</a>
        </form>

    </div>
</body>