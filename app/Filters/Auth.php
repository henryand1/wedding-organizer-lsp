<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah pengguna sudah login
        if (!session()->get('logged_in')) {
            // Periksa rute saat ini
            $path = $request->uri->getPath(); // Menggunakan getPath() untuk mendapatkan path

             // Tentukan halaman login yang sesuai berdasarkan path
             $loginPage = ($this->isBacksiteGroup($path)) ? '/loginadmin' : '/login';

            // Redirect pengguna ke halaman login yang sesuai
            return redirect()->to($loginPage);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan setelah request
    }
    
    private function isBacksiteGroup($path)
    {
        $backsitePaths = [
            'backsite/index',
        ];

        return in_array($path, $backsitePaths);
    }
}
