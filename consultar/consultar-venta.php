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
    $pagination->rowCount("SELECT a.Id_venta, a.Cantidad, e.Fecha, r.Descripcion FROM ventas as a inner JOIN factura as e inner JOIN productos as r ON e.Id_Factura=a.Id_Factura and r.Id_Producto=a.Id_Producto WHERE a.Id_Factura and a.Id_Producto AND a.estado = 1 and Cantidad LIKE '%$search%' ORDER BY Cantidad");
    $pagination->config(3, 15);
    $sql = "SELECT a.Id_venta, a.Cantidad, e.Fecha, r.Descripcion FROM ventas as a inner JOIN factura as e inner JOIN productos as r ON e.Id_Factura=a.Id_Factura and r.Id_Producto=a.Id_Producto WHERE a.Id_Factura and a.Id_Producto and a.estado = 1 and a.Cantidad LIKE '%$search%' ORDER BY a.Cantidad LIMIT $pagination->start_row, $pagination->max_rows";
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
    $pagination->rowCount("SELECT a.Id_venta, a.Cantidad, e.Fecha, r.Descripcion FROM ventas as a inner JOIN factura as e inner JOIN productos as r ON e.Id_Factura = a.Id_Factura and r.Id_Producto = a.Id_Producto WHERE a.Id_Factura and a.Id_Producto AND a.estado = 1 and Cantidad LIKE '%$search%' ORDER BY Cantidad");
    $pagination->config(3, 15);
    $sql = "SELECT a.Id_venta, a.Cantidad, e.Fecha, r.Descripcion FROM ventas as a inner JOIN factura as e inner JOIN productos as r ON e.Id_Factura = a.Id_Factura and r.Id_Producto = a.Id_Producto WHERE a.Id_Factura and a.Id_Producto AND a.estado = 1 and Cantidad LIKE '%$search%' ORDER BY Cantidad LIMIT $pagination->start_row, $pagination->max_rows";



    $query = $connection->prepare($sql);
    $query->execute();
    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }
}

if ($pagination->rowCount( "SELECT a.Id_venta, a.Cantidad, e.Fecha, r.Descripcion FROM ventas as a inner JOIN factura as e inner JOIN productos as r ON e.Id_Factura = a.Id_Factura and r.Id_Producto = a.Id_Producto WHERE a.Id_Factura and a.Id_Producto AND a.estado = 1 and Cantidad LIKE '%$search%' ORDER BY Cantidad LIKE '%$search%'")>0 || $query->rowCount($sql)>0){
    ?>

    <table  class="form-group"><tr>

        <td><form method="POST"   action="<?php echo $_SERVER["PHP_SELF"] ?>">
         <div>
            <td><input type="text" name="search" class="form-control"   placeholder="Buscar Por Cantidad" /></td>
            <td> &nbsp;<input type="submit"  value="BUSCAR" class="btn btn-primary"> &nbsp; <a href="../imprimir/imprimir-venta.php" target="_blank"  class="btn btn-success" title="Imprimir Reporte">IMPRIMIR</a></td>
        </div></td>
    </form></tr>
</table>
<div class="table-responsive">
    <table class='table table-striped table-hover  form-group responsive' >
        <tr class="success">
            <th>Id</th>
            <th>FECHA</th>
            <th>DESCRIPCI&OacuteN</th>
            <th>CANTIDAD</th>
            <th style="text-align:center;"><h3><span class="glyphicon glyphicon-cog" title="Operaciones"></span></h3></th>

            

        </tr>
        <?php
        foreach($model as $row)
        {

        //mensaje para verificar si realmente desea borrar o no

            $confirmar = "return confirm('Confirmar: &iquest;Est&aacute; Seguro Que Desea Eliminar El Registro?')";
            $url = "../consultar/ver-venta.php";
            $variables ="campo=Id_venta&valorCampo=".$row['Id_venta']."&tabla=ventas&url=".$url;

            echo "<tr>";
            echo "<td>".$row['Id_venta']."</td>";
            
            echo "<td>".$row['Fecha']."</td>";
            echo "<td>".$row['Descripcion']."</td>";
            echo "<td>".$row['Cantidad']."</td>";
            
            echo '<td width=20% style="text-align:center;">
            <a class="btn btn-success" href="../modificar/modificar-venta.php?id='.$row['Id_venta'].'" title="Editar Informaci&oacute;n"><span class="glyphicon glyphicon-pencil"></span> </a>
            <a class="btn btn-danger" href="../borrar/borrarRegistros.php?'.$variables.'" title="Borrar Registro" onclick="'.$confirmar.'"><span class="glyphicon glyphicon-remove-sign"></span> </a>
        </td>';

        
    }

}elseif(isset($_POST["search"]) && $pagination->rowCount( "SELECT a.Id_venta, a.Cantidad, e.Fecha, r.Descripcion FROM ventas as a inner JOIN factura as e inner JOIN productos as r ON e.Id_Factura = a.Id_Factura and r.Id_Producto = a.Id_Producto WHERE a.Id_Factura and a.Id_Producto AND a.estado = 1 Cantidad  LIKE '%$search%'")==0) {
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