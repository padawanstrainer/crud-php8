<h2><?php echo $data['form']['title']; ?></h2>

<form method="post" action="<?php echo $data['form']['action']; ?>">
  <div>
    <label for="name">Materia</label>
    <input type="text" id="name" name="subject" required placeholder="Materia" autocomplete="off" value="<?php echo form_value('subject') ; ?>" />
  </div>
  <div>
    <label for="teacher">Profesor/a</label>
    <select name="teacher" id="teacher">
      <?php foreach( $data['teachers'] as $t ){
        $selected = $t['id'] == form_value('fkteacher') ? ' selected' : '';
        echo "<option$selected value='$t[id]'>$t[lastname], $t[name]</option>";
      }?>
    </select>
  </div>
  <div class='buttons'>
    <input type="hidden" name="rel" value="<?php echo form_value('idcourse'); ?>" />
    <button type="submit"><?php echo $data['form']['button']; ?></button>
    <button type="button" onclick="location.href='/subject'">Cancelar</button>
  </div>
</form>