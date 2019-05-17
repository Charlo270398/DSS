<?php

namespace App;

class Util
{
    function meses($num){
        switch($num){
            case '01':
                return 'Enero';
            case '02':
                return 'Febrero';
            case '03':
                return 'Marzo';
            case '04':
                return 'Mayo';
            case '05':
                return 'Abril';
            case '06':
                return 'Junio';
            case '07':
                return 'Julio';
            case '08':
                return 'Agosto';
            case '09':
                return 'Septiembre';
            case '10':
                return 'Octubre';
            case '11':
                return 'Noviembre';
            default:
                return 'Diciembre';
        }
    }
}?>