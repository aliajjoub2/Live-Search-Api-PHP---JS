<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$username = "root";
$password = "";
$database = new  PDO("mysql:host=localhost; dbname=shop;charset=utf8;", $username, $password);
$data = file_get_contents('php://input');
$data = json_decode($data);

if(isset($data->value)){

    $getData = $database->prepare("SELECT * FROM words WHERE word_english LIKE :SearchValue");
    $searchValue = "%" . $data->value . "%";
    $getData->bindParam("SearchValue",$searchValue);
    
    $getData->execute();
    $getData = $getData->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($getData));
    
   
}