<?php

require 'vendor/autoload.php'; // Esto carga el autoloader generado por Composer

use Typhp\String\Stringify;
use Typhp\Array\Slide;
 /*
$string = new Stringify("Hola mundo, como estas");

$data = $string->split(","); */



$data = new Slide([1, 2, 3, 4, 5, 6, 7]);

/* $data = $data->map(function($element){
    return $element + 1;
}); */
$data->forEach(function($element){
    echo "Este es el numero : ".$element."\n";
});

$data = $data->some(function($element){
    return $element > 10;
});
echo "esto es el some";
var_dump($data);

$data = $data->find(function($element){
    return $element > 3;
});
echo "esto es el find: ";
var_dump($data);

    
/* $data = $data->filter(function($element){
    return $element == 3 || $element == 7;
});

var_dump($data); */

