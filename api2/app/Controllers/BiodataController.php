<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\biodataModel;

class BiodataController extends ResourceController
{
    // use ResponseTrait;
    public function __construct()
    {
        $this->biodata = new biodataModel();
    }
    public function index()
    {
        $all = $this->biodata->all();
        $data["biodata"] = $all->getResult();
        return $this->respond($data);
    }
    public function show($id = null)
    {
        $biodata = $this->biodata->byId($id);
        $result = $biodata->getResult();
        // var_dump($result);die;
        // $data = $model->getWhere(['product_id' => $id])->getResult();
        $data = $result;
        // var_dump($biodata); die;
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    public function create()
    {
        $nama = $this->request->getPost('nama');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $alamat = $this->request->getPost('alamat');
        $no_telp = $this->request->getPost('no_telp');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $create_at = $this->request->getPost('create_at');
        $create_date = $this->request->getPost('created_date');

        $data=[
            'nama'=>$nama,
            'tgl_lahir'=>$tgl_lahir,
            'alamat'=>$alamat,
            'no_telp'=>$no_telp,
            'tempat_lahir'=>$tempat_lahir,
            'create_at'=>$create_at,
            'created_date'=>$create_date
        ];
       
        // $data = json_decode(file_get_contents("post"));
        // var_dump($$this->biodata->savebiodata($data)); die;
        $this->biodata->savebiodata($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        // var_dump($response); die;
         
        return $this->respondCreated($data, 201);
    }

    public function updatebiodata($id= null)
    {
        $model = new biodataModel();
        $json = $this->request->getJSON();
        if($json){
            // var_dump($json); die;
            $data = [
                'nama' => $json->nama,
                'tgl_lahir' => $json->tgl_lahir,
                'alamat' => $json->alamat,
                'no_telp' => $json->no_telp,
                'tempat_lahir' => $json->tempat_lahir,
            ];
        }else{
            $input = $this->request->getRawInput();
            $data = [
                'nama' => $input['nama'],
                'tgl_lahir' => $input['tgl_lahir'],
                'alamat' => $input['alamat'],
                'no_telp' => $input['no_telp'],
                'tempat_lahir' => $input['tempat_lahir'],
            ];
        }
        // var_dump($model->update($id, $data)); die;
        // Insert to Database
        $model->update($id, $data);
        // $this->biodata->updatebiodataa($id,$data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        // var_dump($response); die;
        return $this->respond($response);
    }
    // public function index()
    // {
    //     $model = new biodataModel();
    //     $data = $model->findAll();
    //     return $this->respond($data, 200);
    // }
    // use ResponseTrait;
    // // get all product
    // public function index()
    // {
    //     $model = new biodataModel();
    //     $data = $model->findAll();
    //     return $this->respond($data, 200);
    // }
 
    // // get single product
    // public function show($id = null)
    // {
    //     $model = new biodataModel();
    //     $data = $model->getWhere(['id' => $id])->getResult();
    //     if($data){
    //         return $this->respond($data);
    //     }else{
    //         return $this->failNotFound('No Data Found with id '.$id);
    //     }
    // }
 
    // // create a product
    // public function create()
    // {
    //     $model = new biodataModel();
    //     $data = [
            
    //     'nama' => $this->request->getPost('nama'),
    //     'tgl_lahir' => $this->request->getPost('tgl_lahir'),
    //     'alamat' => $this->request->getPost('alamat'),
    //     'no_telp' => $this->request->getPost('no_telp'),
    //     'tempat_lahir' => $this->request->getPost('tempat_lahir'),
    //     'create_at' => $this->request->getPost('create_at'),
    //     'create_date' => $this->request->getPost('created_date'),
    //         // 'product_name' => $this->request->getPost('product_name'),
    //         // 'product_price' => $this->request->getPost('product_price')
    //     ];
    //     $data = json_decode(file_get_contents("php://input"));
    //     //$data = $this->request->getPost();
    //     $model->insert($data);
    //     $response = [
    //         'status'   => 201,
    //         'error'    => null,
    //         'messages' => [
    //             'success' => 'Data Saved'
    //         ]
    //     ];
         
    //     return $this->respondCreated($data, 201);
    // }
 
    // // update product
    // public function update($id = null)
    // {
    //     $model = new biodataModel();
    //     $json = $this->request->getJSON();
    //     if($json){
    //         $data = [
    //             'nama' => $json->nama,
    //             'alamat' => $json->alamat,
    //             'tgl_lahir' => $json->tgl_lahir,
    //             'tempat_lahir' => $json->tempat_lahir,
    //             'no_telp' => $json->no_telp,
    //             'create_at' => $json->create_at,
    //             'created_date' => $json->created_date,
    //         ];
    //     }else{
    //         $input = $this->request->getRawInput();
    //         $data = [
    //             'nama' => $input['nama'],
    //             'alamat' => $input['alamat'],
    //             'tgl_lahir' => $input['tgl_lahir'],
    //             'tempat_lahir' => $input['tempat_lahir'],
    //             'no_telp' => $input['no_telp'],
    //             'create_at' => $input['create_at'],
    //             'created_date' => $input['created_date'],
    //         ];
    //     }
    //     // Insert to Database
    //     $model->update($id, $data);
    //     $response = [
    //         'status'   => 200,
    //         'error'    => null,
    //         'messages' => [
    //             'success' => 'Data Updated'
    //         ]
    //     ];
    //     return $this->respond($response);
    // }
 
    // // delete product
    public function deletebiodata($id = null)
    {
        // $model = new biodataModel();
        // $data = $this->biodata->byId($id);
        // $result = $data->getResult();
        // $data = $model->find($id);
        // var_dump($result); die;
        $data=[
            'nama',
            'no_telp',
            'alamat',
            'tgl_lahir',
            'tempat_lahir'
        ];
        if($data){
            $this->biodata->deletebiodata($id);
            // $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
             
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
         
    }
}