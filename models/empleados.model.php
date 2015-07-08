<?php

require_once("libs/dao.php");

function obtenerEmpleados(){
    $empleados = array();
    $sqlstr = "select * from Empleados;";
    $empleados = obtenerRegistros($sqlstr);
    return $empleados;
}


function obtenerEmpleado($empleadoID){
  $empleado = array();
  $sqlstr = "select * from Empleados where IdEmp = %d;";
  $sqlstr = sprintf($sqlstr, $empleadoID);
  $empleado = obtenerUnRegistro($sqlstr);
  return $empleado;
}

function insertarEmpleado($empleado){
    if($empleado && is_array($empleado)){
       $sqlInsert = "Insert into Empleados(`NomEmp`,`ApEmp`,`SexEmp`)VALUES('%s','%s','%s');";
       $sqlInsert = sprintf($sqlInsert,
                      valstr($empleado["NomEmp"]),
                      valstr($empleado["ApEmp"]),
                      valstr($empleado["SexEmp"])
                    );
       if(ejecutarNonQuery($sqlInsert)){
         return getLastInserId();
       }
    }
    return false;
  }

  function actualizarEmpleado($empleado){
    if($empleado && is_array($empleado)){
      $sqlUpdate = "update Empleados set NomEmp='%s', ApEmp='%s', SexEmp='%s' where IdEmp=%d;";
      $sqlUpdate = sprintf($sqlUpdate,
                    valstr($empleado["NomEmp"]),
                    valstr($empleado["ApEmp"]),
                    valstr($empleado["SexEmp"]),
                    valstr($empleado["IdEmp"])
                  );
      return ejecutarNonQuery($sqlUpdate);
    }
    return false;
  }

  function borrarEmpleado($empleadoID){
    if($empleadoID){
      $sqlDelete = "delete from Empleados where IdEmp=%d;";
      $sqlDelete = sprintf($sqlDelete,
                    valstr($empleadoID)
                  );
      return ejecutarNonQuery($sqlDelete);
    }
    return false;
  }


?>
