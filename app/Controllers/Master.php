<?php

namespace App\Controllers;

class Master extends BaseController{

    protected $mastermodel;

    function __construct(){
        $this->mastermodel = new \App\Models\Mastermodel();
    }

    public function index(){
        $data = array(
            'content' => 'Beranda/beranda',
            'grafikmhs'     => $this->mastermodel->getMhsGrafik(),
            'grafikjur'     => $this->mastermodel->getJurGrafik(),
            'grafikpro'     => $this->mastermodel->getProGrafik()
        );
        return view('index', $data);
    }
    
    // WILAYAH
    function wilayah(){
        $data = array(
            'content'   => 'Master/master_wilayah',
            'mhs1'      => $this->mastermodel->getMasterWilayah(),
            'validation'=> \Config\Services::validation()
        );
        return view('index', $data);
    }

    function simpanWilayah(){
        if(!$this->validate([
            'nama_wilayah'  =>[
                'rules'     =>'required|is_unique[master_wilayah.nama_wilayah]',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.',
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('master/wilayah')->withInput()->with('validation', $validation);
        }


        $this->mastermodel->addWilayah(array('nama_wilayah' => $this->request->getVar('nama_wilayah')));
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('master/wilayah');

        // $nama_wilayah = $this->request->getVar('nama_wilayah');
        // $data = [
        //     'nama_wilayah' => $nama_wilayah
        // ];
        // $this->mastermodel->addWilayah($data);
    }

    function hapusWilayah(){
        $this->mastermodel->deleteWilayah(array('id_wilayah' => $this->request->getVar('id_wilayah')));

        // $id_wilayah = $this->request->getVar('id_wilayah');
        // $data = [
        //     'id_wilayah' => $id_wilayah
        // ];
        // $this->mastermodel->deleteWilayah($data);
        // return redirect()->to('master/wilayah');
    }
 
    function editWilayah($id_wilayah){
        $data = array(
            'content'       => 'Master/edit_wilayah',
            'id_wilayah'    => $id_wilayah,
            'wilayahloop'   => $this->mastermodel->getWilayahById($id_wilayah),
            'mhs1'          => $this->mastermodel->getMasterWilayah(),
            'validation'    => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function editsubmitWilayah($id_wilayah){
        if(!$this->validate([
            'nama_wilayah'  =>[
                'rules'     =>'required|is_unique[master_wilayah.nama_wilayah]',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.',
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            // dd($validation);
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = array(
           'nama_wilayah' => $this->request->getVar('nama_wilayah')
        );
        $this->mastermodel->updateWilayah($data, array('id_wilayah' => $id_wilayah));
        session()->setFlashdata('pesan', 'Data berhasil diperbarui');
        return redirect()->to('master/wilayah');
    }

    // MAHASISWA
    //tabel
    function mhs(){
        $data = array(
            'content'   => 'Master/tabelmhs',
            'mhs2'      => $this->mastermodel->getMasterMhs(),
            'validation'=> \Config\Services::validation()
        );
        return view('index', $data);
    }

    function hapusMhs(){
        $this->mastermodel->deleteMhs(array('id_mhs' => $this->request->getVar('id_mhs')));
    }
    
    function editMhs($id_mhs){
        $data = array(
            'content'       => 'Master/edit_formhs',
            'id_mhs'        => $id_mhs,
            'mhsloop'       => $this->mastermodel->getMhsById($id_mhs),
            'wilayahloop'   => $this->mastermodel->getMasterWilayah(),
            'prodiloop'     => $this->mastermodel->getMasterProdi(),
            'validation'    => \Config\Services::validation()
        );
        return view('index', $data);
    }

    //formulir mhs
    function formhs(){
        $data = array(
            'content' => 'Master/formhs',
            'kecamatanmhs' => $this->mastermodel->getMasterWilayah(),
            'prodimhs' => $this->mastermodel->getMasterMhs(),
            'validation'    => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function simpanMhs(){
        if(!$this->validate([
            'nim'  =>[
                'rules'     =>'required|is_unique[mahasiswa.nim]',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.',
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
                ],
            'nama'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'HP'    =>[
                'rules'     =>'is_unique[mahasiswa.HP]',
                'errors'    =>[
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
                ],
            'kode_pro'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/mhs')->withInput()->with('validation', $validation);
        }

        $nim            = $this->request->getVar('nim');
        $nama           = $this->request->getVar('nama');
        $email          = $this->request->getVar('email');
        $jkel           = $this->request->getVar('jkel');
        $alamat         = $this->request->getVar('alamat');
        $id_wilayah     = $this->request->getVar('id_wilayah');
        $HP             = $this->request->getVar('HP');
        $tempat_lahir   = $this->request->getVar('tempat_lahir');
        $tgl_lahir      = $this->request->getVar('tgl_lahir');
        $kode_pro       = $this->request->getVar('kode_pro');
        
        $data           = [
            'nim'           => $nim,
            'nama'          => $nama,
            'email'          => $email,
            'jkel'          => $jkel,
            'alamat'        => $alamat,
            'id_wilayah'    => $id_wilayah,
            'HP'            => $HP,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'kode_pro'      => $kode_pro
        ];
        $this->mastermodel->addMhs($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('master/mhs');
    }


    function editsubmitMhs($id_mhs){
        if(!$this->validate([
            'nim'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'HP'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = array(
            'nim'           => $this->request->getVar('nim'),
            'nama'          => $this->request->getVar('nama'),
            'email'          => $this->request->getVar('email'),
            'jkel'          => $this->request->getVar('jkel'),
            'alamat'        => $this->request->getVar('alamat'),
            'id_wilayah'    => $this->request->getVar('id_wilayah'),
            'HP'            => $this->request->getVar('HP'),
            'tempat_lahir'  => $this->request->getVar('tempat_lahir'),
            'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
            'kode_pro'      => $this->request->getVar('kode_pro')
        );
        $this->mastermodel->updateMhs($data, array('id_mhs' => $id_mhs));
        session()->setFlashdata('pesan', 'Data berhasil diperbarui');
        return redirect()->to('master/mhs');
    }

    // JURUSAN
    function jurusan(){
        $data = array(
            'content'   => 'Master/master_jurusan',
            'mhs3'      => $this->mastermodel->getMasterJurusan(),
            'validation'=> \Config\Services::validation()
        );
        return view('index', $data);
    }

    function simpanJurusan(){
        if(!$this->validate([
            'kode_jur'  =>[
                'rules'     =>'required|is_unique[jurusan.kode_jur]',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.',
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
                ],
            'nama_jur'  =>[
                'rules'     =>'required|is_unique[jurusan.nama_jur]',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.',
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
                ],
            'nama_kajur'  =>[
                'rules'     =>'required|is_unique[jurusan.nama_kajur]',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.',
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
                ],
            'nip_kajur'  =>[
                'rules'     =>'required|is_unique[jurusan.nama_kajur]',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.',
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/jurusan')->withInput()->with('validation', $validation);
        }

        $kode_jur   = $this->request->getVar('kode_jur');
        $nama_jur   = $this->request->getVar('nama_jur');
        $nama_kajur   = $this->request->getVar('nama_kajur');
        $nip_kajur   = $this->request->getVar('nip_kajur');
        $data       = [
            'kode_jur' => $kode_jur,
            'nama_jur' => $nama_jur,
            'nama_kajur' => $nama_kajur,
            'nip_kajur' => $nip_kajur
        ];
        $this->mastermodel->addJurusan($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('master/jurusan');
    }
    
    function hapusJurusan(){
        $this->mastermodel->deleteJurusan(array('id_jur' => $this->request->getVar('id_jur')));
    }
    
    function editJurusan($id_jur){
        $data = array(
            'content'   => 'Master/edit_jurusan',
            'id_jur'    => $id_jur,
            'jurusanloop'   => $this->mastermodel->getJurusanById($id_jur),
            'mhs3'      => $this->mastermodel->getMasterJurusan(),
            'validation'    => \Config\Services::validation()

        );
        return view('index', $data);
    }
    
    function editsubmitJurusan($id_jur){
        if(!$this->validate([
            'kode_jur'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nama_jur'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nama_kajur'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nip_kajur'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = array(
           'kode_jur' => $this->request->getVar('kode_jur'),
           'nama_jur' => $this->request->getVar('nama_jur'),
           'nama_kajur' => $this->request->getVar('nama_kajur'),
           'nip_kajur' => $this->request->getVar('nip_kajur')
        );
        $this->mastermodel->updateJurusan($data, array('id_jur' => $id_jur));
        session()->setFlashdata('pesan', 'Data berhasil diperbarui');
        return redirect()->to('master/jurusan');
    }

    // PRODI
    function prodi(){
        $data = array(
            'content'        => 'Master/master_prodi',
            'mhs4'           => $this->mastermodel->getMasterProdi(),
            'jurusanprodi'   => $this->mastermodel->getMasterJurusan(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function simpanProdi(){
        if(!$this->validate([
            'kode_pro'  =>[
                'rules'     =>'required|is_unique[prodi.kode_pro]',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.',
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
                ],
            'nama_pro'  =>[
                'rules'     =>'required|is_unique[prodi.nama_pro]',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.',
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/prodi')->withInput()->with('validation', $validation);
        }

        $kode_pro   = $this->request->getVar('kode_pro');
        $nama_pro   = $this->request->getVar('nama_pro');
        $nama_kapro   = $this->request->getVar('nama_kapro');
        $jenjang    = $this->request->getVar('jenjang');
        $kode_jur   = $this->request->getVar('kode_jur');
        $data       = [
            'kode_pro' => $kode_pro,
            'nama_pro' => $nama_pro,
            'nama_kapro' => $nama_kapro,
            'jenjang'  => $jenjang,
            'kode_jur' => $kode_jur
        ];
        $this->mastermodel->addProdi($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('master/prodi');
    }

    function hapusProdi(){
        $this->mastermodel->deleteProdi(array('id_pro' => $this->request->getVar('id_pro')));
    }

    function editProdi($id_pro){
        $data = array(
            'content'       => 'Master/edit_prodi',
            'id_pro'        => $id_pro,
            'prodiloop'     => $this->mastermodel->getProdiById($id_pro),
            'jurusanprodi'  => $this->mastermodel->getMasterJurusan(),
            'mhs4'          => $this->mastermodel->getMasterProdi(),
            'validation'    => \Config\Services::validation()

        );
        return view('index', $data);
    }

    function editsubmitProdi($id_pro){
        if(!$this->validate([
            'kode_pro'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nama_pro'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nama_kapro'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'jenjang'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'kode_jur'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = array(
           'kode_pro'    => $this->request->getVar('kode_pro'),
           'nama_pro'    => $this->request->getVar('nama_pro'),
           'nama_kapro'    => $this->request->getVar('nama_kapro'),
           'jenjang'     => $this->request->getVar('jenjang'),
           'kode_jur'    => $this->request->getVar('kode_jur')
        );
        $this->mastermodel->updateProdi($data, array('id_pro' => $id_pro));
        session()->setFlashdata('pesan', 'Data berhasil diperbarui');
        return redirect()->to('master/prodi');
    }

    // MATA KULIAH
    function matkul(){
        $data = array(
            'content'        => 'Master/master_matkul',
            'mhs7'           => $this->mastermodel->getMasterMatkul(),
            'prodimatkul'    => $this->mastermodel->getMasterProdi(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function simpanMatkul(){
        if(!$this->validate([
            'kode_matkul'  =>[
                'rules'     =>'required|is_unique[matakul.kode_matkul]',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.',
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
                ],
            'nama_matkul'  =>[
                'rules'     =>'required|is_unique[matakul.nama_matkul]',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.',
                    'is_unique'     =>'{field} sudah terdaftar.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/matkul')->withInput()->with('validation', $validation);
        }

        $kode_matkul    = $this->request->getVar('kode_matkul');
        $nama_matkul    = $this->request->getVar('nama_matkul');
        $sks            = $this->request->getVar('sks');
        $jam            = $this->request->getVar('jam');
        $kode_pro       = $this->request->getVar('kode_pro');

        $data       = [
            'kode_matkul'   => $kode_matkul,
            'nama_matkul'   => $nama_matkul,
            'sks'           => $sks,
            'jam'           => $jam,
            'kode_pro'      => $kode_pro
        ];
        $this->mastermodel->addMatkul($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('master/matkul');
    }

    function hapusMatkul(){
        $this->mastermodel->deleteMatkul(array('id_matkul' => $this->request->getVar('id_matkul')));
    }

    function editMatkul($id_matkul){
        $data = array(
            'content'       => 'Master/edit_matkul',
            'id_matkul'     => $id_matkul,
            'matkulloop'    => $this->mastermodel->getMatkulById($id_matkul),
            'mhs4'          => $this->mastermodel->getMasterMatkul(),
            'prodimatkul'   => $this->mastermodel->getMasterProdi(),
            'validation'    => \Config\Services::validation()

        );
        return view('index', $data);
    }

    function editsubmitMatkul($id_matkul){
        if(!$this->validate([
            'kode_matkul'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nama_matkul'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'sks'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'jam'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'kode_pro'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = array(
           'kode_matkul'    => $this->request->getVar('kode_matkul'),
           'nama_matkul'    => $this->request->getVar('nama_matkul'),
           'sks'            => $this->request->getVar('sks'),
           'jam'            => $this->request->getVar('jam'),
           'kode_pro'       => $this->request->getVar('kode_pro')
        );
        $this->mastermodel->updateMatkul($data, array('id_matkul' => $id_matkul));
        session()->setFlashdata('pesan', 'Data berhasil diperbarui');
        return redirect()->to('master/matkul');
    }

    // TAHUN AKADEMIK
    function tahunakademik(){
        $data = array(
            'content'        => 'Master/master_thn_akademik',
            'mhs8'           => $this->mastermodel->getMasterTahunAkademik(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function simpanTahunAkademik(){
        if(!$this->validate([
            'thn_akademik'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'status'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/tahunakademik')->withInput()->with('validation', $validation);
        }

        $thn_akademik    = $this->request->getVar('thn_akademik');
        $status    = $this->request->getVar('status');

        $data       = [
            'thn_akademik'   => $thn_akademik,
            'status'           => $status
        ];
        $this->mastermodel->addTahunAkademik($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('master/tahunakademik');
    }

    function hapusTahunAkademik(){
        $this->mastermodel->deleteTahunAkademik(array('id_thn' => $this->request->getVar('id_thn')));
    }

    function editTahunAkademik($id_thn){
        $data = array(
            'content'           => 'Master/edit_thn_akademik',
            'id_thn'            => $id_thn,
            'thnakademikloop'   => $this->mastermodel->getTahunAkademikById($id_thn),
            'mhs8'              => $this->mastermodel->getMasterTahunAkademik(),
            'validation'        => \Config\Services::validation()

        );
        return view('index', $data);
    }

    function editsubmitTahunAkademik($id_thn){
        if(!$this->validate([
            'thn_akademik'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'status'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = array(
           'thn_akademik'   => $this->request->getVar('thn_akademik'),
           'status'         => $this->request->getVar('status')
        );
        $this->mastermodel->updateTahunAkademik($data, array('id_thn' => $id_thn));
        session()->setFlashdata('pesan', 'Data berhasil diperbarui');
        return redirect()->to('master/tahunakademik');
    }

    // KS (Kartu Rencana Studi)
    //master
    function tabelmasterKS(){
        $data = array(
            'content'        => 'Master/tabel_ks',
            'mhs9'           => $this->mastermodel->getMasterKRS(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    //sub krs form
    function krs(){
        $data = array(
            'content'        => 'Master/master_krs',
            'thnkrs'           => $this->mastermodel->getMasterTahunAkademik(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function caridataKRS(){
        helper('functionskor');

        if(!$this->validate([
            'thn_akademik'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'semester'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nim'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/krs')->withInput()->with('validation', $validation);
        }
        
        $thn_akademik   = $this->request->getVar('thn_akademik');
        $semester       = $this->request->getVar('semester');
        $nim            = $this->request->getVar('nim');
        if($this->mastermodel->get_by_id($nim)==null){
        session()->setFlashdata('pesan', 'NIM belum ditambahkan');
        return redirect()->to('master/krs');       
        }

        $data       = array(
            'content'       => 'Master/master_krs2',
            'thn_akademik'  => $thn_akademik,
            'semester'      => $semester,
            'nim'           => $nim,
            'nama_pro'      => $this->mastermodel->get_by_id($nim)->nama_pro,
            'nama'          => $this->mastermodel->get_by_id($nim)->nama,
            'validation'    => \Config\Services::validation(),
            'cekData'       => $this->mastermodel->getKRS($thn_akademik, $semester, $nim)
        );
        return view('index', $data);
    }

    function formKRS($nim, $semester, $thn_akademik){
        $data = array(
            'content'       => 'Master/formkrs',
            'thn_akademik'  => $thn_akademik,
            'semester'      => $semester,
            'nim'           => $nim,
            'matkulkrs'     => $this->mastermodel->getMasterMatkul(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function simpantabelKRS(){
        if(!$this->validate([
            'kode_matkul'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/formKRS')->withInput()->with('validation', $validation);
        }

        $thn_akademik   = $this->request->getVar('thn_akademik');
        $nim            = $this->request->getVar('nim');
        $semester       = $this->request->getVar('semester');
        $kode_matkul    = $this->request->getVar('kode_matkul');

        $data       = [
            'thn_akademik'  => $thn_akademik,
            'semester'      => $semester,
            'nim'           => $nim,
            'kode_matkul'   => $kode_matkul
        ];
        $this->mastermodel->addKRS($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('master/tabeldataKRS/'. $nim.'/'.$semester.'/'.$thn_akademik);
    } //untuk submit di form

    function tabeldataKRS($nim, $semester, $thn_akademik){
        helper('functionskor');
        $data       = array(
            'content'       => 'Master/master_krs2',
            'thn_akademik'  => $thn_akademik,
            'semester'      => $semester,
            'nim'           => $nim,
            'nama_pro'      => $this->mastermodel->get_by_id($nim)->nama_pro,
            'nama'          => $this->mastermodel->get_by_id($nim)->nama,
            'validation'    => \Config\Services::validation(),
            'cekData'       => $this->mastermodel->getKRS($thn_akademik, $semester, $nim)
        );
        return view('index', $data);
    }

    function hapusformKRS(){
        $this->mastermodel->deleteKRS(array('id_krs' => $this->request->getVar('id_krs')));
    }

    function editKRS($id_krs){
        $data = array(
            'content'           => 'Master/edit_formkrs',
            'id_krs'            => $id_krs,
            'krsloop'           => $this->mastermodel->getKRSById($id_krs),
            'thnkrs'           => $this->mastermodel->getMasterTahunAkademik(),
            'nimkrs'           => $this->mastermodel->getMasterMhs(),
            'matkulkrs'           => $this->mastermodel->getMasterMatkul(),
            'validation'        => \Config\Services::validation()

        );
        return view('index', $data);
    }

    function editsubmitformKRS($id_krs){
        if(!$this->validate([
            'thn_akademik'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
             'semester'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nim'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'kode_matkul'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = array(
           'thn_akademik'   => $this->request->getVar('thn_akademik'),
           'semester'   => $this->request->getVar('semester'),
           'nim'            => $this->request->getVar('nim'),
           'kode_matkul'    => $this->request->getVar('kode_matkul')
        );
        $this->mastermodel->updateKRS($data, array('id_krs' => $id_krs));
        session()->setFlashdata('pesan', 'Data berhasil diperbarui');
        return redirect()->to('master/tabelmasterKS');
    }

    function cetakkrs($nim, $semester, $thn_akademik){
        helper('functionskor');
        
        $data = array(
            'content'        => 'Master/print_krs',
            'thn_akademik'  => $thn_akademik,
            'semester'      => $semester,
            'nim'           => $nim,
            'nama_pro'      => $this->mastermodel->get_by_id($nim)->nama_pro,
            'nama'          => $this->mastermodel->get_by_id($nim)->nama,
            'cekData'       =>  $this->mastermodel->getKRS($thn_akademik, $semester, $nim),
            'validation'     => \Config\Services::validation()
        );
        return view('cetakks', $data);
    }

    //sub khs form
    function khs(){
        $data = array(
            'content'        => 'Master/master_khs',
            'thnkrs'           => $this->mastermodel->getMasterTahunAkademik(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function caridataKHS(){
        helper('functionskor');

        if(!$this->validate([
            'thn_akademik'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'semester'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nim'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/khs')->withInput()->with('validation', $validation);
        }
        
        $thn_akademik   = $this->request->getVar('thn_akademik');
        $semester       = $this->request->getVar('semester');
        $nim            = $this->request->getVar('nim');
        if($this->mastermodel->get_by_id($nim)==null){
        session()->setFlashdata('pesan', 'NIM belum ditambahkan');
        return redirect()->to('master/khs');       
        }

        $data       = array(
            'content'       => 'Master/master_khs2',
            'thn_akademik'  => $thn_akademik,
            'semester'      => $semester,
            'nim'           => $nim,
            'nama_pro'      => $this->mastermodel->get_by_id($nim)->nama_pro,
            'nama'          => $this->mastermodel->get_by_id($nim)->nama,
            'nama_kajur'    => $this->mastermodel->get_by_id($nim)->nama_kajur,
            'nip_kajur'    => $this->mastermodel->get_by_id($nim)->nip_kajur,
            'validation'    => \Config\Services::validation(),
            'cekData'       => $this->mastermodel->getKRS($thn_akademik, $semester, $nim)
        );
        return view('index', $data);
    }

    function cetakkhs($nim, $semester, $thn_akademik){
        helper('functionskor');

        $data       = array(
            'content'       => 'Master/print_khs',
            'thn_akademik'  => $thn_akademik,
            'semester'      => $semester,
            'nim'           => $nim,
            'nama_pro'      => $this->mastermodel->get_by_id($nim)->nama_pro,
            'nama'          => $this->mastermodel->get_by_id($nim)->nama,
            'nama_kajur'    => $this->mastermodel->get_by_id($nim)->nama_kajur,
            'nip_kajur'    => $this->mastermodel->get_by_id($nim)->nip_kajur,
            'validation'    => \Config\Services::validation(),
            'cekData'       => $this->mastermodel->getKRS($thn_akademik, $semester, $nim)
        );
        return view('cetakks', $data);
    }

    // TN (Transkip Nilai)
    function transkip(){
        $data = array(
            'content'        => 'Master/master_transkip',
            'thnkrs'           => $this->mastermodel->getMasterTahunAkademik(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function caridataTN(){
        helper('functionskor');

        if(!$this->validate([
            'nim'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/transkip')->withInput()->with('validation', $validation);
        }

        $nim            = $this->request->getVar('nim');
        if($this->mastermodel->get_by_id($nim)==null){
        session()->setFlashdata('pesan', 'NIM belum ditambahkan');
        return redirect()->to('master/transkip');       
        }

        $data       = array(
            'content'       => 'Master/master_transkip2',
            'nim'           => $nim,
            'nama_pro'      => $this->mastermodel->get_by_id($nim)->nama_pro,
            'nama_jur'      => $this->mastermodel->get_by_id($nim)->nama_jur,
            'nama'          => $this->mastermodel->get_by_id($nim)->nama,
            'nama_kajur'    => $this->mastermodel->get_by_id($nim)->nama_kajur,
            'nip_kajur'    => $this->mastermodel->get_by_id($nim)->nip_kajur,
            'validation'    => \Config\Services::validation(),
            'cekData'       => $this->mastermodel->getTN($nim)
        );
        return view('index', $data);
    }

    function cetakTN($nim){
        helper('functionskor');

        $data       = array(
            'content'       => 'Master/print_transkip',
            'nim'           => $nim,
            'nama_pro'      => $this->mastermodel->get_by_id($nim)->nama_pro,
            'nama_jur'      => $this->mastermodel->get_by_id($nim)->nama_jur,
            'nama'          => $this->mastermodel->get_by_id($nim)->nama,
            'nama_kajur'    => $this->mastermodel->get_by_id($nim)->nama_kajur,
            'nip_kajur'    => $this->mastermodel->get_by_id($nim)->nip_kajur,
            'validation'    => \Config\Services::validation(),
            'cekData'       => $this->mastermodel->getTN($nim)
        );
        return view('cetakks', $data);
    }

    //IN (INPUT NILAI)
    function tabelmasterIN(){
        $data = array(
            'content'        => 'Master/tabel_inputnilai',
            'mhs9'           => $this->mastermodel->getMasterKRS(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function inputnilai(){
        $data = array(
            'content'        => 'Master/master_inputnilai',
            'matkulkrs'         => $this->mastermodel->getMasterMatkul(),
            'thnkrs'           => $this->mastermodel->getMasterTahunAkademik(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function caridataIN(){
        if(!$this->validate([
            'thn_akademik'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'semester'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'kode_matkul'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/inputnilai')->withInput()->with('validation', $validation);
        }
        
        $thn_akademik   = $this->request->getVar('thn_akademik');
        $semester       = $this->request->getVar('semester');
        $kode_matkul    = $this->request->getVar('kode_matkul');
        if($this->mastermodel->get_by_idinputnilai($kode_matkul)==null){
        session()->setFlashdata('pesan', 'Mata kuliah belum ditambahkan');
        return redirect()->to('master/inputnilai');       
        }

        $data       = array(
            'content'       => 'Master/master_inputnilai2',
            'thn_akademik'  => $thn_akademik,
            'semester'      => $semester,
            'kode_matkul'   => $kode_matkul,
            'nama_matkul'   => $this->mastermodel->get_by_idinputnilai($kode_matkul)->nama_matkul,
            'sks'           => $this->mastermodel->get_by_idinputnilai($kode_matkul)->sks,
            'validation'    => \Config\Services::validation(),
            'cekDatamatkul' => $this->mastermodel->getIN($thn_akademik, $semester, $kode_matkul)
        );
        return view('index', $data);
    }

    function editIN($id_krs){
        $data = array(
            'content'           => 'Master/edit_forminputnilai',
            'id_krs'            => $id_krs,
            'krsloop'           => $this->mastermodel->getKRSById($id_krs),
            'thnkrs'            => $this->mastermodel->getMasterTahunAkademik(),
            'nimkrs'            => $this->mastermodel->getMasterMhs(),
            'matkulkrs'         => $this->mastermodel->getMasterMatkul(),
            'validation'        => \Config\Services::validation()

        );
        return view('index', $data);
    }

    function editsubmitformIN($id_krs){
        if(!$this->validate([
            'thn_akademik'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
             'semester'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nim'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'kode_matkul'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nilai'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $thn_akademik   = $this->request->getVar('thn_akademik');
        $semester       = $this->request->getVar('semester');
        $kode_matkul    = $this->request->getVar('kode_matkul');
        $nilai            = $this->request->getVar('nilai');

        if($nilai>=85) { echo $nilai = 'A';}
        elseif ($nilai<85 && $nilai>=75) {echo $nilai = 'B';}
        elseif ($nilai<75 && $nilai>=65) {echo $nilai = 'C';}
        elseif ($nilai<65 && $nilai>55) {echo $nilai = 'D';}
        else {echo $nilai='E';}

        $data = array(
           'thn_akademik'   => $this->request->getVar('thn_akademik'),
           'semester'       => $this->request->getVar('semester'),
           'nim'            => $this->request->getVar('nim'),
           'kode_matkul'    => $this->request->getVar('kode_matkul'),
           'nilai'          => $this->request->getVar('nilai'),
           'huruf'          => $nilai
        );
        $this->mastermodel->updateKRS($data, array('id_krs' => $id_krs));
        session()->setFlashdata('pesan', 'Data berhasil diperbarui');
        return redirect()->to('master/tabelIN/'.$thn_akademik.'/'.$semester.'/'.$kode_matkul);
    }

    function tabelIN($thn_akademik, $semester, $kode_matkul){
        $data       = array(
            'content'       => 'Master/master_inputnilai2',
            'thn_akademik'  => $thn_akademik,
            'semester'      => $semester,
            'kode_matkul'   => $kode_matkul,
            'nama_matkul'   => $this->mastermodel->get_by_idinputnilai($kode_matkul)->nama_matkul,
            'sks'           => $this->mastermodel->get_by_idinputnilai($kode_matkul)->sks,
            'validation'    => \Config\Services::validation(),
            'cekDatamatkul' => $this->mastermodel->getIN($thn_akademik, $semester, $kode_matkul)
        );
        return view('index', $data);
    }

    // ABSEN
    function absen(){
        $data = array(
            'content'   => 'Master/master_absen',
            'mhs5'      => $this->mastermodel->getMasterAbsen(),
            'nimabsen'   => $this->mastermodel->getMasterMhs(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function grafikabsen(){
        $data = array(
            'content'   => 'Master/grafiktransaksi'
        );
        return view('index', $data);
    }

    function grafikabsen2(){
        $data = array(
            'range' => $this->request->getVar('range') == "" ? "" : $this->request->getVar('range'),
            'content'           => 'Master/grafiktransaksi2',
            'graftipemhs'       => $this->mastermodel->getTipeMhs($this->request->getVar('range')),
            'grafmasukwil'      => $this->mastermodel->getGrafMasukWil($this->request->getVar('range')),
            'grafkeluarwil'     => $this->mastermodel->getGrafKeluarWil($this->request->getVar('range')),
            'grafmasukjur'      => $this->mastermodel->getGrafMasukJur($this->request->getVar('range')),
            'grafkeluarjur'     => $this->mastermodel->getGrafKeluarJur($this->request->getVar('range')),
            'grafmasukpro'      => $this->mastermodel->getGrafMasukPro($this->request->getVar('range')),
            'grafkeluarpro'     => $this->mastermodel->getGrafKeluarPro($this->request->getVar('range')),
        );
        return view('index', $data);
    }

    function simpanAbsen(){
        if(!$this->validate([
            'tanggal'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nim'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'tipe'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'jam'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/absen')->withInput()->with('validation', $validation);
        }

        $tanggal    = $this->request->getVar('tanggal');
        $nim        = $this->request->getVar('nim');
        $tipe       = $this->request->getVar('tipe');
        $jam        = $this->request->getVar('jam');
        $data       = [
            'tanggal'   => $tanggal,
            'nim'       => $nim,
            'tipe'      => $tipe,
            'jam'       => $jam
        ];
        $this->mastermodel->addAbsen($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('master/absen');
    }

    function hapusAbsen(){
        $this->mastermodel->deleteAbsen(array('id_absen' => $this->request->getVar('id_absen')));
    }

    function editAbsen($id_absen){
        $data = array(
            'content'       => 'Master/edit_absen',
            'id_absen'      => $id_absen,
            'absenloop'     => $this->mastermodel->getAbsenById($id_absen),
            'nimabsen'   => $this->mastermodel->getMasterMhs(),
            'mhs5'          => $this->mastermodel->getMasterAbsen()

        );
        return view('index', $data);
    }

    function editsubmitAbsen($id_absen){
        $data = array(
           'tanggal'    => $this->request->getVar('tanggal'),
           'nim'        => $this->request->getVar('nim'),
           'tipe'       => $this->request->getVar('tipe'),
           'jam'        => $this->request->getVar('jam')
        );
        $this->mastermodel->updateAbsen($data, array('id_absen' => $id_absen));
        session()->setFlashdata('pesan', 'Data berhasil diperbarui');
        return redirect()->to('master/absen');
    }

    // SPP
    function spp(){
        $data = array(
            'content'   => 'Master/master_spp',
            'mhs5'      => $this->mastermodel->getMasterSpp(),
            'nimspp'   => $this->mastermodel->getMasterMhs(),
            'validation'     => \Config\Services::validation()
        );
        return view('index', $data);
    }

    function grafikspp(){
        $data = array(
            'content'   => 'Master/grafikspp'
        );
        return view('index', $data);
    }

    function grafikspp2(){
        $data = array(
            'range' => $this->request->getPost('range') == "" ? "" : $this->request->getPost('range'),
            'content'           => 'Master/grafikspp2',
            'grafsppmhs'       => $this->mastermodel->getTipeSpp($this->request->getVar('range')),
            'grafsppmhs2'       => $this->mastermodel->getTipeJumSpp($this->request->getVar('range')),
        );
        return view('index', $data);
    }

    function simpanSpp(){
        if(!$this->validate([
            'tanggal'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'nim'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'tipe'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'jumlah_spp'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('master/spp')->withInput()->with('validation', $validation);
        }

        $tanggal    = $this->request->getVar('tanggal');
        $nim        = $this->request->getVar('nim');
        $tipe       = $this->request->getVar('tipe');
        $jumlah_spp = $this->request->getVar('jumlah_spp');
        $data       = [
            'tanggal'       => $tanggal,
            'nim'           => $nim,
            'tipe'          => $tipe,
            'jumlah_spp'    => $jumlah_spp
        ];
        $this->mastermodel->addSpp($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('master/spp');
    }

    function hapusSpp(){
        $this->mastermodel->deleteSpp(array('id_spp' => $this->request->getVar('id_spp')));
    }

    function editSpp($id_spp){
        $data = array(
            'content'       => 'Master/edit_spp',
            'id_spp'        => $id_spp,
            'spploop'       => $this->mastermodel->getSppById($id_spp),
            'nimspp'        => $this->mastermodel->getMasterMhs(),
            'mhs5'          => $this->mastermodel->getMasterSpp()

        );
        return view('index', $data);
    }

    function editsubmitSpp($id_spp){
        $data = array(
           'tanggal'    => $this->request->getVar('tanggal'),
           'nim'        => $this->request->getVar('nim'),
           'tipe'       => $this->request->getVar('tipe'),
           'jumlah_spp' => $this->request->getVar('jumlah_spp')
        );
        $this->mastermodel->updateSpp($data, array('id_spp' => $id_spp));
        session()->setFlashdata('pesan', 'Data berhasil diperbarui');
        return redirect()->to('master/spp');
    }
}
?>