<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthTamu implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null) {
        // jika user belum login
        
        if (session()->get('id_user')) {
            // maka redirct ke halaman login
            return redirect()->to('/master');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        // Do something here
    }

}
