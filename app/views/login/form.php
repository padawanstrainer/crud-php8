<h2>Formulario de login</h2>
<?php getErrorMessage( ); ?>
<form method="post" action="/login/start">
  <div>
    <label for="user">Usuario</label>
    <input type="text" id="user" name="user" autocomplete="off" placeholder="Número de Cédula"  />
  </div>
  <div>
    <label for="pwd">Clave</label>
    <input type="password" id="pwd" name="pwd" placeholder="Su contraseña"  />
  </div>
  <div class='buttons'>
    <button type="submit">Ingresar</button>
  </div>
</form>