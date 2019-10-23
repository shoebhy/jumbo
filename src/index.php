<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//load all the classes
function load($folders){
    foreach ($folders as $folder) {
        foreach (scandir($folder) as $file) {
            if ((substr( $file, 0, 2 ) !== '._') && preg_match( "/.php$/i" , $file )) {
                require_once($folder . '/' . $file);
            } else if ($file != '.' && $file != '..') {
                load([$folder . '/' . $file]);
            }
        }
    }
}
load(['Controller', 'Database', 'Object']);

//get the API data
//echo($_SERVER['REQUEST_METHOD']);
$data = json_decode(file_get_contents('php://input'), true);

//perform requested service
$service = $data['Service'];
if (!isset($service) || empty($service)) {
    http_response_code(400);
    echo json_encode("Invalid Service");
} else {
    if ($service === 'Pet') {
        $Controller = new PetController();
        $Controller->handleAPIRequest($data);
    }

    http_response_code($Controller->getCode());
    echo(json_encode($Controller->getResponse()));
}
