<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lelang;


class LelangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['sidebar'] = 'lelang';
        $data['lelang'] = Lelang::join('barangs','barangs.id_barang','=','lelangs.id_barang')->leftJoin('users','users.id','=','lelangs.id')->get();
        return view('admin.page.lelang.lelang',$data);
    }
    public function confirm_status($id_lelang)
    {
        $status = request()->status;
    
        if($status == 'dibuka'){
            $status = 'ditutup';
        }else{
            $status = 'dibuka';
        }
        $data = [
            'status' => $status
        ];
        Lelang::where('id_lelang',$id_lelang)->update($data);
        return redirect()->back();
    }
}
