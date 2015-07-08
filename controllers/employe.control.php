<?php

  require_once("libs/template_engine.php");

  require_once("models/empleados.model.php");

  function run(){


    $DatosEmpleado = array();
    $DatosEmpleado["employeTitle"] = "";
      $DatosEmpleado["employeMode"] = "";
      $DatosEmpleado["IdEmp"] = "";
      $DatosEmpleado["NomEmp"]="";
      $DatosEmpleado["ApEmp"]="";
      $DatosEmpleado["SexEmp"]="";
      $DatosEmpleado["actSelected"]="selected";
      $DatosEmpleado["inaSelected"]="";
      $DatosEmpleado["disabled"]="";

    if(isset($_GET["acc"])){
      switch($_GET["acc"]){

        case "ins":
            $DatosEmpleado["employeTitle"] = "Ingreso de Nuevo empleado";
            $DatosEmpleado["employeMode"] = "ins";

          if(isset($_POST["btnacc"])){
            $lastID = insertarEmpleado($_POST);
            if($lastID){
              redirectWithMessage("¡Categoría Ingresada!","index.php?page=employe&acc=upd&IdEmp=".$lastID);
            }else{
                $DatosEmpleado["IdEmp"] = $_POST["IdEmp"];
                $DatosEmpleado["NomEmp"]=$_POST["NomEmp"];
                $DatosEmpleado["ApEmp"]=$_POST["ApEmp"];
                $DatosEmpleado["SexEmp"]=$_POST["SexEmp"];
                $DatosEmpleado["actSelected"]=($_POST["SexEmp"] =="M")?"selected":"";
                $DatosEmpleado["inaSelected"]=($_POST["SexEmp"] =="F")?"selected":"";
            }
          }

          renderizar("employe",   $DatosEmpleado);
          break;

        case "upd":
          if(isset($_POST["btnacc"])){

            if(actualizarEmpleado($_POST)){

              redirectWithMessage("¡Categoría Actualizada!","index.php?page=employe&acc=upd&IdEmp=".$_POST["IdEmp"]);
            }
          }
          if(isset($_GET["IdEmp"])){
            $empleado = obtenerEmpleado($_GET["IdEmp"]);
            if($empleado){
                $DatosEmpleado["employeTitle"] = "Actualizar ".$empleado["NomEmp"];
                $DatosEmpleado["employeMode"] = "upd";
                $DatosEmpleado["IdEmp"] = $empleado["IdEmp"];
                $DatosEmpleado["NomEmp"]=$empleado["NomEmp"];
                $DatosEmpleado["ApEmp"]=$empleado["ApEmp"];
                $DatosEmpleado["SexEmp"]=$empleado["SexEmp"];
                $DatosEmpleado["actSelected"]=($empleado["SexEmp"] =="M")?"selected":"";
                $DatosEmpleado["inaSelected"]=($empleado["SexEmp"] =="F")?"selected":"";
              renderizar("employe",   $DatosEmpleado);
            }else{
              redirectWithMessage("¡Categoría No Encontrada!","index.php?page=empleados");
            }
          }else{
            redirectWithMessage("¡Categoría No Encontrada!","index.php?page=empleados");
          }
          break;

        case "dlt":
        if(isset($_POST["btnacc"])){

          if(borrarEmpleado($_POST["IdEmp"])){

            redirectWithMessage("¡Categoría Borrada!","index.php?page=empleados");
          }
        }
          if(isset($_GET["IdEmp"])){
            $empleado = obtenerEmpleado($_GET["IdEmp"]);
            if($empleado){
              $DatosEmpleado["employeTitle"] = "¿Desea borrar ".$empleado["NomEmp"] . "?";
                $DatosEmpleado["employeMode"] = "dlt";
              $DatosEmpleado["IdEmp"] = $empleado["IdEmp"];
              $DatosEmpleado["NomEmp"]=$empleado["NomEmp"];
              $DatosEmpleado["ApEmp"]=$empleado["ApEmp"];
              $DatosEmpleado["SexEmp"]=$empleado["SexEmp"];
                $DatosEmpleado["actSelected"]=($empleado["SexEmp"] =="M")?"selected":"";
              $DatosEmpleado["inaSelected"]=($empleado["SexEmp"] =="F")?"selected":"";
              $DatosEmpleado["disabled"]='disabled="disabled"';
              renderizar("employe",   $DatosEmpleado);
            }else{
              redirectWithMessage("¡Categoría No Encontrada!","index.php?page=empleados");
            }
          }else{
            redirectWithMessage("¡Categoría No Encontrada!","index.php?page=empleados");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=empleados");
          break;
      }
    }


  }

  run();
?>
