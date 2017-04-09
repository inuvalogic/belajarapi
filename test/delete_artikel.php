<?php

$url = 'http://localhost/api/public/artikel/17';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($status_code==200)
{
	$data = json_decode($result);

	if ($data->status==true){
		echo 'artikel berhasil di hapus';
	}
}