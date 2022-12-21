<?php

namespace App\Controllers;

use App\Controllers\Base\BaseController;
use Config\Services;
use GuzzleHttp\Psr7\Request;

// Request
use GuzzleHttp\Client;

class biodataController extends BaseController
{
    public function index()
    {
        $result = curlHelper(getenv('API_URL') . '/biodata', 'GET');

        $data['biodata'] = $result->biodata;
        // var_dump($json); die;
        return view('biodata/index', $data);
    }
    public function detail($id)
    {
        // var_dump("tes"); die;
        $result = curlHelper(getenv('API_URL') . '/biodata' . '/' . $id, 'GET');
        // var_dump($result[0]->tgl_lahir); die;
        return json_encode([
            "data" =>  $result
        ]);
    }

    public function bilangan()
    {
        $array = [];
        for ($a = 1; $a <= 100; $a++) { // perulangan 1 sampai 20
            // echo $a .',';
            $k = 0;
            
            for ($b = 1; $b <= $a; $b++) { // perulangan bilangan pembagi
                if ($a % $b == 0) { // modulus
                    $k++;
                }
            }
            if ($k == 2) { // salah satu syarat 2 bukan merupakan bilangan prima
                // echo'<br    >'. $a . ',';
                $array[]= $a;
            }
        }
        $data['array'] = $array;
        // var_dump($data); die;
        
        
        
        // var_dump($data[]); die;
        return view('biodata/bilangan',$data);
        
        
    }
}
