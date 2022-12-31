 <?php
$message = isset($response['message']) ? $response['message']:null;
$sub_strings = isset($message) ? explode(' ', $message) : array();
$count = count($sub_strings);
$code = $count > 0 ? $sub_strings[$count - 1]:0;
switch ($code) {
	case '200':
	case '201':
		$http_response_code = $code;
		$message = trim(str_replace($code, '', $message));
		$response['message'] = $message;
		break;
	default:
		$http_response_code = 200;
		break;
}

http_response_code($http_response_code);           
echo json_encode($response, JSON_PRETTY_PRINT);
exit;