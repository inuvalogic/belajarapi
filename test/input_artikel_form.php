<form method="post">
	<label for="judul">Judul Artikel</label><br>
	<input type="text" name="judul"><br>
	<label for="isi">Isi Artikel</label><br>
	<textarea name="isi"></textarea><br>
	<button type="submit" name="submit" value="submit">Tambah Artikel</button>
</form>
<?php

// jika form di submit
if (isset($_POST['submit']))
{
	$url = 'http://localhost/api/public/artikel';

	$post_data = array(
		'judul' => $_POST['judul'],
		'isi' => $_POST['isi'],
		'gambar' => 'gambar.jpg', // anggap aja ini upload filenya sukses
		'judul_gambar' => 'judul gambar' // anggap aja ini upload filenya sukses
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
		echo 'artikel baru berhasil ditambahkan via api dengan ID = ' . $id_artikel;
	}
}
