<?php

namespace Api\Core;

class Response
{
	public static function sent($code = 200, $data = array())
	{
		Header::init($code);

		if (!is_array($data)){
			Header::init(400);
		}

		$data['http'] = Header::getStatusData();
		
		header('Content-type: application/json');
		
		$output = json_encode($data);

		echo $output;
	}
}