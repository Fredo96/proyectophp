<link href="bootstrap3-7/css/styleIndex.css" rel="stylesheet">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Navegaci&oacute;n</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../principal/"><img width="100px" height="120px" src="../img/logo-mini.png" class="img-responsive" alt="Logo" title="Ir al inicio" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span> Entradas <span class="caret"></span></a>
          <ul class="dropdown-menu">
                           <li><a href="../guardar/guardar-venta.php"><span class="glyphicon glyphicon-floppy-save"></span> Nueva Entrada</a></li>
             <li role="separator" class="divider"></li>
              <li><a href="../consultar/ver-venta.php"><span class="glyphicon glyphicon-search"></span> Consultar Entrada </a></li>
          </ul>
        </li>
 </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Salidas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../guardar/guardar-salidas.php"><span class="glyphicon glyphicon-floppy-save"></span> Guardar Salidas </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../consultar/ver-proveedor.php"><span class="glyphicon glyphicon-search"></span> Consultar Salidas </a></li>
          </ul>
        </li>
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tag"></span> Productos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../guardar/guardar-producto.php"><span class="glyphicon glyphicon-floppy-save"></span> Guardar Producto </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../consultar/ver-producto.php"><span class="glyphicon glyphicon-search"></span> Consultar Producto </a></li>
          </ul>
        </li>

            <li role="separator" class="divider"></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../guardar/guardar-usuario.php"><span class="glyphicon glyphicon-floppy-save"></span> Guardar Usuario </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../consultar/ver-usuario.php"><span class="glyphicon glyphicon-search"></span> Consultar Usuario </a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Proveedores <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../guardar/guardar-proveedor.php"><span class="glyphicon glyphicon-floppy-save"></span> Guardar Proveedor </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../consultar/ver-proveedor.php"><span class="glyphicon glyphicon-search"></span> Consultar Proveedor </a></li>
        </ul>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-th"></span> Categor&iacute;as <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../guardar/guardar-categoria.php"><span class="glyphicon glyphicon-floppy-save"></span> Guardar Categor&iacute;a </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../consultar/ver-categoria.php"><span class="glyphicon glyphicon-search"></span> Consultar Categor&iacute;a </a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" title="Usuario En L&iacute;nea"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nombreusuario']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../" title="Salir del Sistema" onclick="return confirm('Confirmar: &iquest;Est&aacute; seguro que desea salir del Sistema?')"><span class="glyphicon glyphicon glyphicon-share"></span>Salir</a></li>
          </ul>
        </li>
      </ul>
      <br>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>