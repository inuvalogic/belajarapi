<?php

$url = 'http://localhost/api/public/artikel/1';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($status_code==200)
{
	$data = json_decode($result);

	?>
	
	<h1><?php echo $data->data_artikel->judul; ?></h1>
	<p><?php echo $data->data_artikel->isi; ?></p>
	
	<?php
}