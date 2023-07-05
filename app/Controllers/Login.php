<?php

namespace App\Controllers;

class Login extends BaseController {

    protected $loginmodel;
    protected $db;

    function __construct() {
        $this->loginmodel = new \App\Models\Loginmodel();
        $this->db = db_connect();
    }

    public function index() {
        return view('Login/loginindex');
    }

    public function submitlogin() {
            // $username           = $this->request->getVar('username');
            $email           = $this->request->getVar('email');
            $password           = $this->request->getVar('password');
            $data = [
                // 'username' => $username,
                'email' => $email,
                // 'password' => $password,
            ];
            $cekData = $this->loginmodel->getlogin($data);
            // var_dump($cekData);
            if($cekData == NULL){
                session()->setFlashdata('error', 'Username anda salah  ');
                return redirect()->to('/');
            }else{
                if(password_verify($password, $cekData->password)){
                    $data = [
                        'log' => TRUE,
                        'id_user'       => $cekData->id_user,
                        'username'      => $cekData->username,
                        'namalengkap'   => $cekData->namalengkap,
                        'email'         => $cekData->email,
                        'password'      => $cekData->password,
                    ];
                    session()->set($data);
                    session()->setFlashdata('pesan', 'Berhasil login');
                    return redirect()->to('/master');
                }else{
                    session()->setFlashdata('error', 'Password anda salah');
                    return redirect()->to('/');
                }
            }
    }

    public function register(){
        $data = array(
            'validation'    => \Config\Services::validation()
        );
        return view('Login/register', $data);
    }

    public function submitregister() {
        if(!$this->validate([
            'email'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'username'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'password'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
                ],
            'namalengkap'  =>[
                'rules'     =>'required',
                'errors'    =>[
                    'required'      =>'{field} harus diisi.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('/register')->withInput()->with('validation', $validation);
        }
        
        $email          = $this->request->getVar('email');
        $username       = $this->request->getVar('username');
        $password       = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $namalengkap    = $this->request->getVar('namalengkap');
        $data           = [
            'email'         => $email,
            'username'      => $username,
            'password'      => $password,
            'namalengkap'   => $namalengkap
        ];
        $cekData = $this->loginmodel->addLogin($data);
        session()->setFlashdata('pesan', 'Selamat anda berhasil register, silahkan login');
        return redirect()->to('/register'); 
        // var_dump($cekData);
}

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }

}
