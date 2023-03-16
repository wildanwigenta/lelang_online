<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['sidebar'] = 'user';
        $user = User::orderBy('id','asc');
        $filter_level = request()->filter_level;
        if($filter_level != NULL && $filter_level != 'all'){
            $user = $user->where('level',$filter_level);
        }   
        $data['user'] = $user->get();
        return view('admin.page.user.user',$data);
    }
    public function add_user(){
        $data['sidebar'] = 'user';
        
        return view('admin.page.user.tambah_user',$data);
    }
    public function add_data_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'level' => request()->level,
            'name' => request()->name,
            'no_telp' => request()->no_telp,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
        ];

        User::insert($data);
        return redirect()->to('/admin/user')->with('success','insert sucessfully');
    }
    public function update_user($id)
    {
        $data['sidebar'] = 'user';
        $data['user'] = User::where('id',$id)->first();
        return view('admin.page.user.edit_user',$data);
    }
    public function update_data_user()
    {
        request()->validate([
            'name' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => ['required','string','min:8','confirmed'],
        ]);

        User::where('id',request()->id)->update([
            'name' => request()->name,
            'no_telp' => request()->no_telp,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            'level' => request()->level,
        ]);
        return redirect()->to('/admin/user')->with('update','update sucessfully');
    }
    public function delete_user($id)
    {
        User::where('id',$id)->delete();
        return redirect()->to('/admin/user')->with('delete','delete sucessfully');
    }

}
