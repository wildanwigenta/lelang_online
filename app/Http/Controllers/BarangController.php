<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Lelang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $data['sidebar'] = 'barang';
        $data['barang'] = Barang::all();
        return view('admin.page.barang.barang',$data);
    }
    public function add_barang()
    {
        $data['sidebar'] = 'barang';
        return view('admin.page.barang.tambah_barang',$data);
    }
    public function add_data_barang(Request $request)
    {
        $file = request()->image;
        $file_name = Str::random(25).'-'.$file->getClientOriginalName();
        $tujuan_upload = 'image/barang';
        $file->move($tujuan_upload,$file_name);

        $request->validate([
            'nama_barang' => 'required',
            'harga_awal' => 'required',
            'tgl' => 'required'
        ]);

        $data = [
            'nama_barang' => request()->nama_barang,
            'image' => $file_name,
            'deskripsi_barang' => request()->deskripsi_barang,
            'harga_awal' => request()->harga_awal,
            'tgl' => request()->tgl,
        ];

        Barang::insert($data);
        if(Auth::user()->level == 'admin'){
        return redirect()->to('/admin/barang')->with('success','insert sucessfully');
        }else if(Auth::user()->level == 'petugas'){
        return redirect()->to('/petugas/barang')->with('success','insert sucessfully');
        }
    }
    public function update_barang($id_barang)
    {
        $data['sidebar'] = 'barang';
        $data['barang'] = Barang::where('id_barang',$id_barang)->first();
        return view('admin.page.barang.edit_barang',$data);
    }
    public function update_data_barang(Request $request)
    {
        $file = request()->image;
        $file_name = Str::random(25).'-'.$file->getClientOriginalName();
        $tujuan_upload = 'image/barang';
        $file->move($tujuan_upload,$file_name);

        $tmp = public_path('image/barang/'.request()->old_image);
        if(file_exists($tmp)){
            unlink($tmp);
        }

        request()->validate([
            'nama_barang' => 'required',
            'harga_awal' => 'required',
            'tgl' => 'required'
        ]);

        Barang::where('id_barang',request()->id_barang)->update([
            'nama_barang' => request()->nama_barang,
            'image' => $file_name,
            'deskripsi_barang' => request()->deskripsi_barang,
            'harga_awal' => request()->harga_awal,
            'tgl' => request()->tgl,
        ]);
        if(Auth::user()->level == 'admin'){
            return redirect()->to('admin/barang')->with('update','update sucessfully');
        }else if(Auth::user()->level == 'petugas'){
            return redirect()->to('petugas/barang')->with('update','update sucessfully');
        }

    }
    public function add_barang_lelang(Request $request)
    {
        $id_barang = $request->id_barang;
        $barang = Barang::where('id_barang',$id_barang)->first();

        $data = [
            'id_barang' => request()->id_barang,
            'tgl_lelang' => now(),
            'status' => 'dibuka',
        ];

        Lelang::insert($data);
        if(Auth::user()->level == 'admin'){
        return redirect()->to('admin/barang')->with('success','insert barang lelang sucessfully');
        }
        else if(Auth::user()->level == 'petugas'){
        return redirect()->to('petugas/barang')->with('success','barang telah ditambahkan di lelang');
        }
    }
    public function delete_barang($id_barang)
    {
        $data = Barang::where('id_barang',$id_barang)->first();
        $image_path = public_path('image/barang/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        
        Barang::where('id_barang',$id_barang)->delete();

        if(Auth::user()->level == 'admin'){
            return redirect()->to('/admin/barang')->with('delete','delete sucessfully');
        }else if(Auth::user()->level == 'petugas'){
            return redirect()->to('/petugas/barang')->with('delete','delete sucessfully');
        }
    }
    
}
