<?php

$url = 'http://localhost/api/public/artikel';

$data = array(
	'judul' => 'test input',
	'isi' => 'test isi artikel',
);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$result = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($status_code==200)
{
	$data = json_decode($result);
	$id_artikel = $data->id;

	echo 'id artikel baru = ' . $id_artikel;
}