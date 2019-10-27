<?php
class About extends Controller{
    
    public function index($nama = 'taufiq', $pekerjaan = 'developer'){
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['judul'] = 'index about';
        
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page(){
        $data['judul'] = 'page about';

        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}

?>