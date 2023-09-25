    <h2>Listado de alumnos</h2>
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Parcial 1</th>
          <th>Parcial 2</th>
          <th>Parcial 3</th>
          <th>Parcial 4</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $data['users'] as $u ): ?>
        <tr>
          <td><?php echo $u['lastname'].' '. $u['name']; ?></td>
          <td><?php echo $u['e1']; ?></td>
          <td><?php echo $u['e2']; ?></td>
          <td><?php echo $u['e3']; ?></td>
          <td><?php echo $u['e4']; ?></td>
          <td><a href='/ver.html'>Ver notas</a></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>