<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function tampil(string $id){
        return Product::where('id', $id)->first();
    }
    public function create(Request $req){
        $req->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'qty' => 'required|integer'
        ]);
        try{
            DB::beginTransaction();
            $lastUn = Product::latest()->first();
            $lastIdUn = $lastUn ? intval(substr($lastUn->unique, 3)) : 0;
            $newIUn = $lastIdUn + 1;           
            $id_uniq = 'T-'. str_pad($newIUn, 4, '0', STR_PAD_LEFT);

            $product  = Product::create([
                'unique' => $id_uniq,
                'name' => $req->name,
                'price' => $req->price,
                'qty' => $req->qty,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
        }catch(\Execution $e){
            DB::rollback();
            return redirect()->back()->with('Failed', 'Gagal');
        }       
        
        return redirect()->back()->with('success', 'Berhasil menambahkan Data');
    }

    public function editan(string $id, Request $req){
        $product = Product::where('id', $id)->update([
            'name' => $req->name,
            'price' => $req->price,
            'qty' => $req->qty
        ]);

        return redirect()->back()->with('success','Berhasil Mengedit Data');
    }

    public function updatean(string $id){
        
    }

    public function hapus(string $id){
        $product = DB::table('product')->where('id', $id)->delete();
    }

    public function fibbonaci(Request $req){
        $fibbon = $req->all();

        $sequence = [0,1];
        for ($i=2; $i < $fibbon; $i++) { 
            $sequence[] =   $sequence[$i - 1] + $sequence[$i-2];
        }
        return $sequence;
    }
}
