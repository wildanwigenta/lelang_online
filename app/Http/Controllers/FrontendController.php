<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\HistoryLelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
    public function index()
    {
        $data['b_lelang'] = Lelang::join('barangs','barangs.id_barang','=','lelangs.id_barang')->where('status','dibuka')->get();
        return view('frontend.lelang',$data);
    }
    public function detail_lelang($id_lelang)
    {   $data['detail_lelang'] = Lelang::join('barangs','barangs.id_barang','=','lelangs.id_barang')->where('id_lelang',$id_lelang)->first();
        $data['pelelang'] = HistoryLelang::join('barangs','barangs.id_barang','=','history_lelangs.id_barang')->join('users','users.id','=','history_lelangs.id')->join('lelangs','lelangs.id_lelang','=','history_lelangs.id_lelang')->where('history_lelangs.id_lelang',$id_lelang)->orderBy('history_lelangs.penawaran_harga','DESC')->get();
        return view('frontend.detail_lelang',$data);
    }
    public function tawar_harga($id_lelang)
    {
        if(Auth::check() == NULL){
            return redirect()->to('/login');
        }
        if(Auth::user()->level != 'masyarakat'){
            return redirect()->back()->with('warning','Admin/Petugas tidak bisa melakukan penawaran');
        }
        $lelang = Lelang::join('barangs','barangs.id_barang','=','lelangs.id_barang')->where('id_lelang',$id_lelang)->first();
        if(request()->harga_akhir <= $lelang->harga_awal || request()->harga_akhir <= $lelang->harga_akhir){
            return redirect()->back()->with('warning','MAAF anda harus masukan harga lebih tinggi dari harga awal / penawaran tertinggi saat ini ');
        }
        Lelang::where('id_lelang',request()->id_lelang)->update([
            'id' => Auth::user()->id,
            'harga_akhir' => request()->harga_akhir,
        ]);
        HistoryLelang::insert([
            'id_lelang' => $id_lelang,
            'id_barang' => $lelang->id_barang,
            'id' => Auth::user()->id,
            'penawaran_harga' => request()->harga_akhir
        ]);
        return redirect()->back()->with('success','terimakasih, lihat di tabel peserta lelang untuk info selanjutnya');
    }
}
