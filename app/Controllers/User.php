<?php

namespace App\Controllers;

class User extends BaseController
{
    
    public $url = 'user';
    public function index()
    {
        $mapModel = new \App\Models\mapModel();
        $data['title']= 'map-Peta';
        $data['url'] = $this->url;
        $data['map'] = $mapModel->asArray()->findAll();
        return view('user/userView',$data);
    }
    // public function index()
    // {
    //     $buah = array(
    //         'LokasiAwal' => "",
    //         'LokasiTujuan' => ""
    //     );       
    //     $data['Rute'] = $buah;
    //     $mapModel = new \App\Models\mapModel();
    //     $data['url'] = $this->url;
    //     $data['title']= 'Desa Cimacan   ';
    //     return view('user/userView',$data);
    // }
    public function informasi($mapId="")
    {
        
        $mapModel = new \App\Models\mapModel();
        $data['map'] = $mapModel->asArray()->find($mapId);
        $data['url'] = $this->url;
        $data['Rute'] = $this->request->getVar();
        // $mapModel = new \App\Models\mapModel();
        $data['title']= 'Informasi';
        // var_dump($data['map']["mapId"]);
        return view('user/informasiView', $data);
    }
    public function save()
    {
        $data['Rute'] = $this->request->getVar();
        $data['url'] = $this->url;
        $data['title']= 'User-Map';
        // var_dump($data['Rute']);
        return view('user/userView', $data);
    }
    public function route()
    {
        $mapModel = new \App\Models\mapModel();
        $data['map'] = $mapModel->asArray()->find($mapId);
        $data['Rute'] = $this->request->getVar();
        $data['url'] = $this->url;
        $data['url'] = $this->url;
        $data['title']= 'User-Map';
        // var_dump($data['Rute']);
        view('user/informasiView', $data);
    }
    
}
