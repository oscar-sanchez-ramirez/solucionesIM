<?php
function fecha_formato_humano($fecha = "")
{
  if ($fecha == "")
    return false;

  $arr_fechafull = explode(" ", $fecha);

  $arr_fecha = explode("-", $arr_fechafull[0]);

  $arr_dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
  $arr_meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

  return $arr_fecha[2] . " de " . $arr_meses[$arr_fecha[1] - 1] . " del " . $arr_fecha[0];
}


function vencer($fecha = ""){
  if ($fecha == "")
  return false;

  $vencimiento =  date("Y-m-d",strtotime($fecha."+ 10 days"));

  return $vencimiento;
}
