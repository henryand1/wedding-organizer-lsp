<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserConfigModel;
use App\Models\KatalogModel;
use App\Models\OrderModel;
use App\Models\SettingsModel;

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
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        } else {
            $id_user = session('user')['user_id'];
            $orderModel = new OrderModel();
            $orderList = $orderModel->where('user_id', $id_user)->findAll();
            $katalogModel = new KatalogModel();
            foreach ($orderList as &$order) {
                $katalog = $katalogModel->where('catalogue_id', $order['catalogue_id'])->first();
                $order['package_name'] = $katalog ? $katalog['package_name'] : 'Unknown';
            }

            $data = [
                'title' => 'List Pesanan',
                'orderItem' => $orderList
            ];
            return view('pages/frontsite/list_pesanan', $data);
        }
    }

    public function formpemesanan() 
    {
        $katalogModel = new KatalogModel();
        $katalog = $katalogModel->where('status_publish', 'Y')->findAll();

        $data = [
            'title' => 'Form Pesanan',
            'katalog'=> $katalog
        ];
        return view('pages/frontsite/form_pesanan', $data);
    }

    public function submitformpesan()
    {
        $id_user = session('user')['user_id'];
        $namaPaket = $this->request->getPost('paket');
        $nama = $this->request->getPost('nama_lengkap');
        $nomorHp = $this->request->getPost('no_hp');
        $tanggalWedding = $this->request->getPost('tanggalNikah');
        $email = $this->request->getPost('email');

        $katalogModel = new KatalogModel();

        $katalog= $katalogModel->where('package_name', $namaPaket)->first();
        $katalogId = $katalog['catalogue_id'];
    
        $dataFormPesan = [
            'catalogue_id' => $katalogId,
            'name' => $nama,
            'email' => $email,
            'phone_number'=>$nomorHp,
            'wedding_date'=>$tanggalWedding,
            'user_id' => $id_user,
            'status' => 'REQUESTED',
        ];

    
        $dataOrderModel = new OrderModel();
        if ($dataOrderModel->insert($dataFormPesan)) {
            return redirect()->to('homepage')->with('msg', 'Data successfully submitted.');
        } else {
            return redirect()->to('homepage')->with('error', 'Failed to submit data.');
        }
    }

    public function ourcontacts() 
    {
        $settingsModel = new SettingsModel();
        $settings = $settingsModel->findAll();

        $data = [
            'title' => 'Our Contacts',
            'settings' => $settings
        ];

        return view('pages/frontsite/our_contacts', $data);
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
        return redirect()->to('homepage');
    }
        $data = [
            'title' => 'Wedding Organizer | Login',
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

        if (empty($username)) {
            // If username is empty, set error message
            $validation = \Config\Services::validation();
            $validation->setError('username', 'Silakan isi username anda!');
            $session->setFlashdata('input', $this->request->getPost());
    
            $data = [
                'title' => 'Wedding Organizer | Login',
                'validation' => $validation,
                'input' => $session->getFlashdata('input')
            ];
            return view('pages/frontsite/login', $data);
        } else if (empty($password)) {
            // If password is empty, set error message
            $validation = \Config\Services::validation();
            $validation->setError('password', 'Silakan isi password anda!');
            $session->setFlashdata('input', $this->request->getPost());
    
            $data = [
                'title' => 'Wedding Organizer | Login',
                'validation' => $validation,
                'input' => $session->getFlashdata('input')
            ];
            return view('pages/frontsite/login', $data);
        }

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
        }
        return redirect()->to('/login');
    }

    public function logout()
    {
        // Hapus data session yang terkait dengan login
        session()->destroy();

        // Redirect ke halaman login atau halaman lain yang Anda inginkan
        return redirect()->to('/homepage');
    }

}
