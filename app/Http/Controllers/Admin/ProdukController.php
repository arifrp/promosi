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
        $satuan= DB::table('satuan')->get();
        $jenis= DB::table('jenis')->get();
        return view('admin.produk.tambah',['satuan'=>$satuan, 'jenis'=>$jenis]);
    }

    public function create(Request $request){
        DB::table('produk')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'id_satuan' => $request->id_satuan,
            'id_jenis' => $request->id_jenis,
            'foto' => $request->file('foto')]);

        return redirect('/admin/produk')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $satuan= DB::table('produk')->where('id',$id)->first();
        return view('admin.produk.detail',['satuan'=>$satuan]);
    }

    public function edit($id){
        $satuan= DB::table('produk')->where('id',$id)->first();
        
        //$produk= DB::table('satuan')->where('id',$id)->first();
        $produk= DB::table('satuan')->find($satuan->id_satuan);        
    	$produkAll= DB::table('satuan')->where('id','!=',$produk->id)->get();

        //$jenis= DB::table('jenis')->get();
        //return view('admin.produk.edit',['satuan'=>$satuan]);
        //$satuan= DB::table('satuan')->find($satuan->id_satuan);

        //$jenis= DB::table('jenis')->where('id',$id)->first();
        $jenis= DB::table('jenis')->find($satuan->id_jenis);
        $jenisAll= DB::table('jenis')->where('id','!=',$jenis->id)->get();
     
        return view('admin.produk.edit',['satuan'=>$satuan, 'produk'=>$produk, 'produkAll'=>$produkAll, 'jenis'=>$jenis, 'jenisAll'=>$jenisAll]);
        //return view('admin.produk.edit',['satuan'=>$satuan, 'satuanAll'=>$satuanAll, 'jenis'=>$jenis, 'jenisAll'=>$jenisAll]);

    }

    public function update(Request $request, $id) {
        DB::table('produk')
            ->where('id', $id)
            ->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'id_satuan' => $request->id_satuan,
            'id_jenis' => $request->id_jenis]);

        return redirect('/admin/produk')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $satuan= DB::table('produk')->where('id',$id)->first();
        DB::table('produk')->where('id',$id)->delete();

        return redirect('/admin/produk')->with("success","Data Berhasil Didelete !");
    }
}
