
<form method="POST" action="/">
    <label for="text">Nome:</label>
    <input type="text" name="nome" id="nome" require />
    <label for="text">Email:</label>
    <input type="email" name="email" id="email" require/>
    <label for="text">Senha:</label>
    <input type="password" name="password" id="password" require/>
    <button type="submit">Atualizar</button>
</form>

    <a href="<?php echo base_url('deleteUser')?>">Deletar</a>