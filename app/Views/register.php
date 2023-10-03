<?php if (session('errors')) : ?>
    <div class="alert alert-danger"><?= implode('<br>',  session('errors')) ?></div>
<?php endif; ?>
<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif;?>

<form method="POST" action="/createUser">
    <label for="text">Nome:</label>
    <input type="text" name="nome" id="nome" require />
    <label for="text">Email:</label>
    <input type="email" name="email" id="email" require/>
    <label for="text">Senha:</label>
    <input type="password" name="password" id="password" require/>
    <button type="submit">Criar usuário</button>
</form>