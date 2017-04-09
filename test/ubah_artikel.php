<?php

$url = 'http://localhost/api/public/artikel/1';

$data = array(
	'judul' => 'ganti judul ah',
	'isi' => 'ganti isi artikel nya juga dong',
);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$result = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($status_code==200)
{

	$data = json_decode($result);

	if ($data->status==true){
		echo 'artikel berhasil di ubah';
	}
}