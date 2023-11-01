<form method="POST" action="<?php echo base_url('event/updateEvent') ?>">
    <input type="hidden" name="id" id="id" value="<?php echo $user->id ?>" />
    <label for="text">Nome:</label>
    <input type="text" name="name" id="name" value="<?php echo $user->name ?>" required />
    <label for="text">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $user->email ?>" readonly />
    <label for="text">Senha:</label>
    <input type="password" name="password" id="password" />
    <button type="submit">Atualizar</button>
</form>

<a href='<?php echo base_url('event/deleteEvent/'. $event->id) ?>'>Deletar</a>