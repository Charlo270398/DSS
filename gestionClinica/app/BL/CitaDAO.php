<?php

namespace App\BL;
use App\Cita;
use App\BL\BoxDAO;
use App\BL\UserDAO;

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

    public function mostrarListaCitasMedico($idMedico){
        $citas  = Cita::where('medico_id', '=', $idMedico)->get();
        return $citas;
    }
    
    public function generarCita($dia, $hora, $idMedico){
        $b = new BoxDAO();
        $box = $b->comprobarCitasHora($dia, $hora);

        if($box == 0){ //No hay citas en esa hora
            $cita = new Cita();
            $cita->fecha = $dia . ' ' . $hora . ':00';
            $cita->box_id = $b->mostrarListaBoxes()->first()->id;//Comprobar que hay disponibles
            return $cita;
        }
        else{//Si hay citas en esa hora
            $box = $b->devolverDisponible($dia . ' ' . $hora . ':00');
            if($box == -1){//Todos los boxes ocupados
                return null;
            }else{
                $cita = new Cita();
                $cita->fecha = $dia . ' ' . $hora . ':00';
                $cita->box_id = $box;
                return $cita;
            }
        }
        
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
        $time = date('d-m-Y H:i:s');
        $time =  Date('d-m-Y H:i:s', strtotime("+2 hours",strtotime($time))); //Arreglo bug
        $startTime =  Date('d-m-Y H:i:s', strtotime("08:40:00",strtotime($time)));
        $MINUTOS_SESION = 20;
        $DIAS = 7; //Numero de días que se van a computar
        $SESIONES =  15; //3 sesiones = 1 hora
        $RESTAR_SESIONES = $SESIONES*$MINUTOS_SESION; //Minutos a restar para resetear cada día
        $diaSemana = date("l", strtotime($startTime));

        if($diaSemana == 'Friday'){
            $endTime =  Date('d-m-Y H:i:s', strtotime("13:40:00",strtotime($time)));
            if($time > $endTime){
                $startTime = Date('d-m-Y H:i:s', strtotime("+7 days",strtotime($startTime)));
            }
        }
        if($diaSemana == 'Saturday'){
            $startTime = Date('d-m-Y H:i:s', strtotime("+7 days",strtotime($startTime)));
        }
        if($diaSemana == 'Sunday'){
            $startTime = Date('d-m-Y H:i:s', strtotime("+1 days",strtotime($startTime)));
        }
        

        else{
            while($diaSemana != 'Monday'){
                $startTime = Date('d-m-Y H:i:s', strtotime("-1 days",strtotime($startTime)));
                $diaSemana = date("l", strtotime($startTime));
            }
        }
        
       
        $startTime = Date('d-m-Y H:i:s', strtotime("-1 days",strtotime($startTime)));
        $b = new BoxDAO();
        for($i=0; $i<$DIAS; $i++){
            $fechas = array();
            $fechaE = array();
            $startTime = Date('d-m-Y H:i:s', strtotime("+1 days",strtotime($startTime)));
            $diaSemana = date("l", strtotime($startTime));
            $mes = date("m",strtotime($startTime));
            $dia = date("d",strtotime($startTime));
            for($j=0; $j<$SESIONES; $j++){
                $startTime = Date('d-m-Y H:i:s', strtotime("+$MINUTOS_SESION minutes",strtotime($startTime)));
                if($startTime > $time && $this->disponible($idM, $startTime) && $b->devolverDisponible($startTime) != -1){
                    array_push($fechaE, Date('d-m-Y',strtotime($startTime)));
                    array_push($fechas, Date("H:i",strtotime($startTime)));          
                }
                else if($startTime > $time && !$this->disponible($idM, $startTime)){
                    array_push($fechas, 'Hora ocupada');
                    array_push($fechaE, -1);
                }
                else if($b->devolverDisponible($startTime) == -1){
                    array_push($fechas, 'Boxes ocupados');
                    array_push($fechaE, -1);
                }
                else{
                    array_push($fechas, '--:--');
                    array_push($fechaE, -1);
                }
            }
            if($diaSemana != 'Saturday' && $diaSemana != 'Sunday'){
                array_push($dias, [$this->traducirD($diaSemana) . " $dia de " . $this->traducirM($mes) . ' de ' . Date("Y",strtotime($startTime)), $fechas, $fechaE]);
            }
            $startTime = Date('d-m-Y H:i:s', strtotime("-$RESTAR_SESIONES minutes",strtotime($startTime)));
        }  
        
        return $dias;
    }

    //AUXILIAR MOSTRAR HORARIO
    public function disponible($idM, $hora){
        //$hora = substr($hora,0,2) . '-' . (substr($hora,3,2)) . '-' . substr($hora,6,4) . ' ' . substr($hora,11,5) . ':00';
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

    public function nombresCitas($citas, $medico ){//Si medico es true busca los nombres de medicos, si falso busca los de pacientes

        $dev = array();
        $u = new UserDAO();
        foreach ($citas as $c){
            if($medico){
                array_push($dev, $u->mostrarUsuario($c->medico_id));
            }else{
                array_push($dev, $u->mostrarUsuario($c->paciente_id));
            }
        }
        return $dev;

    }
}
?>




