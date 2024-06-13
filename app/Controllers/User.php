<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserConfigModel;
use App\Models\KatalogModel;

class User extends BaseController
{
    public function index()
    {
        return view('pages/frontsite/homepage');
    }

    public function katalog() 
    {
        $katalogModel = new KatalogModel();

        $katalog = $katalogModel->where('status_publish', 'Y')->findAll();

        $data = [
            'title' => 'Laporan Pesanan | Admin',
            'katalog' => $katalog
        ];
        return view('pages/frontsite/katalog', $data);
    }

    public function detailKatalog($id) 
    {
        $katalogModel = new KatalogModel();
        $katalog = $katalogModel->find($id);
        return view('pages/frontsite/detail_katalog', ['katalog' => $katalog]);
    }

    public function listpesanan() 
    {
        return view('pages/frontsite/list_pesanan');
    }

    public function formpemesanan() 
    {
        return view('pages/frontsite/form_pesanan');
    }

    public function ourcontacts() 
    {
        return view('pages/frontsite/our_contacts');
    }

    public function bookOrderKatalog($id) 
    {
        $session = session();
        if ($session->get('logged_in')) {
            // Jika user sudah login, redirect ke halaman dashboard
            return redirect()->to('formpesan');
        }
        $data = [
            'title' => 'Seleksi | Login',
            'input' => $session->getFlashdata('input')
        ];
        return redirect()->to('login');
    }

    public function login() 
    {
    $session = session();
    // Periksa apakah user sudah login
    if ($session->get('logged_in')) {
        // Jika user sudah login, redirect ke halaman dashboard
        return redirect()->to('katalogOrder');
    }
        $data = [
            'title' => 'Seleksi | Login',
            'validation' => \Config\Services::validation(),
            'input' => $session->getFlashdata('input')
        ];
        return view('pages/frontsite/login', $data);
    }

    public function tombollogin()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();
    
        if ($user && password_verify($password, $user['password'])) {
            $session->set('logged_in', true);
            $session->set('user', $user);
    
            $userConfigModel = new UserConfigModel(); // Ubah nama variabel agar sesuai dengan model
            $userConfig = $userConfigModel->where('user_id', $user['user_id'])->first();
    
            if ($userConfig && $userConfig['is_admin'] == 1) { // Ganti kondisi menjadi $userConfig['is_admin'] == 1
                return redirect()->to('/backsite/dashboard');
            } else {
                return redirect()->to('/homepage');
            }
        } else {
            // Jika autentikasi gagal, kembalikan pengguna ke halaman login dengan pesan kesalahan
            $session->setFlashdata('error', 'Username atau password salah.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        // Hapus data session yang terkait dengan login
        session()->destroy();

        // Redirect ke halaman login atau halaman lain yang Anda inginkan
        return redirect()->to('/login');
    }

}
