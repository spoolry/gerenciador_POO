<form method="POST" action="<?php echo base_url('eventos/updateEvento/'. $evento->id) ?>">
    <input type="hidden" name="id" id="id" value="<?php echo $evento->id ?>" />
    <label for="text">Nome:</label>
    <input type="text" name="name" id="name" value="<?php echo $evento->name ?>" required />
    <label for="text">Local:</label>
    <input type="text" name="local" id="local" value="<?php echo $evento->local ?>" required />
    <label for="text">Data/Hora:</label>
    <input type="datetime-local" name="data_hora" id="data_hora" value="<?php echo $evento->data_hora ?>" required />
    <label for="text">Descrição:</label>
    <input type="text" name="descricao" id="descricao" value="<?php echo $evento->descricao ?>" />

  
    <button type="submit">Atualizar</button>
</form>