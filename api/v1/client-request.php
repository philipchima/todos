<?php

//Make sure that it is a POST request.
if((strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0) && (strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT') != 0)&& (strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE') != 0)&& (strcasecmp($_SERVER['REQUEST_METHOD'], 'GET') != 0))
    throw new Exception('Invalid request');
 
$postContent = array();
if ($_SERVER['REQUEST_METHOD'] != 'GET') {

	// Make sure that the content type of the POST request has been set to application/json
	$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
	if(strcasecmp($contentType, 'application/json') != 0){
		throw new Exception('Content type must be: application/json');
	}

	//Receive the RAW post data.
	$postContent = trim(file_get_contents("php://input"));
	 
	//Attempt to decode the incoming RAW post data from JSON.
	$postContent = json_decode($postContent, true);
	 
	//If json_decode failed, the JSON is invalid.
	if (!is_array($postContent)) {
	    throw new Exception('Request parameters contains invalid JSON!');
	}
}

$_POST = array_merge($_POST, $postContent);