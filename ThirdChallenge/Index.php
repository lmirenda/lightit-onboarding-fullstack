<?php require_once "vendor/autoload.php";

use GuzzleHttp\Client;

$movie = 'Jaws';

$client = new Client([
    'base_uri'=>'http://www.omdbapi.com/',
    
]);

$titleResponse = $client->request('GET','', [
    'query' => [
        't' => $movie,
        'apikey' => '78e88e5e'
    ]
]);

$titleBody = $titleResponse->getBody();
$obj_titleBody = json_decode($titleBody);
$arr_titleBody = get_object_vars($obj_titleBody);
unset($arr_titleBody["Ratings"]);

print_r($arr_titleBody);
// uncomment this line later: 
//$movie = $input->getArgument('movie');

$idResponse = $client->request('GET','', [
    'query' => [
        'i' => $arr_titleBody["imdbID"],
        'plot' => 'full',
        'apikey' => '78e88e5e'
    ]
]);

$idBody = $idResponse->getBody();
$obj_idBody = json_decode($idBody);
$arr_idBody = get_object_vars($obj_idBody);
$fullPlot = $arr_idBody["Plot"];
print_r($fullPlot);


