<?php

/*
 * @author      Jairo Burgos Guarin
 * @package 	Laravel 5.4
 * @subpackage 	Functions Date
 * @date 	    28/04/2018
 */

function date_spanish($string_date) {

    if (is_numeric($string_date)) {
        $string_date = date('Y-m-d', $string_date);
    }

    $fecha = date_create($string_date);
    $meses = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $meses_short = array('', 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Novi', 'Dic');
    $dias = array('', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
    $dias_short = array('', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom');

    return array(
        'dia' => date_format($fecha, 'd'),
        'dia_text' => $dias[date_format($fecha, 'N')],
        'dia_text_short' => $dias_short[date_format($fecha, 'N')],
        'mes' => $meses[date_format($fecha, 'n')],
        'mes_short' => $meses_short[date_format($fecha, 'n')],
        'año' => date_format($fecha, 'Y'),
        'hora' => date_format($fecha, 'h:i A'),
    );
}

function date_spanish_full($string_date, $hour = FALSE, $dia_text = TRUE, $short_month = FALSE) {

    $fecha = date_spanish($string_date);
    $return = NULL;

    if ($dia_text) {
        $return = $fecha['dia_text'] . ', ';
    }

    $mes = $fecha['mes'];
    if (TRUE === $short_month) {
        $mes = character_limiter($mes, 3, '');
    }

    $return .= $fecha['dia'] . ' de ' . $mes . ' de ' . $fecha['año'];

    if (!$hour)
        return $return;

    return $return . ', ' . $fecha['hora'];
}

function date_spanish_full_hour($string_date) {
    return date_spanish_full($string_date, true);
}

function date_spanish_full_short($string_date, $hour = FALSE) {
    if (empty($string_date) || $string_date == '0000-00-00') {
        return '';
    }

    $fecha = date_spanish($string_date);
    $return = NULL;

    $return = $fecha['dia'] . ' ' . $fecha['mes_short'] . ', ' . $fecha['año'];

    if (!$hour)
        return $return;

    return $return . '. ' . $fecha['hora'];
}

function _time($hour) {
    $time = date_create($hour);
    return date_format($time, 'h:i A');
}
