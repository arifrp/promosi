<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProdukController extends Controller
{
    public function read(){
        $satuan = DB::table('produk')->orderBy('id','DESC')->get();
        return view('admin.produk.index',['satuan'=>$satuan]);
    }

    public function add(){
    	return view('admin.produk.tambah');
    }

    public function create(Request $request){
        DB::table('produk')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'id_satuan' => $request->id_satuan,
            'id_jenis' => $request->id_jenis,
            'foto' => $request->foto]);

        return redirect('/admin/produk')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $satuan= DB::table('produk')->where('id',$id)->first();
        return view('admin.produk.detail',['satuan'=>$satuan]);
    }

    public function edit($id){
        $satuan= DB::table('produk')->where('id',$id)->first();
        return view('admin.produk.edit',['satuan'=>$satuan]);
    }

    public function update(Request $request, $id) {
        DB::table('produk')
            ->where('id', $id)
            ->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga]);

        return redirect('/admin/produk')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $satuan= DB::table('produk')->where('id',$id)->first();
        DB::table('produk')->where('id',$id)->delete();

        return redirect('/admin/produk')->with("success","Data Berhasil Didelete !");
    }
}
