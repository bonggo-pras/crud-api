<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MakananModel;

class Makanan extends ResourceController
{
    use ResponseTrait;

    // all users
    public function index()
    {
        $model = new MakananModel();
        $data['makanan'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    // create
    public function create()
    {
        $model = new MakananModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'jumlah'  => $this->request->getVar('jumlah'),
            'berat'  => $this->request->getVar('berat'),
            'harga'  => $this->request->getVar('harga'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Berhasil menambahkan makanan'
            ]
        ];
        return $this->respondCreated($response);
    }

    // single user
    public function show($id = null)
    {
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->failUnauthorized('TokenRequired');
        
        $model = new MakananModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Daftar barang makanan tidak ada');
        }
    }

    // update
    public function update($id = null)
    {
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->failUnauthorized('TokenRequired');

        $model = new MakananModel();

        $data = [
            'nama' => $this->request->getVar('nama'),
            'jumlah'  => $this->request->getVar('jumlah'),
            'berat'  => $this->request->getVar('berat'),
            'harga'  => $this->request->getVar('harga'),
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Berhasil mengupdate makanan'
            ]
        ];
        return $this->respond($response);
    }

    // delete
    public function delete($id = null)
    {
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->failUnauthorized('TokenRequired');

        $model = new MakananModel();
        $data = $model->where('id', $id)->delete($id);

        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Berhasil menghapus makanan'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Daftar barang makanan tidak ada');
        }
    }
}
