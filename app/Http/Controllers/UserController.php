<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
}


    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
    
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
    
        return view('create_user', $data);
    }

   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:10',
        'kelas_id' => 'required|integer',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $fotoPath = 'upload/img/img.jpg'; 

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        // Menyimpan file foto di folder 'uploads'
        $fotoPath = $foto->move('upload/img', $foto->getClientOriginalName());
    } else {
        // Jika tidak ada file yang diupload, set fotoPath menjadi null
        $fotoPath = 'upload/img/pp.jpg';
    }

    $this->userModel->create([
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas_id'),
        'foto' => $fotoPath, // Menyimpan path foto
    ]);

    return redirect()->to('/user');
}

public function profile($id)
{
    $user = $this->userModel::find($id);
    if (!$user) {
        return redirect()->route('user.create')->with('error', 'User not found');
    }

    return view('profile', [
        'nama' => $user->nama,
        'npm' => $user->npm,
        'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
    ]);
}

public function show($id)
{
    $user = $this->userModel->getUser($id);

    $data = [
        'title' => 'profile',
        'user' => $user,
    ];

    // Mengembalikan view profile dengan data user
    return view('profile', [
        'nama' => $user->nama,
        'npm' => $user->npm,
        'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan', // Menggunakan operator null coalescing
        'foto' => $user->foto ?? 'upload/img/pp.jpg'
    ]);
}


}