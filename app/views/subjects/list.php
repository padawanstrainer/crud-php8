<h2>Listado de materias</h2>
<a href='/subject/new'>Agregar materia</a>

<table>
  <thead>
    <tr>
      <th>Materia</th>
      <th colspan="2">Profesor</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach( $data['subjects'] as $s ){
      echo <<<HTML
        <tr>
          <td>$s[subject]</td>
          <td>$s[name]</td>
          <td>$s[lastname]</td>
          <td>
            <a href='/subject/$s[id]/edit'>Editar</a>
            <a href='/subject/$s[id]/delete'>Borrar</a>
          </td>
        </tr>
      HTML;
    }
    ?>
  </tbody>
</table>