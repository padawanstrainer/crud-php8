<?php if( isLogged() ){ ?>
<nav>
  <ul>
    <?php if( isAdmin( ) ): //link de materias para rectores ?>
      <li><a href='/subject'>Materias</a></li>
    <?php else: //link de materias en profesores ?>
    <li>
      <span>Materias</span>
      <ul>
        <li><a href='#'>Ed Fisica</a></li>
        <li><a href='#'>Contabilidad</a></li>
      </ul>
    </li>
    <?php endif; ?>
    <li>
      <span><?php echo $_SESSION['name']; ?></span>
      <ul>
        <li><a href='#'>Perfil</a></li>
        <li><a href='/login/end'>Salir</a></li>    
      </ul>
    </li>
  </ul>
</nav>
<?php } ?>