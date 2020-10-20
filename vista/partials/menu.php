<link rel="stylesheet" href="../icomoon/fonts.css">
<link rel="stylesheet" href="../icomoon/style.css">
<link rel="stylesheet" href="../css/style.css">
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">TECNM - ITAO</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="index.php"><span class="icon-home"></span> Principal</a></li>
            <?php if (!isset($_SESSION["usuario"])) {?>
            <li><a href="login.php"><span class="icon-enter"></span> Inicio Sesión</a></li>
            <li><a href="registro.php">Registro</a></li>
            <?php } else {
    ?>
              <?php if ($_SESSION["usuario"]["privilegio"] == 1) {?>
              <li><a href="admin.php"><span class="icon-user-tie"></span> Administrador</a></li>
              <li><a href="pdi.php"><span class="icon-pencil"></span> PDI</a></li>
              <li><a href="reportes.php"><span class="icon-cloud-upload"> Indicadores</a></li>
              <li><a href="cerrar-sesion.php"><span class="icon-exit"></span> Cerrar sesión</a></li>
              <?php } else {?>
              <li><a href="usuario.php"><span class="icon-user"></span> Usuario</a></li>
              <li><a href="reportesu.php"><span class="icon-cloud-upload"> Subir Indicadores</a></li>
              <li><a href="cerrar-sesion.php"><span class="icon-exit"></span> Cerrar sesión</a></li>
            <?php }

}?>
          </ul>
        </div>
      </div>
    </nav>
