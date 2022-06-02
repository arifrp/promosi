<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class ClientController extends Controller
{
    public function read(){
        $satuan = DB::table('client')->orderBy('id','DESC')->get();
        return view('admin.client.index',['satuan'=>$satuan]);
    }

    public function add(){
    	return view('admin.client.tambah');
    }

    public function create(Request $request){
        DB::table('client')->insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->file('foto')]);

        return redirect('/admin/client')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $satuan= DB::table('client')->where('id',$id)->first();
        return view('admin.client.detail',['satuan'=>$satuan]);
    }

    public function edit($id){
        $satuan= DB::table('client')->where('id',$id)->first();
        return view('admin.client.edit',['satuan'=>$satuan]);
    }

    public function update(Request $request, $id) {
        DB::table('client')
            ->where('id', $id)
            ->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi]);

        return redirect('/admin/client')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $satuan= DB::table('client')->where('id',$id)->first();
        DB::table('client')->where('id',$id)->delete();

        return redirect('/admin/client')->with("success","Data Berhasil Didelete !");
    }
}
