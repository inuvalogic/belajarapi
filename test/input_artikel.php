<?php

$url = 'http://localhost/api/public/artikel';

$post_data = array(
	'judul' => 'test input artikel baru',
	'isi' => 'test isi artikel yang baru',
	'gambar' => 'gambar.jpg',
	'judul_gambar' => 'judul gambar'
);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

$result = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($status_code==200)
{
	$data = json_decode($result);
	$id_artikel = $data->id;

	echo 'id artikel baru = ' . $id_artikel;
}