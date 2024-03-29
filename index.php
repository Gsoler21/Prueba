<?php

    session_start();

    require_once("libs/utilities.php");

    $pageRequest = "home";

    if(isset($_GET["page"])){
        $pageRequest = $_GET["page"];
    }

    //Incorporando los midlewares son codigos que se deben ejecutar
    //Siempre
    require_once("controllers/site.mw.php");
    require_once("controllers/verificar.mw.php");

    //Este switch se encarga de todo el enrutamiento

    switch($pageRequest){
        case "home":
            //llamar al controlador
            require_once("controllers/home.control.php");
            break;

        case "categorias":
            //llamar al controlador
            require_once("controllers/categorias.control.php");
            break;
        case "category":
            require_once("controllers/category.control.php");
            break;
        case "empleados":
            //llamar al controlador
            require_once("controllers/empleados.control.php");
            break;
        case "employe":
            require_once("controllers/employe.control.php");
            break;
        case "login":
            require_once("controllers/login.control.php");
            break;
        case "registro":
            require_once("controllers/registro.control.php");
            break;
        //para agregar una nueva pagina
        // agregar otro case
        default:
            require_once("controllers/error.control.php");

    }


?>
