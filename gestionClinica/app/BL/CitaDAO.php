<?php

namespace App\BL;
use App\Cita;

class CitaDAO
{
    public function mostrarCita($id) {
        $cita  = Cita::findOrFail($id);
        return $cita;
    }

    public function mostrarListaCitas() {
        $citas  = Cita::all();
        return $citas;
    }

    public function actualizarCita($cita){
        try{
            $cita->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function addCita($cita){
        try{
            $cita->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function borrarCita($id){
        try{
            $cita = $this->mostrarCita($id);
            $cita->delete();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function mostrarHorario($idM){

        $dias = array();
        $fechas = array();
        $time = date('Y-m-d H:i:s');
        $startTime =  Date('Y-m-d H:i:s', strtotime("08:40:00",strtotime($time)));
        $MINUTOS_SESION = 20;
        $DIAS = 14; //Numero de días que se van a computar
        $SESIONES =  15; //3 sesiones = 1 hora
        $RESTAR_SESIONES = $SESIONES*$MINUTOS_SESION; //Minutos a restar para resetear cada día
        
        for($i=0; $i<$DIAS; $i++){
            $fechas = array();
            $fechaE = array();
            $startTime = Date('Y-m-d H:i:s', strtotime("+1 days",strtotime($startTime)));
            $diaSemana = date("l", strtotime($startTime));
            $mes = date("m",strtotime($startTime));
            $dia = date("d",strtotime($startTime));
            for($j=0; $j<$SESIONES; $j++){
                $startTime = Date('Y-m-d H:i:s', strtotime("+$MINUTOS_SESION minutes",strtotime($startTime)));
                if($startTime > $time && $this->disponible($idM, $startTime)){
                    array_push($fechaE, Date('Y-m-d H:i:s',strtotime($startTime)));
                    array_push($fechas, Date("H:i",strtotime($startTime)));
                }
                else{
                    array_push($fechas, '--:--');
                    array_push($fechaE, -1);
                }
            }
            if($diaSemana != 'Saturday' && $diaSemana != 'Sunday'){
                array_push($dias, [$this->traducirD($diaSemana) . " $dia de " . $this->traducirM($mes) . ' de ' . Date("Y",strtotime($startTime)), $fechas, $fechaE]);
            }
            $startTime = Date('Y-m-d H:i:s', strtotime("-$RESTAR_SESIONES minutes",strtotime($startTime)));
        }  
        
        return $dias;
    }

    //AUXILIAR MOSTRAR HORARIO
    public function disponible($idM, $hora){

        $idM = 3;//ID DE PRUEBA HASTA QUE SE IMPLEMENTE
        $cita = Cita::where('medico_id', '=', $idM)->where('fecha', '=', $hora)->first();
        
        if($cita == null){
           return true; 
        }
        return false;

    }

    //AUXILIAR MOSTRAR HORARIO
    public function traducirD($dia){
        if($dia == 'Monday'){
            return 'Lunes';
        }
        if($dia == 'Tuesday'){
            return 'Martes';
        }
        if($dia == 'Wednesday'){
            return 'Miércoles';
        }
        if($dia == 'Thursday'){
            return 'Jueves';
        }
        if($dia == 'Friday'){
            return 'Viernes';
        }
        return $dia;
    }
    //AUXILIAR MOSTRAR HORARIO
    public function traducirM($mes){
        $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'); 
        return $meses[$mes-1];
    }

    
}
?>




