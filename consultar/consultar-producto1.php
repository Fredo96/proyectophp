<?php

include_once('../include/conectarpdo.php');
    $connection = conexion();

include("../include/paginacion.php");


$pagination = new paginacion($connection);

$search = null;
if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
{
$search = htmlspecialchars($_REQUEST["search"]);
$pagination->param = "&search=$search";
$pagination->rowCount("SELECT a.Id_Producto, a.Precio, e.descripcion, a.Descripcion, r.Nombre
FROM productos as a
inner JOIN categorias as e
inner JOIN proveedores as r ON e.Id_categoria=a.Id_categoria and r.Id_Proveedor=a.Id_Proveedor
WHERE a.Id_Categoria and a.Id_Proveedor AND a.estado = 1 and a.Descripcion LIKE '%$search%' ORDER BY a.Descripcion");
$pagination->config(3,5);
$sql = "SELECT a.Id_Producto, a.Precio, e.descripcion, a.Descripcion, r.Nombre
FROM productos as a
inner JOIN categorias as e
inner JOIN proveedores as r ON e.Id_categoria=a.Id_categoria and r.Id_Proveedor=a.Id_Proveedor
WHERE a.Id_Categoria and a.Id_Proveedor AND a.estado = 1 and a.Descripcion LIKE '%$search%' ORDER BY a.Descripcion LIMIT $pagination->start_row, $pagination->max_rows";
$query = $connection->prepare($sql);
$query->execute();
$model = array();
while($rows = $query->fetch())
{
    $model[] = $rows;
}
}
else
{
$pagination->rowCount("SELECT a.Id_Producto, a.Precio, e.descripcion, a.Descripcion, r.Nombre
FROM productos as a
inner JOIN categorias as e
inner JOIN proveedores as r ON e.Id_categoria=a.Id_categoria and r.Id_Proveedor=a.Id_Proveedor
WHERE a.Id_Categoria and a.Id_Proveedor AND a.estado = 1 and a.Descripcion LIKE '%$search%' ORDER BY a.Descripcion");
$pagination->config(3,5);
$sql = "SELECT a.Id_Producto, a.Precio, e.descripcion, a.Descripcion, r.Nombre
FROM productos as a
inner JOIN categorias as e
inner JOIN proveedores as r ON e.Id_categoria=a.Id_categoria and r.Id_Proveedor=a.Id_Proveedor
WHERE a.Id_Categoria and a.Id_Proveedor AND a.estado = 1 LIMIT $pagination->start_row, $pagination->max_rows";
$query = $connection->prepare($sql);
$query->execute();
$model = array();
while($rows = $query->fetch())
{
    $model[] = $rows;
}
}

if ($pagination->rowCount( "SELECT a.Id_Producto, a.Precio, e.descripcion, a.Descripcion, r.Nombre
FROM productos as a
inner JOIN categorias as e
inner JOIN proveedores as r ON e.Id_categoria=a.Id_categoria and r.Id_Proveedor=a.Id_Proveedor
WHERE a.Id_Categoria and a.Id_Proveedor AND a.estado = 1 and a.Descripcion LIKE '%$search%' ORDER BY a.Descripcion LIKE '%$search%'")>0 || $query->rowCount($sql)>0){
?>

                                <table  class="form-group"><tr>

                                    <td><form method="POST"   action="<?php echo $_SERVER["PHP_SELF"] ?>">
                               <div>
                                <td><input type="text" name="search" class="form-control"   placeholder="Buscar Por Producto" /></td>
                               <td> &nbsp;<input type="submit"  value="BUSCAR" class="btn btn-primary"> &nbsp; <a href="../imprimir/imprimir-productos.php" target="_blank"  class="btn btn-info" title="Imprimir Reporte">IMPRIMIR</a></td>
                                </div></td>
                          </form></tr>
                          </table>
<div class="table-responsive">
<table class='table table-striped table-hover  form-group responsive' >
    <tr class="success">
        <th>ID</th>
        <th>PRODUCTO</th>
        <th>PRECIO</th>
        <th>CATEGOR&Iacute;A</th>
        <th>PROVEEDOR</th>
      <th style="text-align:center;"><h3><span class="glyphicon glyphicon-cog" title="Operaciones"></span></h3></th>



    </tr>
    <?php
    foreach($model as $row)
    {

        //mensaje para verificar si realmente desea borrar o no

                                $confirmar = "return confirm('Confirmar: &iquest;Est&aacute; Seguro Que Desea Eliminar El Registro?')";
                                $url = "../consultar/ver-producto.php";
                                $variables ="campo=Id_Producto&valorCampo=".$row['Id_Producto']."&tabla=productos&url=".$url;

                                echo "<tr>";
                                echo "<td>".$row['Id_Producto']."</td>";

                                echo "<td>".$row['Descripcion']."</td>";
                                echo "<td>".$row['Precio']."</td>";
                                echo "<td>".$row['descripcion']."</td>";
                                echo "<td>".$row['Nombre']."</td>";

                                echo '<td width=20% style="text-align:center;">
                                        <a class="btn btn-success" href="../modificar/modificar-producto.php?id='.$row['Id_Producto'].'" title="Editar Informaci&oacute;n"><span class="glyphicon glyphicon-pencil"></span> </a>
                                         <a class="btn btn-danger" href="../borrar/borrarRegistros.php?'.$variables.'" title="Borrar Registro" onclick="'.$confirmar.'"><span class="glyphicon glyphicon-remove-sign"></span> </a>
                                          </td>';


    }

  }elseif(isset($_POST["search"]) && $pagination->rowCount( "SELECT a.Id_Producto, a.Precio, e.descripcion, a.Descripcion, r.Nombre
FROM productos as a
inner JOIN categorias as e
inner JOIN proveedores as r ON e.Id_categoria=a.Id_categoria and r.Id_Proveedor=a.Id_Proveedor
WHERE a.Id_Categoria and a.Id_Proveedor AND a.estado = 1 AND a.Descripcion LIKE '%$search%'")==0) {
        # no Hay datos
            echo '<table  class="form-group"><tr>
                        <td><form method="POST" action="'.$_SERVER["PHP_SELF"].'">
                            <div>
                               <td> &nbsp;<input type="submit"  value="REALIZAR OTRA B&Uacute;SQUEDA" class="btn btn-primary"></td>
                            </div></td>
                          </form></tr>
                    </table>';
            echo '<div class="alert alert-info" role="alert"><strong>&iexcl;Vaya!</strong> No Hay Resultados De B&uacute;squeda...</div>';
    } else{
        echo '<div class="alert alert-info" role="alert"><strong>&iexcl;Vaya!</strong> No Hay Datos Registrados...</div>';
        }
    ?>
</table>
 </div>

<?php
$pagination->pages("btn");
?>
