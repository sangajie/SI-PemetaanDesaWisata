<?php

namespace App\Controllers;

class Admin extends BaseController
{
    // public $title = 'Mengedit-Peta';
    public $url = 'admin';
    public function index()
    {
        $mapModel = new \App\Models\mapModel();
        $kategoriModel = new \App\Models\kategoriModel();
        $data['title']= 'Peta';
        $data['url'] = $this->url;
        $data['getData'] = $mapModel->asArray()->find();
        $data['getDataKategori'] = $kategoriModel->asArray()->find();
        $data['kategori'] = $kategoriModel->asObject()->find();
        return view('admin/mengeditPeta',$data);
    }
    public function dashboard()
    {
        $buah = array(
            'LokasiAwal' => "",
            'LokasiTujuan' => ""
        );       
        $data['Rute'] = $buah;
        $mapModel = new \App\Models\mapModel();
        $data['url'] = $this->url;
        $data['title']= 'Dashboard';
        return view('admin/dashboard',$data);
    }
    public function route()
    {
        $data['Rute'] = $this->request->getVar();
        $data['url'] = $this->url;
        $data['title']= 'User-Map';
        // var_dump($data['Rute']);
        return view('admin/dashboard', $data);
    }
    public function kategoriView()
    {
        $kategoriModel = new \App\Models\kategoriModel();
        $data['title']= 'Kategori-Peta';
        $data['url'] = $this->url;
        $data['kategori'] = $kategoriModel->asArray()->findAll();
        return view('admin/kategoriView',$data);
    }
    public function dataLogin()
    {
        $loginModel = new \App\Models\loginModel();
        $data['title']= 'Data-Login';
        $data['url'] = $this->url;
        $data['login'] = $loginModel->asArray()->findAll();
        return view('admin/dataLogin',$data);
    }
    
    public function form($mapId='')
    {
        $kategoriModel = new \App\Models\kategoriModel();
        $mapModel = new \App\Models\mapModel();
        $data['title'] = 'Mengedit-Peta';
        $data['url'] = $this->url;
        $data['kategori'] = $mapModel->asArray()->findAll();
        $data['kategori'] = $kategoriModel->asObject()->find();
        if($mapId!='')
        {
            $getData = $mapModel->asArray()->find($mapId);
            $getDataKategori = $kategoriModel->asArray()->find($mapId);
        }
        else {
            $getData = null;
            $getDataKategori = null;
        }
        $data['getData'] = $getData;
        $data['getDataKategori'] = $getDataKategori;
        $data['page'] = 'Form ' . $data['title'];
        return view('admin/mengeditPeta', $data);
    }
    public function kategoriEdit($kategoriId='')
    {
        $kategoriModel = new \App\Models\kategoriModel();
        $mapModel = new \App\Models\mapModel();
        $data['title'] = 'Kategori-Peta';
        $data['url'] = $this->url;
        $data['kategori'] = $kategoriModel->asArray()->findAll();
        if($kategoriId!='')
        {
            $getData = $kategoriModel->asArray()->find($kategoriId);
        }
        else {  
            $getData = null;
        }
        $data['getData'] = $getData;
        $data['page'] = 'Form ' . $data['title'];
        return view('admin/kategoriEdit', $data);
    }
    public function dataLoginEdit($loginId='')
    {
        $loginModel = new \App\Models\loginModel();
        // $mapModel = new \App\Models\mapModel();
        $data['title'] = 'Login-Peta';
        $data['url'] = $this->url;
        $data['login'] = $loginModel->asArray()->findAll();
        if($loginId!='')
        {
            $getData = $loginModel->asArray()->find($loginId);
        }
        else {  
            $getData = null;
        }
        $data['getData'] = $getData;
        $data['page'] = 'Form ' . $data['title'];
        return view('admin/dataLoginEdit', $data);
    }
    
    public function save()  
    {
        $mapModel = new \App\Models\mapModel();
        $mapModel->save($this->request->getPost());

        $url = base_url('Admin');
        echo "<script>
        alert('Data Peta Berhasil Ditambahkan!');
        window.location.href='$url';
        </script>";

        // return redirect()->to('Admin');
    }
    public function saveKategori()
    {
        $kategoriModel = new \App\Models\kategoriModel();
        $kategoriModel->save($this->request->getPost());

        $url = base_url('Admin/kategoriView');
        echo "<script>
        alert('Kategori Berhasil Ditambahkan!');
        window.location.href='$url';
        </script>";

        //return redirect()->to('Admin/kategoriView');
    }
    public function saveDataLogin()
    {
        $loginModel = new \App\Models\loginModel();
        $loginModel->save($this->request->getPost());
        return redirect()->to('admin/dataLogin');
    }
    public function delete($mapId='')
    {
        $mapModel = new \App\Models\mapModel();
        $mapModel->delete($mapId);

        $url = base_url('admin');
        echo "<script>
        alert('Berhasil dihapus!');
        window.location.href='$url';
        </script>";
        // return redirect()->to('admin');
    }
    public function tes()
    {
        // $mapModel = new \App\Models\mapModel();
        // $mapModel->delete($mapId);
        // return redirect()->to('admin');
        return view('test');
    }
    public function deleteKategori($kategoriId='')
    {
        $kategoriModel = new \App\Models\kategoriModel();
        $kategoriModel->where('kategoriId', $kategoriId);
        $kategoriModel->delete();
        $url = base_url('admin/kategoriView');
        echo "<script>
        alert('Berhasil!');
        window.location.href='$url';
        </script>";
        // return redirect()->to('admin/kategoriView');
    }
    public function informasi($mapId="")
    {
        
        $mapModel = new \App\Models\mapModel();
        $data['map'] = $mapModel->asArray()->find($mapId);
        $data['url'] = $this->url;
        // $mapModel = new \App\Models\mapModel();
        $data['title']= 'Informasi';
        // var_dump($data['map']["mapId"]);
        return view('admin/informasiViewAdmin', $data);
    }
    
}
