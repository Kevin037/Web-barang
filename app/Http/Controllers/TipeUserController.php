<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeUser;

class TipeUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tipeuser = TipeUser::all();
        return view ('tipeuser',compact('tipeuser'));
    }

    public function edit($id)
    {
        $tipeuser = TipeUser::where('id',$id)->get();

        return view('form-edit-tipeuser',compact('tipeuser'));
    }

    public function update(Request $request, $id)
    {

        $ubah_tipe_user=TipeUser::where('id',$id)
        ->update([
            'nama_tipe' => $request->nama_tipe,
        ]);
        
        return redirect('/tipe-user')->with('toast_success', 'Tipe User berhasil diperbarui');
    }
}
