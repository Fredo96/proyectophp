<?php
//para los caracteres especiales del idioma
@header("Content-Type: text/html;charset=iso-8859-1");

require('fpdf/fpdf.php');

	//para iniciar sesi�n
	session_start();

	//incluye el archivo conectar
	include('../include/conectar.php');

	//creamos un objeto instanciando la clase Conexion
	$bd = new Conexion();

	//validar a sesi�n
	$bd->validarUsuario($_SESSION['validacion']);


class PDF extends FPDF
{
    var $widths;
    var $aligns;

// Asignar el arreglo de anchos de columna
function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

//Asignar el arreglo de alineaciones de columna
function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}


function Row($data)
{
	//Calcular el alto de la fila
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Emitir un salto de p�gina primero si es necesario
	$this->CheckPageBreak($h);
	//Dibujar las celdas de la fila
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		//Guardar la posici�n actual
		$x=$this->GetX();
		$y=$this->GetY();

		//Dibujar el borde
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');

		//Colocar la posici�n a la derecha de la celda
		$this->SetXY($x+$w,$y);
	}

	//Dar un salto de linea
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//Si la altura h provocar�a un desbordamiento, a�adir una nueva p�gina inmediatamente
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}


function NbLines($w,$txt)
{
	//Calcula el n�mero de l�neas de un MultiCell de ancho que w tomar�
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

//Encabezado
function Header()
{
        //Colocar una imagen se coloca la ruta de la imagen, posici�n en X, posici�n en Y y el tama�o de la imagen
        $this->Image('../img/logo-mini.jpeg',20,6,50);

        $this->Ln(10);

}

//pie
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-25	);

	#datos del pie
	$this->SetFont('helvetica','B',10);
	$this->SetFont('helvetica','I',10);
	$this->Cell(0,5, 'ITCA-FEPADE Zacatecoluca',0,1);

	// helvetica
	$this->SetFont('helvetica','I',7);
	// N�mero de p�gina
	$this->Cell(0,3,utf8_decode('Sistema Desarrollado Por Jose Alfredo Alvarado Para ITCA-FEPADE MEGATEC Zacatecoluca | Página ').$this->PageNo(),0,0,'R');
}

}

    //consulta para el encabezado del reporte

	$sql = $bd->query("SELECT e.Id_Factura, e.Fecha, r.Nombre FROM clientes as r inner JOIN factura as e ON e.Id_cliente=r.Id_Cliente WHERE r.Id_Cliente AND e.estado = 1");

	$row = $bd->recorrer($sql);

        //se usa la clase PDF para crear un nuevo archivo pdf
        //si quieren la p�gina en vertical en lugar de 'L'
        //colocan 'P'

	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(10);

    //tipo de letra
    $pdf->SetFont('helvetica','B',10);

    #color de relleno de las row
    $pdf->SetFillColor(193,226,179);


    //Colocar los anchos de las columnas de la tabla, podemos hacerlas m�s anchas jugando con los n�meros
	$pdf->SetWidths(array(50, 50, 50, 30));

    //letras helvetica, negrita, tama�o 10
	$pdf->SetFont('helvetica','B',10);

    #color para los encabezados de la tabla
	$pdf->SetFillColor(193,226,179);

	$pdf->Row(array('USUARIOS'));

    //Encabezados de la tabla
	for($i=0;$i<1;$i++)
	{
		//ENCABEZADOS DE LA TABLA
		$pdf->Row(array('FECHA', 'CLIENTE'));
	}
	#color blanco para el cuerpo de la tabla
	$pdf->SetFillColor(255);
    try {
			$sql = $bd->query("SELECT e.Id_Factura, e.Fecha, r.Nombre FROM clientes as r inner JOIN factura as e ON e.Id_cliente=r.Id_Cliente WHERE r.Id_Cliente AND e.estado = 1");

			if ($bd->rows($sql) > 0) {

				while ($row = $bd->recorrer($sql)) {

					$pdf->SetFont('helvetica','',9);


						$pdf->SetFillColor(255);
		                $pdf->Row(array($row['Fecha'], $row['Nombre']));
				}
			} else {
				echo '<div class="alert alert-info" role="alert"><strong>&iexcl;Vaya!</strong> No Hay Datos Registrados...</div>';
			}
		} catch (Exception $e) {
			echo '<div class="alert alert-info" role="alert"><strong>&iexcl;Vaya!</strong> No Hay Datos Registrados...</div>';
		}




//mostramos el archivo generado
$pdf->Output();

?>
