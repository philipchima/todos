<?php
$description = $error->getMessage();
$sub_strings = isset($description) ? explode(' ', $description) : array();
// if($description){
// 	$sub_strings =explode(' ', $description);
// } else $sub_strings = array();
$count = count($sub_strings);
$code = $count > 0 ? $sub_strings[$count - 1]:0;
switch ($code) {
	case '400':
	case '401':
	case '402':
	case '403':
	case '404':
	case '409':
	case '417':
	case '500':
	case '502':
	case '503':
		$http_response_code = $code;
		$description = trim(str_replace($code, '', $description));
		break;
	default:
		$http_response_code = 500;
		break;
}

http_response_code($http_response_code); 
echo json_encode(array('message' => $description, 'success' => false), JSON_PRETTY_PRINT);
exit;