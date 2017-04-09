<?php

$request_method = $_SERVER['REQUEST_METHOD'];

switch ($request_method)
{
	case 'GET':
		echo 'ini method GET';
		break;

	case 'POST':
		echo 'ini method POST';
		break;

	case 'PUT':
		echo 'ini method PUT';
		break;
	
	case 'DELETE':
		echo 'ini method DELETE';
		break;
	
	default:
		echo 'method tidak ditemukan';
		break;
}