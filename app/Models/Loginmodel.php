<?php

namespace App\Models;

use CodeIgniter\Model;

class Loginmodel extends Model {

    protected $db;

    function __construct() {
        $this->db = db_connect();
    }

    // LOGIN
    function getlogin($data){
        $builder    = $this->db->table("users");
        $builder->where($data);
        $query      = $builder->get();
        return $query->getRow();
        // $log = $builder->get()->getRow();
        // return $log;
    }

    function addLogin($data){
        return $this->db->table('users')->insert($data);
    }
    
}
