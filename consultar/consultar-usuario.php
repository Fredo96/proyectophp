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
$pagination->rowCount("SELECT * FROM usuario WHERE estado = 1 and nombre LIKE '%$search%' ORDER BY  nombre");
$pagination->config(3, 15);
$sql = "SELECT * FROM usuario WHERE estado = 1 and nombre LIKE '%$search%' ORDER BY nombre LIMIT $pagination->start_row, $pagination->max_rows";
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
$pagination->rowCount("SELECT * FROM usuario where  estado = 1 ORDER BY nombre");
$pagination->config(3, 15);
$sql = "SELECT * FROM usuario WHERE estado = 1 ORDER BY nombre LIMIT $pagination->start_row, $pagination->max_rows";
$query = $connection->prepare($sql);
$query->execute();
$model = array();
while($rows = $query->fetch())
{
    $model[] = $rows;
}
}

if ($pagination->rowCount( "SELECT * FROM usuario WHERE estado = 1 and nombre LIKE '%$search%'")>0 || $query->rowCount($sql)>0){
?>

                                <table  class="form-group"><tr>

                                    <td><form method="POST"   action="<?php echo $_SERVER["PHP_SELF"] ?>">
                               <div>
                                <td><input type="text" name="search" class="form-control"   placeholder="Buscar Por Nombre" /></td>
                               <td> &nbsp;<input type="submit"  value="BUSCAR" class="btn btn-primary"> &nbsp; <a href="../imprimir/imprimir-usuario.php" target="_blank"  class="btn btn-info" title="Imprimir Reporte">IMPRIMIR</a></td>
                                </div></td>
                          </form></tr>
                          </table>
<div class="table-responsive">
<table class='table table-striped table-hover  form-group responsive' >
    <tr class="success">
        <th>Id </th>
        <th>NOMBRES</th>
        <th>APELLIDOS</th>
        <th>E-MAIL</th>
        <th>USUARIO</th>
      <th style="text-align:center;"><h3><span class="glyphicon glyphicon-cog" title="Operaciones"></span></h3></th>

      

    </tr>
    <?php
    foreach($model as $row)
    {
    	//mensaje para verificar si realmente desea borrar o no
		                        $confirmar = "return confirm('Confirmar: &iquest;Est&aacute; Seguro Que Desea Eliminar El Registro?')";
		                        $url = "../consultar/ver-usuario.php";
		                        $variables = "campo=idusuario&valorCampo=".$row['idusuario']."&tabla=usuario&url=".$url;

						        echo "<tr>";
						        echo "<td>".$row['idusuario']."</td>";
						        echo "<td>".$row['nombre']."</td>";
                                echo "<td>".$row['apellido']."</td>";
                                echo "<td>".$row['email']."</td>";
                                echo "<td>".$row['usuario']."</td>";
						       
						        echo '<td width=20% style="text-align:center;">
						        		<a class="btn btn-success" href="../modificar/modificar-usuario.php?id='.$row['idusuario'].'" title="Editar Informaci&oacute;n"><span class="glyphicon glyphicon-pencil"></span> </a>
						                 <a class="btn btn-danger" href="../borrar/borrarRegistros.php?'.$variables.'" title="Borrar Registro" onclick="'.$confirmar.'"><span class="glyphicon glyphicon-remove-sign"></span> </a>
						                   

						        </td>';

       
    }

    }elseif(isset($_POST["search"]) && $pagination->rowCount( "SELECT * FROM usuario WHERE estado = 1 and nombre LIKE '%$search%'")==0) {
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