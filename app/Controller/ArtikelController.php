<?php

namespace Api\Controller;

use Api\Core\Response;
use Api\Model\ArtikelModel;

class ArtikelController extends \Api\Core\App
{
    public function get()
    {
        $id = $this->uri_segment(1);

        if ($id!=false)
        {
            $this->getOneArtikel($id);
        } else {
            $this->getAllArtikel();
        }
    }

    private function getAllArtikel()
    {
        $data = ArtikelModel::all();

        if ($data!=false)
        {
            $output = array();

            $a = 0;
            foreach ($data as $row)
            {
                $output[$a]['id']           = $row['id'];
                $output[$a]['judul']        = $row['judul'];
                $output[$a]['isi']          = $row['isi'];
                $output[$a]['gambar']       = $row['gambar'];
                $output[$a]['judul_gambar'] = $row['judul_gambar'];
                $a++;
            }

            $hasil = array(
                'data_artikel' => $output,
            );

            Response::sent(200, $hasil);
            
        } else {
            Response::sent(400);
        }
    }

    private function getOneArtikel($id)
    {
        $row = ArtikelModel::one($id);

        if ($row!=false)
        {
            $output = array(
                'id'           => $row['id'],
                'judul'        => $row['judul'],
                'isi'          => $row['isi'],
                'gambar'       => $row['gambar'],
                'judul_gambar' => $row['judul_gambar'],
            );

            $hasil = array(
                'data_artikel' => $output,
            );

            Response::sent(200, $hasil);

        } else {
            Response::sent(400);
        }
    }

    public function post()
    {
        $data = array(
            'judul' => filter_var($_POST['judul'], FILTER_SANITIZE_STRING),
            'isi' => filter_var($_POST['isi'], FILTER_SANITIZE_STRING),
        );

        $id = ArtikelModel::insert($data);

        if ($id!=false){
            Response::sent(200, array('id' => $id));
        } else {
            Response::sent(400);
        }
    }

    private function halo($method)
    {
        $data = array(
            'message' => 'ini method ' . $method
        );

        return $data;
    }
}