<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Pragma, Authorization, Accept, X-Auth-Token, x-xsrf-token');

header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Max-Age: 1000');

$headers = getallheaders();



$GLOBALS['Authorization'] = isset($headers["Authorization"])?str_replace("Bearer ", '', $headers["Authorization"]):null;

$http_error_code = 500;
$http_response_code = 200;
$user_ses_id = $user_id = null;

function formatInput($input) {
    return trim(stripcslashes(htmlspecialchars($input)));
}