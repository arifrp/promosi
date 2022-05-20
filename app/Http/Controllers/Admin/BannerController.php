<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function read(){
        $banner = DB::table('banner')->orderBy('id','DESC')->get();
        return view('admin.banner.index',['banner'=>$banner]);
    }

    public function add(){
    	return view('admin.banner.tambah');
    }

    public function create(Request $request){
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ]);

        DB::table('banner')->insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->file('foto')->store('public/asset-admin/images/banner'),
        ]);

        return redirect('/admin/banner')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $banner= DB::table('banner')->where('id',$id)->first();
        return view('admin.banner.detail',['banner'=>$banner]);
    }

    public function edit($id){
        $banner= DB::table('banner')->where('id',$id)->first();
        return view('admin.banner.edit',['banner'=>$banner]);
    }

    public function update(Request $request, $id) {
        DB::table('banner')
            ->where('id', $id)
            ->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
        ]);

        return redirect('/admin/banner')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $banner= DB::table('banner')->where('id',$id)->first();
        DB::table('banner')->where('id',$id)->delete();

        return redirect('/admin/banner')->with("success","Data Berhasil Didelete !");
    }
}
