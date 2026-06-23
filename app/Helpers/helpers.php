<?php
use Illuminate\Support\Str;
function generarFolio($nombre, $apellido_paterno, $apellido_materno, $peticion, $fecha) {
    // Obtener las iniciales del nombre y apellidos
    $iniciales = strtoupper(substr($nombre, 0, 1) . substr($apellido_paterno, 0, 1) . substr($apellido_materno, 0, 1));
    
    // Obtener las primeras tres letras de la petición
    $peticion_corta = strtoupper(substr($peticion, 0, 3));
    
    // Formatear la fecha (asumiendo que está en formato YYYY-MM-DD)
    $fecha_formateada = date('Ymd', strtotime($fecha));
    
    // Generar un número aleatorio de 4 dígitos
    $numero_aleatorio = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
    
    // Combinar todos los elementos para crear el folio
    $folio = $iniciales . '-' . $peticion_corta . '-' . $fecha_formateada . '-' . $numero_aleatorio;
    
    return $folio;
}

function generarFecha($fecha){
    $s = $fecha->format('N');
    $diaSemana = ($s == '1' ? 'Lunes' : 
                 ($s == '2' ? 'Martes' :
                 ($s == '3' ? 'Miércoles' :
                 ($s == '4' ? 'Jueves' :
                 ($s == '5' ? 'Viernes' :
                 ($s == '6' ? 'Sábado' :
                 ($s == '7' ? 'Domingo' :
                 ('?'))))))));

    $m = $fecha->format('m');
    $nomMes = ($m == '1' ? 'enero' : 
                  ($m == '2' ? 'febrero' :
                  ($m == '3' ? 'marzo' :
                  ($m == '4' ? 'abril' :
                  ($m == '5' ? 'mayo' :
                  ($m == '6' ? 'junio' :
                  ($m == '7' ? 'julio' :
                  ($m == '8' ? 'agosto' :
                  ($m == '9' ? 'septiembre' :
                  ($m == '10' ? 'octubre' :
                  ($m == '11' ? 'noviembre' :
                  ($m == '12' ? 'diciembre' :
                  ('?')))))))))))));

    $noDia = $fecha->format('d');
    $anio = $fecha->format('Y');

    $formattedDate = $diaSemana . ' ' . $noDia . ' de ' . $nomMes . ' del ' . $anio;

    return $formattedDate;
}

function generarHora($hora){
    $am_pm = $hora->format('A');
    $time = $hora->format('g:i');

    $formattedTime = $time . ' ' . $am_pm; 

    return $formattedTime;
}

function generarNombre($nombre, $ap_paterno, $ap_materno){
    $completo = $nombre . ' ' . $ap_paterno . ' ' . $ap_materno;
    $nomCompleto = Str::limit($completo, 20);

    return $nomCompleto;
}

function generarName($nombre){
    $nomCompleto = Str::limit($nombre, 23);

    return $nomCompleto;
}

function generarNombre2($nombre, $ap_paterno, $ap_materno){
    $completo = $nombre . ' ' . $ap_paterno . ' ' . $ap_materno;
    $nomCompleto = Str::limit($completo, 30);

    return $nomCompleto;
}

function obtenerIniciales($nombre) {
    $iniciales = '';
    $palabras = explode(' ', $nombre);
    
    foreach ($palabras as $palabra) {
        $iniciales .= strtolower(substr($palabra, 0, 1));
    }

    return $iniciales;
}