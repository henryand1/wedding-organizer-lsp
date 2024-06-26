<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\UserConfigModel;
use App\Models\SettingsModel;
use App\Models\KatalogModel;
use App\Models\OrderModel;

class Admin extends BaseController
{
    public function index()
    {
        $id_user = session('user')['user_id'];

        $data = [
            'title' => 'Dashboard | Admin',
        ];
        return view('pages/backsite/index', $data);
    }

    public function laporpesanan()
    {
        $orderModel = new OrderModel();

        $orderItem = $orderModel->findAll();
        $katalogModel = new KatalogModel();
        foreach ($orderItem as &$order) {
            $katalog = $katalogModel->where('catalogue_id', $order['catalogue_id'])->first();
            $order['package_name'] = $katalog ? $katalog['package_name'] : 'Unknown';
        }

        $data = [
            'title' => 'Laporan Pesanan | Admin',
            'orderItem' => $orderItem
        ];
        return view('pages/backsite/laporan-pesanan', $data);
    }

    public function listkatalog()
    {
        $id_user = session('user')['user_id'];

        $katalogModel = new KatalogModel();

        $katalog = $katalogModel->findAll();

        $data = [
            'title' => 'Katalog | Admin',
            'katalog' => $katalog
        ];
        return view('pages/backsite/list-katalog', $data);
    }

    public function websettings()
    {
        $id_user = session('user')['user_id'];

        $settingsModel = new SettingsModel();

        $settings = $settingsModel->findAll();

        $data = [
            'title' => 'Web Settings | Admin',
            'settings' => $settings
        ];
        return view('pages/backsite/settings-web', $data);
    }

    
    public function editkatalog($id)
    {
        $id_user = session('user')['user_id'];

        $katalogModel = new KatalogModel();

        $katalog = $katalogModel->find($id);

        $data = [
            'title' => 'Edit Katalog | Admin',
            'validation' => \Config\Services::validation(),
            'katalog' => $katalog,
        ];
        return view('pages/backsite/edit-katalog', $data);
    }

    public function editpesanan($id)
    {
        $orderModel = new OrderModel();

        $order = $orderModel->find($id);

        $data = [
            'title' => 'Edit Order | Admin',
            'validation' => \Config\Services::validation(),
            'orderList' => $order,
        ];
        return view('pages/backsite/edit-katalog', $data);
    }

    public function submiteditkatalog($id)
    {
        $id_user = session('user')['user_id'];

        $katalogModel = new KatalogModel();

        $katalog = $katalogModel->find($id);

        $namaPaket = $this->request->getPost('name');
        $harga = str_replace(',', '.', $this->request->getPost('price'));
        $deskripsi = $this->request->getPost('deskripsi');
        $status = $this->request->getPost('status');
        $files = $this->request->getFiles();

        $data = [
            'title' => 'Edit Katalog | Admin',
            'katalog' => $katalog,
        ];

        $katalogData = [
            'package_name' => $namaPaket,
            'price' => $harga,
            'description' => $deskripsi,
            'user_id' => $id_user,
            'status_publish' => $status,
        ];

        if (isset($files['image'])) {
            $file = $files['image'];
            if ($files['image']->isValid() && !$files['image']->hasMoved()) {
                $newName = $files['image']->getRandomName();
                $files['image']->move(WRITEPATH . 'uploads', $newName);
        
                $katalogData['image'] = $newName;
            } else {
                return redirect()->back()->withInput()->with('error', "File upload failed for foto");
            } 
        }

        $katalogModel->update($katalog['catalogue_id'], $katalogData);
        return redirect()->to('/backsite/listkatalog');
    }

    public function submiteditorder() {
        // Check if the form was submitted
        $order_ids = $this->request->getPost('order_id'); 
        $statuses = $this->request->getPost('status'); 
        // dd($statuses);
            
        if (!empty($order_ids) && is_array($order_ids) && !empty($statuses) && is_array($statuses)) {
            // Instantiate the OrderModel
            $orderModel = new OrderModel();

            // Validate and update each order status
            foreach ($order_ids as $index => $order_id) {
                $status = $statuses[$index];
                
                // Assuming the model's update method takes the order ID and an array of data to update
                $orderModel->update($order_id, ['status' => $status]);
            }
            
            // Optionally, redirect to a success page or reload the page
            return redirect()->to('backsite/laporanpesanan');
        } else {
            // Handle case where order_ids or statuses are empty or not arrays
            return redirect()->to('backsite/dashboard');
        }
    }

    public function addkatalog()
    {
        $id_user = session('user')['user_id'];

        $data = [
            'title' => 'Tambah Katalog | Admin',
        ];
        return view('pages/backsite/add-paket', $data);
    }

    public function deletekatalog($id)
    {
        $katalogModel = new KatalogModel();

        $katalog = $katalogModel->where('catalogue_id', $id)->delete();

        $data = [
            'title' => 'Dashboard | Admin',
        ];
        return redirect()->to('/backsite/listkatalog');
    }

    public function addnewkatalog()
    {
        $id_user = session('user')['user_id'];
        $namaPaket = $this->request->getPost('nama_paket');
        $harga = str_replace(',', '.', $this->request->getPost('harga'));
        $deskripsi = $this->request->getPost('deskripsi');
        $status = $this->request->getPost('status');
        $files = $this->request->getFiles();

    
        $dataKatalog = [
            'package_name' => $namaPaket,
            'price' => $harga,
            'description' => $deskripsi,
            'user_id' => $id_user,
            'status_publish' => $status,
        ];
    
        if (isset($files['foto'])) {
            $file = $files['foto'];
            if ($file->isValid() && !$file->hasMoved()) {
                $newFileName = 'foto_' . time() . '.' . $file->getClientExtension();
                $file->move(ROOTPATH . 'public/DataKatalog', $newFileName);
                $dataKatalog['image'] = $newFileName; 
            } else {
                return redirect()->back()->withInput()->with('error', "File upload failed for foto");
            }
        }
    
        $dataKatalogModel = new KatalogModel();
        if ($dataKatalogModel->insert($dataKatalog)) {
            return redirect()->to('backsite/listkatalog')->with('msg', 'Data successfully submitted.');
        } else {
            return redirect()->to('/backsite/index')->with('error', 'Failed to submit data.');
        }
    }

    public function login() 
    {
    $session = session();
    // Periksa apakah user sudah login
    if ($session->get('logged_in')) {
        // Jika user sudah login, redirect ke halaman dashboard
        return redirect()->to('/backsite/dashboard');
    }
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation(),
            'input' => $session->getFlashdata('input')
        ];
        return view('pages/frontsite/login-admin', $data);
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
        return redirect()->to('/loginadmin');
    }
}
