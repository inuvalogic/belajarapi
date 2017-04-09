<?php

namespace Api\Controller;

use Api\Core\Response;

class ArtikelController extends \Api\Core\App
{
	public function get()
	{
		$data=  $this->halo('GET');

		Response::sent(200, $data);
	}

	public function post()
	{
		$data=  $this->halo('POST');

		Response::sent(200, $data);
	}

	private function halo($method)
	{
		$data = array(
			'message' => 'ini method ' . $method
		);

		return $data;
	}
}