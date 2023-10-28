<form method="POST" action="/updateUser">
    <input type="hidden" name="id" id="id" value="<?php echo $user->id ?>" />
    <label for="text">Nome:</label>
    <input type="text" name="name" id="name" value="<?php echo $user->name ?>" readonly />
    <label for="text">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $user->email ?>" require />
    <label for="text">Senha:</label>
    <input type="password" name="password" id="password" />
    <button type="submit">Atualizar</button>
</form>

<a href="/deleteUser">Deletar</a>