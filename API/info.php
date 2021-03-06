<?php 
// ?DATABASE CONNECTION
include('../database/dbconn.php');
// ?CLASS
include('../class/BMI.php');
$_bmi = new BMI($pdo);

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json;charset=UTF-8');
header('Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE');
header('Access-Control-Max-Age:3600');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With');


$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

if($_SERVER['REQUEST_METHOD']=='GET'){
    
    $data = $_bmi->readAll();
    echo json_encode($data);

}elseif($_SERVER['REQUEST_METHOD']=='POST'){

    $data = json_decode(file_get_contents('php://input'),true);
    echo json_encode($_bmi->create($data));

}

?>