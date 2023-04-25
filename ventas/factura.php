<?php

require_once ('../app/TCPDF-main/tcpdf.php');
include ("../app/config.php");
include ("../app/controllers/ventas/convertir_monto.php");
include('../layout/sesion.php'); 

$id_venta_get = $_GET['id_venta'];
$nro_venta_get = $_GET['nro_venta'];

$sql_ventas = "SELECT *, cli.nombre_cliente as nombre_cliente ,cli.nit_ci_cliente as nit_ci_cliente
FROM tb_ventas as ve INNER JOIN tb_clientes as cli ON cli.id_cliente = ve.id_cliente WHERE ve.id_venta ='$id_venta_get'";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

foreach ($ventas_datos as $venta_dato) {

    $fyh_creacion = $venta_dato['fyh_creacion'];
    $nit_ci_cliente = $venta_dato['nit_ci_cliente'];
    $nombre_cliente = $venta_dato['nombre_cliente'];
    $total_pagado= $venta_dato['total_pagado'];
}


//Convierte fecha a formato español
$fecha = date("d/m/Y", strtotime($fyh_creacion));

//Convierte el monto a letras

$monto_convertido=numtoletras($total_pagado);

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215, 279), true, 'UTF-8', false);

// set document information

$pdf->SetCreator(PDF_CREATOR);

$pdf->SetAuthor('Adama SOFT');

$pdf->SetTitle('Factura de Venta');

$pdf->SetSubject('Factura de Venta');

$pdf->SetKeywords('Factura de Venta');

//remove default header/footer

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins

$pdf->SetMargins(15, 15, 15);

//set auto page breaks

$pdf->SetAutoPageBreak(TRUE, 5);

//set image scale factor

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings

if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {

    require_once(dirname(__FILE__) . '/lang/eng.php');

    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font

$pdf->SetFont('helvetica', '', 10);

// add a page

$pdf->AddPage();



//create some HTML content

$html = '
<table border="0" style="font-size:10px">
    <tr>
        <td style="text-align: center ; width:230px">
        <img src="../public/images/gatoum.jpg" width="80px" alt=""><br><br>
        <b>SISTEMA DE VENTAS</b> <br>
        Av.San Borja Sur 123 <br>
        Lima - Perú <br>
        Teléfono: 123456789 
        </td>
        <td style="width:150px"></td>
        <td style="font-size: 16px ; width:290px"><br><br><br>
            <b>RUC: 4611111113213</b><br>
            <b>Nro Factura :</b>' . $id_venta_get . '<br>
            <p style="text-align:center"><B>ORIGINAL</B></p>
        </td>
    </tr>
</table>
<p style="text-align:center;font-size:25px"><b>FACTURA</b></p>

<div style="border:1px solid #000000">
<table border="0" cellpadding="6px">
    <tr>
        <td> <b>Fecha :</b> ' . $fecha . ' </td>
        <td></td>
        <td> <b>RUC :</b> ' . $nit_ci_cliente . ' </td>
    </tr>
     <tr>
        <td colspan="3"> <b>Cliente: </b> ' . $nombre_cliente . ' </td>
    </tr>
</table>
</div>
<br>
<table border="1" cellpadding="5" style="font-size:10px">
<tr style="text-align:center;background-color:#d6d6d6">
    <th style="width:40px"><b>Nro</b></th>
    <th style="width:150px"><b>Producto</b></th>
    <th style="width:239px"><b>Descripcion</b></th>
    <th style="width:61px"><b>Cantidad</b></th>
    <th style="width:95px"><b>Precio Unitario</b></th>
    <th style="width:70px"><b>Sub Total</b></th>
</tr>
';

$contador_carrito = 0;
$cantidad_total = 0;
$precio_unitario_total = 0;
$precio_total = 0;

$sql_carrito = "SELECT * , pro.nombre as nombre_producto, pro.descripcion as descripcion , pro.precio_venta as precio_venta , pro.stock as stock , 
pro.id_producto as id_producto 
FROM tb_carrito as carr
INNER JOIN tb_almacen as pro ON carr.id_producto = pro.id_producto
WHERE nro_venta = '$nro_venta_get' ORDER BY id_carrito ASC";
$query_carrito = $pdo->prepare($sql_carrito);
$query_carrito->execute();
$carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

foreach ($carrito_datos as $carrito_dato) {

    $id_carrito = $carrito_dato['id_carrito'];
    $contador_carrito = $contador_carrito + 1;
    $cantidad_total = $cantidad_total + $carrito_dato['cantidad'];
    $precio_unitario_total = $precio_unitario_total + floatval($carrito_dato['precio_venta']);
    $subtotal = $carrito_dato['cantidad'] * $carrito_dato['precio_venta'];
    $precio_total = $precio_total + $subtotal;

    $html .= '
<tr>
    <td style="text-align:center">' . $contador_carrito . '</td>
    <td style="text-align:center">' . $carrito_dato['nombre_producto'] . '</td>
    <td style="text-align:center">' . $carrito_dato['descripcion'] . '</td>
    <td style="text-align:center">' . $carrito_dato['cantidad'] . '</td>
    <td style="text-align:center">' . $carrito_dato['precio_venta'] . '</td>
    <td style="text-align:center">' . $subtotal . '</td>
</tr>
    ';
}
$html .= '

<tr>
    <td colspan="3" style="text-align:right ;background-color:#d6d6d6"><b>Total</b></td>
    <td style="text-align:center;background-color:#d6d6d6">' . $cantidad_total . '</td>
    <td style="text-align:center;background-color:#d6d6d6">S/.' . $precio_unitario_total . '</td>
    <td style="text-align:center;background-color:#d6d6d6">S/.' . $precio_total . '</td>

</tr>
</table>

<p style="text-align:right">
<b>Importe Total :</b> S/.' . $precio_total . '
</p>
<p>
<b>SON :</b> ' . $monto_convertido . '
</p>
<br>
--------------------------------------------------------------------------------<br>
<b>Usuario :</b> '. $nombres_sesion.' <br>

<p style="text-align:center;font-size:12px"><b>Gracias por su compra</b></p>

';

// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');

$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1, // height of a single module in points
);

$QR = ' Factura Realizada por el sistema de ventas , al cliente : ' . $nombre_cliente . ' 
, con fecha : ' . $fecha . ' , con el monto total de : ' . $precio_total . ' Soles , con el numero de factura : ' . $id_venta_get . '';

$pdf->write2DBarcode($QR, 'QRCODE,L', 170, 200, 45, 45, $style);

// ---------------------------------------------------------

//Close and output PDF document

$pdf->Output('Factura.pdf', 'I');

//============================================================+

// END OF FILE

//============================================================+