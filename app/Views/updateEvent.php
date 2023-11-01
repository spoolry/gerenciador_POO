<form method="POST" action="<?php echo base_url('event/updateEvent/'. $event->id) ?>">
    <input type="hidden" name="id" id="id" value="<?php echo $event->id ?>" />
    <label for="text">Nome:</label>
    <input type="text" name="name" id="name" value="<?php echo $event->name ?>" required />
    <label for="text">Local:</label>
    <input type="text" name="local" id="local" value="<?php echo $event->local ?>" required />
    <label for="text">Data/Hora:</label>
    <input type="datetime-local" name="date_time" id="date_time" value="<?php echo $event->date_time ?>" required />
    <label for="text">Descrição:</label>
    <input type="text" name="description" id="description" value="<?php echo $event->description ?>" />

  
    <button type="submit">Atualizar</button>
</form>