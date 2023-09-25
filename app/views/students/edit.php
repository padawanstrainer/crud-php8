<form action="/student/new" method="post">
      <h2>Crear alumno</h2>
      <div>
        <label for="user">Usuario</label>
        <input type="text" name="user" id="user" autocomplete="off" value="Nombre anterior" required />
      </div>
      <div>
        <label for="pwd">Contraseña</label>
        <input type="password" name="pwd" id="pwd" required />
      </div>
      <div class='buttons'>
        <button type="submit">Crear</button>
        <button type="button">Cancelar</button>
      </div>
    </form>