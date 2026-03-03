<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../app/TCPDF-main/tcpdf.php');
include('../app/config.php');
include('../layout/sesion.php');

// Convierte numero a letras
require '../vendor/autoload.php'; // Línea no necesaria si se usa frameworks como Laravel
use Luecano\NumeroALetras\NumeroALetras;

$id_venta_get = $_GET['id_venta'];
$nro_venta_get = $_GET['nro_venta'];

$sql_ventas="SELECT *, cli.nombre_cliente as nombre_cliente , cli.nit_ci_cliente as nit_ci_cliente, ve.nro_venta as venta
                    FROM tb_ventas as ve  
                    INNER JOIN tb_clientes as cli ON  cli.id_cliente = ve.id_cliente WHERE ve.id_venta = '$id_venta_get'
                    ORDER BY venta ASC"; 


$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

foreach($ventas_datos as $ventas_dato){
    $fyh_creaccion = $ventas_dato['fyh_creacion'];
    $nit_ci_cliente = $ventas_dato['nit_ci_cliente'];
    $nombre_cliente = $ventas_dato['nombre_cliente'];
    $total_pagado = $ventas_dato['total_pagado'];
}
$fecha = date("d/m/Y", strtotime($fyh_creaccion));


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT,  array(210,290), true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sistema de Ventas');
$pdf->SetTitle('Factura 001');
$pdf->SetSubject('Factura de venta');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(false);
$pdf->setFooterData(false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(15,15, 15);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = '
<table border="0">
<tr>
<td style="text-align:center;font-size: 20px;"><b>Sistema de Ventas</b></td>
<td></td>
<td></td>
</tr>
<tr>
<td style="text-align:center;font-size: 10px;">Combate de las Piedras N°2312</td>
<td></td>
<td style="font-size: 10px;"><b>Cuil:</b> 33-4454454445-1</td>

</tr>
<tr>
<td style="text-align:center;font-size: 10px;">Tel. 4233343 Cel. 381778877</td>
<td></td>
<td style="font-size: 10px;"><b>Factura Nro:</b>'.$id_venta_get.'</td>
</tr>
<tr>
<td style="text-align:center;font-size: 10px;">Yerba Buena / Tucumán / Argentina</td>
<td></td>
<td style="font-size: 10px;"><b>CAE:</b> 3332322234</td>
</tr>
</table>
<p style="text-align:center; font-size:25px;"><b>FACTURA</b></p>

<div style="border:1px solid #000000;font-size:12px;">
<table border="0" cellpadding="6px;">
<tr>
<td><b>Fecha:</b>'.$fecha.'</td>
<td></td>
<td></td>
</tr>
<tr>
<td><b>CUIT: </b>'.$nit_ci_cliente.'</td>
<td></td>
<td></td>
</tr>
<tr>
<td colspan="3" style="font-size:12px";><b>Señor(es):</b> '.$nombre_cliente.'</td>
</tr>
</table>
</div>
<br>

<table border="1" cellpadding="5" style="font-size:10">
<tr style="text-align:center; background-color:#d6d6d6">
<th style="width:40px;">Nro</th>
<th style="width:150px;">Producto</th>
<th style="width:190px;">Descripcion</th>
<th style="width:68px;">Cantidad</th>
<th style="width:110px;">Precio Unitario</th>
<th style="width:75px;">Sub Total</th>
</tr>
';

$contador_de_carrito = 0;
$cantidad_total = 0;
$precio_unitario_total = 0;
$precio_total = 0;



$formatter = new NumeroALetras();
$formatter->conector = 'Y';
$numeroaletras = $formatter->toMoney($total_pagado);

$sql_carrito="SELECT *, 
    pro.nombre as nombre_producto, 
    pro.descripcion as descripcion, 
    pro.precio_venta as precio_venta,
    pro.stock as stock,
    pro.id_producto as id_producto 
    FROM tb_carrito as carr 
    INNER JOIN tb_almacen as pro ON carr.id_producto = pro.id_producto WHERE nro_venta = '$nro_venta_get'
    ORDER BY id_carrito ASC";
    $query_carrito = $pdo->prepare($sql_carrito);
    $query_carrito->execute();
    $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC); 
    foreach($carrito_datos as $carrito_dato){
        $id_carrito = $carrito_dato['id_carrito'];
        $contador_de_carrito = $contador_de_carrito +1;
        $cantidad_total = $cantidad_total + $carrito_dato['cantidad'];
        $precio_unitario_total = $precio_unitario_total + floatval($carrito_dato['precio_venta']);
        $subtotal = $carrito_dato['cantidad'] * $carrito_dato['precio_venta'];
        $precio_total = $precio_total + $subtotal;

        $html.='
        <tr>
        <td style="text-align:center">'.$contador_de_carrito.'</td>
        <td>'.$carrito_dato['nombre_producto'].'</td>
        <td>'.$carrito_dato['descripcion'].'</td>
        <td style="text-align:center">'.$carrito_dato['cantidad'].'</td>
        <td style="text-align:center"> $'.$carrito_dato['precio_venta'].'</td>
        <td style="text-align:center"> $'.$subtotal.'</td>
        </tr>
        ';
        }       

$html .='
<tr>
<td colspan="3" style="text-align:right; background-color:#d6d6d6"><b>Total</b></td>
<td style="text-align:center; background-color:#d6d6d6">'.$cantidad_total.'</td>
<td style="text-align:center; background-color:#d6d6d6">$ '.$precio_unitario_total.'</td>
<td style="text-align:center; background-color:#d6d6d6">$ '.$precio_total.'</td>


</tr>
</table>
<p style="text-align:right;">
<b>Monto Total:</b> $ '.$precio_total.'</p>
<p><b>Pesos:</b> '.$numeroaletras .'</p>
<br>
----------------------------------------------------------------------------------------------------------</br>
<b>Usuario:</b>' .$nombre_session. '<br><br>
<p style="text-align:center">
</p>
<p style="text-align:center">"Esta es una factura Chota"
</p>
<p style="text-align:center"><b>"Gracias por su compra!!!!"</b>
</p>
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);



// set style for barcode
$style = array(
	'border' => 0,
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255)
	'module_width' => 1, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);

// QRCODE,Q : QR-CODE Better error correction
$pdf->write2DBarcode('Factura realizada por el sistema de ventas al cliente '.$nombre_cliente.' con el cuil '.$nit_ci_cliente.
' en fecha '.$fecha.' con el monto de '.$precio_total.' .', 
'QRCODE,Q', 170, 240, 190, 30, $style, 'N');
// $pdf->Text(20, 145, 'La URA');


// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+