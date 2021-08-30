<?php
@session_start();
/*enable this for development purpose */
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
date_default_timezone_set(@date_default_timezone_get());
define('PDOCrudABSPATH', dirname(__FILE__) . '/');
require_once PDOCrudABSPATH . "config/config.php";
spl_autoload_register('pdocrudAutoLoad');

function pdocrudAutoLoad($class) {
    if (file_exists(PDOCrudABSPATH . "classes/" . $class . ".php"))
        require_once PDOCrudABSPATH . "classes/" . $class . ".php";
}

if (isset($_REQUEST["pdocrud_instance"])) {
    $fomplusajax = new PDOCrudAjaxCtrl();
    $fomplusajax->handleRequest();
}

function check_user_insert($data, $obj){
    $name = $data['users']['name'];
    $email = $data['users']['email'];

    $pdomodel = $obj->getPDOModelObj();
    $table = $pdomodel->select("users");

    foreach($table as $result) {
        if(ucwords($name) == $result['name'] || $name == $result['name']){
            echo "<script>swal('!Lo siento','El nombre ingresado ya existe, ingrese otro diferente','error')
            $('.data').load(location.href+' .data','');
            </script>";
            die();
        } else if(ucwords($email) == $result['email'] || $email == $result['email']){
            echo "<script>swal('!Lo siento','El email ingresado ya existe, ingrese otro diferente','error')
            $('.data').load(location.href+' .data','');
            </script>";
            die();
        } else {
            $password_hash = password_hash($data["users"]["password"], PASSWORD_DEFAULT);
            $data["users"]["password"] = $password_hash;
            echo "<script>swal('!Genial','Datos guardados con éxito','success')</script>";
        }

        if(empty($nombre)){
            echo "<script>swal('!Lo siento','El nombre esta vacio','error')
            $('.data').load(location.href+' .data','');
            </script>";
            die();
        }
    }
    return $data;
}

function check_user_update($data, $obj){
    $password_hash = password_hash($data["users"]["password"], PASSWORD_DEFAULT);
    $data["users"]["password"] = $password_hash;
    echo "<script>swal('!Genial','Datos Actualizados con éxito','success')</script>";
    return $data;
}

function check_user_delete($data, $obj){
    echo "<script>swal('!Genial','Datos Eliminados con éxito','success')</script>";
    return $data;
}

function profile_update($data, $obj){
    echo "<script>swal('!Genial','Datos Guardados con éxito','success')</script>";
    return $data;
}