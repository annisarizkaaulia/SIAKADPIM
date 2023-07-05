<?php

namespace App\Models;

use CodeIgniter\Model;

class Mastermodel extends Model {

    protected $db;

    function __construct() {
        $this->db = db_connect();
    }

    // WILAYAH
    function getMasterWilayah(){
        $builder    = $this->db->table("master_wilayah");
        $query      = $builder->get();
        return $query->getResult();
    }

    function addWilayah($data){
        return $this->db->table('master_wilayah')->insert($data);
    }

    function deleteWilayah($data){
        $builder    = $this->db->table('master_wilayah');
        $builder->where($data);
        $builder->delete();
    }

    function getWilayahById($id_wilayah){
        $builder    = $this->db->table("master_wilayah");
        $builder->where(array('id_wilayah' => $id_wilayah));
        $query      = $builder->get();
        return $query->getRow();
    }

    function updateWilayah($data, $where){
        $builder    = $this->db->table('master_wilayah');
        $builder->set($data);
        $builder->where($where);
        $builder->update();
    }

    // MAHASISWA
    function getMhsGrafik(){ //grafik mahasiswa
        $array = array();
        $sql = "SELECT ms.nama_wilayah, 
        COUNT(mhs.id_mhs) AS jumlah_mahasiswa 
        FROM mahasiswa mhs 
        JOIN master_wilayah ms ON mhs.id_wilayah=ms.id_wilayah 
        GROUP BY nama_wilayah";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){
            $array["nama_wilayah"][] = $row->nama_wilayah;
            $array["jumlah_mahasiswa"][] = $row->jumlah_mahasiswa;
        }
        return $array;
    }

    function getJurGrafik(){ //grafik jurusan
        $array = array();
        $sql = "SELECT jur.nama_jur, COUNT(mhs.id_mhs) AS jumlah_mahasiswa 
        FROM mahasiswa mhs 
        JOIN prodi pro ON mhs.kode_pro=pro.kode_pro 
        JOIN jurusan jur ON pro.kode_jur=jur.kode_jur 
        GROUP BY nama_jur";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){
            $array["nama_jur"][] = $row->nama_jur;
            $array["jumlah_mahasiswa"][] = $row->jumlah_mahasiswa;
        }
        return $array;
    }

    function getProGrafik(){ //grafik prodi
        $array = array();
        $sql = "SELECT jur.nama_jur, COUNT(pro.kode_pro) AS jumlah_mahasiswa 
        FROM prodi pro 
        JOIN jurusan jur ON pro.kode_jur=jur.kode_jur 
        GROUP BY nama_jur";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){
            $array["nama_jur"][] = $row->nama_jur;
            $array["jumlah_mahasiswa"][] = $row->jumlah_mahasiswa;
        }
        return $array;
    }

    function getMasterMhs(){
        $builder    = $this->db->table("mahasiswa mhs");
        $builder->orderBy("id_mhs DESC");
        $builder->join('master_wilayah ms', 'mhs.id_wilayah = ms.id_wilayah');
        $builder->join('prodi pro', 'mhs.kode_pro = pro.kode_pro');
        $builder->join('jurusan jur', 'pro.kode_jur = jur.kode_jur');
        $query = $builder->get();
        return $query->getResult();
    }

    function addMhs($data){
        return $this->db->table('mahasiswa')->insert($data);
    }


    function deleteMhs($data){
        $builder    = $this->db->table('mahasiswa');
        $builder->where($data);
        $builder->delete();
    }

    function getMhsById($id_mhs){
        $builder    = $this->db->table("mahasiswa");
        $builder->where(array('id_mhs' => $id_mhs));
        $query      = $builder->get();
        return $query->getRow();
    }

    function updateMhs($data, $where){
        $builder    = $this->db->table('mahasiswa');
        $builder->set($data);
        $builder->where($where);
        $builder->update();
    }

    // JURUSAN
    function getMasterJurusan(){
        $builder    = $this->db->table("jurusan");
        $query      = $builder->get();
        return $query->getResult();
    }

    function addJurusan($data){
        return $this->db->table('jurusan')->insert($data);
    }

    function deleteJurusan($data){
        $builder    = $this->db->table('jurusan');
        $builder->where($data);
        $builder->delete();
    }

    function getJurusanById($id_jur){
        $builder    = $this->db->table("jurusan");
        $builder->where(array('id_jur' => $id_jur));
        $query      = $builder->get();
        return $query->getRow();
    }

    function updateJurusan($data, $where){
        $builder    = $this->db->table('jurusan');
        $builder->set($data);
        $builder->where($where);
        $builder->update();
    }

    // PRODI
    function getMasterProdi(){
        $builder    = $this->db->table("prodi pro");
        $builder->orderBy("id_pro DESC");
        $builder->join('jurusan jur', 'pro.kode_jur = jur.kode_jur');
        $query = $builder->get();
        return $query->getResult();
    }

    function addProdi($data){
        return $this->db->table('prodi')->insert($data);
    }

    function deleteProdi($data){
        $builder    = $this->db->table('prodi');
        $builder->where($data);
        $builder->delete();
    }

    function getProdiById($id_pro){
        $builder    = $this->db->table("prodi");
        $builder->where(array('id_pro' => $id_pro));
        $query      = $builder->get();
        return $query->getRow();
    }

    function updateProdi($data, $where){
        $builder    = $this->db->table('prodi');
        $builder->set($data);
        $builder->where($where);
        $builder->update();
    }

    // MATA KULIAH
    function getMasterMatkul(){
        $builder    = $this->db->table("matakul mk");
        $builder->orderBy("id_matkul DESC");
        $builder->join('prodi pro', 'mk.kode_pro = pro.kode_pro');
        $query = $builder->get();
        return $query->getResult();
    }

    function addMatkul($data){
        return $this->db->table('matakul')->insert($data);
    }

    function deleteMatkul($data){
        $builder    = $this->db->table('matakul');
        $builder->where($data);
        $builder->delete();
    }

    function getMatkulById($id_matkul){
        $builder    = $this->db->table("matakul");
        $builder->where(array('id_matkul' => $id_matkul));
        $query      = $builder->get();
        return $query->getRow();
    }

    function updateMatkul($data, $where){
        $builder    = $this->db->table('matakul');
        $builder->set($data);
        $builder->where($where);
        $builder->update();
    }

    // TAHUN AKADEMIK
    function getMasterTahunAkademik(){
        $builder    = $this->db->table("tahun_akademik ta");
        $builder->orderBy("id_thn DESC");
        $query = $builder->get();
        return $query->getResult();
    }

    function addTahunAkademik($data){
        return $this->db->table('tahun_akademik')->insert($data);
    }

    function deleteTahunAkademik($data){
        $builder    = $this->db->table('tahun_akademik');
        $builder->where($data);
        $builder->delete();
    }

    function getTahunAkademikById($id_thn){
        $builder    = $this->db->table("tahun_akademik");
        $builder->where(array('id_thn' => $id_thn));
        $query      = $builder->get();
        return $query->getRow();
    }

    function updateTahunAkademik($data, $where){
        $builder    = $this->db->table('tahun_akademik');
        $builder->set($data);
        $builder->where($where);
        $builder->update();
    }

    // KRS
    function getMasterKRS(){
        $builder    = $this->db->table("krs krs");
        $builder->join('matakul mk', 'mk.kode_matkul = krs.kode_matkul');
        $builder->join('prodi pro', 'mk.kode_pro = pro.kode_pro');
        $builder->join('mahasiswa mhs', 'mhs.nim = krs.nim');
        $builder->orderBy("id_krs DESC");
        $query = $builder->get();
        return $query->getResult();
    }

    function get_by_id($nim){
        $builder    = $this->db->table("mahasiswa mhs");
        $builder->join('prodi pro', 'pro.kode_pro = mhs.kode_pro');
        $builder->join('jurusan jur', 'jur.kode_jur = pro.kode_jur');
        $builder->where(array('nim' => $nim));
        $query      = $builder->get();
        return $query->getRow();
    }

    function get_by_idinputnilai($kode_matkul){
        $builder    = $this->db->table("matakul");
        $builder->where(array('kode_matkul' => $kode_matkul));
        $query      = $builder->get();
        return $query->getRow();
    }

    function getKRS($thn_akademik, $semester, $nim){
        $builder    = $this->db->table('krs krs');
        $builder->join('matakul mk', 'mk.kode_matkul = krs.kode_matkul');
        // $builder->join('prodi pro', 'pro.kode_pro = mk.kode_pro');
        // $builder->join('jurusan jur', 'jur.kode_jur = pro.kode_jur');
        $builder->where('thn_akademik', $thn_akademik);
        $builder->where('semester', $semester);
        $builder->where('nim', $nim);
        $builder->orderBy("id_krs DESC");
        $query = $builder->get();
        return $query->getResult();
    }

    function addKRS($data){
        return $this->db->table('krs')->insert($data);
    }

    function deleteKRS($data){
        $builder    = $this->db->table('krs');
        $builder->where($data);
        $builder->delete();
    }

    function getKRSById($id_krs){
        $builder    = $this->db->table("krs");
        $builder->where(array('id_krs' => $id_krs));
        $query      = $builder->get();
        return $query->getRow();
    }

    function updateKRS($data, $where){
        $builder    = $this->db->table('krs');
        $builder->set($data);
        $builder->where($where);
        $builder->update();
    }

    //TRANSKIP NILAI
    function getTN($nim){
        $builder    = $this->db->table('krs krs');
        $builder->join('matakul mk', 'mk.kode_matkul = krs.kode_matkul');
        $builder->where('nim', $nim);
        $builder->orderBy("id_krs DESC");
        $query = $builder->get();
        return $query->getResult();
    }

    //INPUT NILAI
    function getIN($thn_akademik, $semester, $kode_matkul){
        $builder    = $this->db->table('krs krs');
        $builder->join('mahasiswa mhs', 'mhs.nim = krs.nim');
        $builder->where('thn_akademik', $thn_akademik);
        $builder->where('semester', $semester);
        $builder->where('kode_matkul', $kode_matkul);
        $builder->orderBy("id_krs DESC");
        $query = $builder->get();
        return $query->getResult();
    }


    // ABSEN
    function getMasterAbsen(){
        $builder    = $this->db->table("absen absn");
        $builder->join('mahasiswa mhs', 'mhs.nim = absn.nim');
        $query      = $builder->get();
        return $query->getResult();
    }

    function getTipeMhs($range){
        $daterange = explode(" ", $range);
        // echo ($daterange)[2];
        $startdate = date("Y-m-d", strtotime($daterange[0]));
        $enddate = date("Y-m-d", strtotime($daterange[2]));

        $array = array();
        $sql = "SELECT absn.tipe, COUNT(mhs.id_mhs) AS jumlah_mahasiswa 
        FROM mahasiswa mhs 
        JOIN absen absn ON mhs.nim=absn.nim 
        WHERE tanggal BETWEEN '$startdate' AND '$enddate' GROUP BY tipe";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){
            $array["tipe"][] = $row->tipe == 1 ? "Keluar" : "Masuk";
            $array["jumlah_mahasiswa"][] = $row->jumlah_mahasiswa;
        }
        // print_r ($array);
        return $array;
    }

    function getGrafMasukWil($range){
        $daterange = explode(" ", $range);
        $startdate = date("Y-m-d", strtotime($daterange[0]));
        $enddate = date("Y-m-d", strtotime($daterange[2]));

        $array = array();
        $sql = "SELECT absn.tipe, ms.nama_wilayah, COUNT(mhs.id_mhs) AS jumlah_mahasiswa FROM mahasiswa mhs 
        JOIN absen absn ON mhs.nim=absn.nim 
        JOIN master_wilayah ms ON mhs.id_wilayah=ms.id_wilayah 
        WHERE tanggal 
        BETWEEN '$startdate' AND '$enddate' AND tipe = '1' 
        GROUP BY nama_wilayah";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){
            $array["nama_wilayah"][] = $row->nama_wilayah;
            $array["jumlah_mahasiswa"][] = $row->jumlah_mahasiswa;
        }
        return $array;
    }

    function getGrafKeluarWil($range){
        $daterange = explode(" ", $range);
        $startdate = date("Y-m-d", strtotime($daterange[0]));
        $enddate = date("Y-m-d", strtotime($daterange[2]));

        $array = array();
        $sql = "SELECT absn.tipe, ms.nama_wilayah, COUNT(mhs.id_mhs) AS jumlah_mahasiswa 
        FROM mahasiswa mhs 
        JOIN absen absn ON mhs.nim=absn.nim 
        JOIN master_wilayah ms ON mhs.id_wilayah=ms.id_wilayah 
        WHERE tanggal BETWEEN '$startdate' AND '$enddate' AND tipe = '2' 
        GROUP BY nama_wilayah";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){
            $array["nama_wilayah"][] = $row->nama_wilayah;
            $array["jumlah_mahasiswa"][] = $row->jumlah_mahasiswa;
        }
        return $array;
    }

    function getGrafMasukJur($range){
        $daterange = explode(" ", $range);
        $startdate = date("Y-m-d", strtotime($daterange[0]));
        $enddate = date("Y-m-d", strtotime($daterange[2]));

        $array = array();
        $sql = "SELECT absn.tipe, jur.nama_jur, COUNT(mhs.id_mhs) AS jumlah_mahasiswa FROM mahasiswa mhs 
        JOIN absen absn ON mhs.nim=absn.nim 
        JOIN prodi pro ON mhs.kode_pro=pro.kode_pro 
        JOIN jurusan jur ON pro.kode_jur=jur.kode_jur 
        WHERE tanggal BETWEEN '$startdate' AND '$enddate' AND tipe = '1' 
        GROUP BY nama_jur";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){            
            $array["nama_jur"][] = $row->nama_jur;
            $array["jumlah_mahasiswa"][] = $row->jumlah_mahasiswa;
        }
        return $array;
    }

    function getGrafKeluarJur($range){
        $daterange = explode(" ", $range);
        $startdate = date("Y-m-d", strtotime($daterange[0]));
        $enddate = date("Y-m-d", strtotime($daterange[2]));

        $array = array();
        $sql = "SELECT absn.tipe, jur.nama_jur, COUNT(mhs.id_mhs) AS jumlah_mahasiswa FROM mahasiswa mhs 
        JOIN absen absn ON mhs.nim=absn.nim 
        JOIN prodi pro ON mhs.kode_pro=pro.kode_pro 
        JOIN jurusan jur ON pro.kode_jur=jur.kode_jur 
        WHERE tanggal BETWEEN '$startdate' AND '$enddate' AND tipe = '2' 
        GROUP BY nama_jur";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){
            $array["nama_jur"][] = $row->nama_jur;
            $array["jumlah_mahasiswa"][] = $row->jumlah_mahasiswa;
        }
        return $array;
    }

    function getGrafMasukPro($range){
        $daterange = explode(" ", $range);
        $startdate = date("Y-m-d", strtotime($daterange[0]));
        $enddate = date("Y-m-d", strtotime($daterange[2]));

        $array = array();
        $sql = "SELECT absn.tipe, pro.nama_pro, COUNT(mhs.id_mhs) AS jumlah_mahasiswa 
        FROM mahasiswa mhs 
        JOIN absen absn ON mhs.nim=absn.nim 
        JOIN prodi pro ON mhs.kode_pro=pro.kode_pro 
        WHERE tanggal BETWEEN '$startdate' AND '$enddate' AND tipe = '1' 
        GROUP BY nama_pro";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){
            $array["nama_pro"][] = $row->nama_pro;
            $array["jumlah_mahasiswa"][] = $row->jumlah_mahasiswa;
        }
        return $array;
    }

    function getGrafKeluarPro($range){
        $daterange = explode(" ", $range);
        $startdate = date("Y-m-d", strtotime($daterange[0]));
        $enddate = date("Y-m-d", strtotime($daterange[2]));

        $array = array();
        $sql = "SELECT absn.tipe, pro.nama_pro, COUNT(mhs.id_mhs) AS jumlah_mahasiswa 
        FROM mahasiswa mhs 
        JOIN absen absn ON mhs.nim=absn.nim 
        JOIN prodi pro ON mhs.kode_pro=pro.kode_pro 
        WHERE tanggal BETWEEN '$startdate' AND '$enddate' AND tipe = '2' 
        GROUP BY nama_pro";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){
            $array["nama_pro"][] = $row->nama_pro;
            $array["jumlah_mahasiswa"][] = $row->jumlah_mahasiswa;
        }
        return $array;
    }

    function addAbsen($data){
        return $this->db->table('absen')->insert($data);
    }

    function deleteAbsen($data){
        $builder    = $this->db->table('absen');
        $builder->where($data);
        $builder->delete();
    }

    function getAbsenById($id_absen){
        $builder    = $this->db->table("absen");
        $builder->where(array('id_absen' => $id_absen));
        $query      = $builder->get();
        return $query->getRow();
    }

    function updateAbsen($data, $where){
        $builder    = $this->db->table('absen');
        $builder->set($data);
        $builder->where($where);
        $builder->update();
    }

    // SPP
    function getMasterSpp(){
        $builder    = $this->db->table("spp spp");
        $builder->join('mahasiswa mhs', 'mhs.nim = spp.nim');
        $builder->orderBy("id_spp DESC");
        $query      = $builder->get();
        return $query->getResult();
    }

    function getTipeSpp($range){
        $daterange = explode(" ", $range);
        // echo ($daterange)[2];
        $startdate = date("Y-m-d", strtotime($daterange[0]));
        $enddate = date("Y-m-d", strtotime($daterange[2]));

        $array = array();
        $sql = "SELECT spp.tipe, COUNT(mhs.id_mhs) AS jumlah_mahasiswa 
        FROM mahasiswa mhs 
        JOIN spp spp ON mhs.nim=spp.nim 
        WHERE tanggal BETWEEN '$startdate' AND '$enddate' GROUP BY tipe";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){
            $array["tipe"][] = $row->tipe == 1 ? "Kredit" : "Debet";
            $array["jumlah_mahasiswa"][] = $row->jumlah_mahasiswa;
        }
        // print_r ($array);
        return $array;
    }

    function getTipeJumSpp($range){
        $daterange = explode(" ", $range);
        // echo ($daterange)[2];
        $startdate = date("Y-m-d", strtotime($daterange[0]));
        $enddate = date("Y-m-d", strtotime($daterange[2]));

        $array = array();
        $sql = "SELECT spp.tipe, SUM(spp.jumlah_spp) AS jumlah_SPP 
        FROM mahasiswa mhs 
        JOIN spp spp ON mhs.nim=spp.nim 
        WHERE tanggal BETWEEN '$startdate' AND '$enddate' GROUP BY tipe";
        $query = $this->db->query($sql);

        foreach($query->getResult() as $row){
            $array["tipe"][] = $row->tipe == 1 ? "Kredit" : "Debet";
            $array["jumlah_SPP"][] = $row->jumlah_SPP;
        }
        // print_r ($array);
        return $array;
    }

    function addSpp($data){
        return $this->db->table('spp')->insert($data);
    }

    function deleteSpp($data){
        $builder    = $this->db->table('spp');
        $builder->where($data);
        $builder->delete();
    }

    function getSppById($id_spp){
        $builder    = $this->db->table("spp");
        $builder->where(array('id_spp' => $id_spp));
        $query      = $builder->get();
        return $query->getRow();
    }

    function updateSpp($data, $where){
        $builder    = $this->db->table('spp');
        $builder->set($data);
        $builder->where($where);
        $builder->update();
    }
    
}
