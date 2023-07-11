<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\Transaksi_detail;
use Illuminate\Http\RedirectResponse;


use Carbon\Carbon;
use Illuminate\Support\Str;
use DataTables;
use Session;
use Validator;

class TransaksiController extends Controller
{
    //

    
    public function index(Request $request){

      // var_dump(Barang::with('category')->get()->find('f997b850-662e-4f19-b0b6-4dc33a8b9c5b'));
   
    //exit();
        if ($request->ajax()) {
           // $kurir = Kurir::with('');
           //$barang = Barang::query();
            $transaksi = Transaksi::with(['barang']);
            return  DataTables::of($transaksi)
                    ->addIndexColumn()
                 /* ->editColumn('category.nama', function($data){
                        return $data->category[0]->nama;
                    })*/
                    /*->editColumn('tgl_lahir', function($data){ 
                        return dateformat($data->tgl_lahir);
                    })*/
                    ->addColumn('action', function($row){
                           $btn = '<a class="btn btn-primary" href="/transaksi-edit/'.(isset($row->id)?$row->id:"").'" style="color:#ffff;display:inline-block;" ><i class="fa-solid fa-pen-to-square"></i> </a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('transaksi.transaksi');
    }



    public function choose(){
        
        //$transaksidata = Transaksi::with(['barang'])->get()->find($id);
        $barang = Barang::all();
       // $kandangdata = Kandang::with('keeperKandang')->get()->find($id);
        //dd($keeperdata);

        //var_dump($barang);
        //exit();
        return view('transaksi.barang_cart',['data' =>$barang ]);

    }


    public function add(){

        return view('transaksi.add_menus');

    }


    public function edit($id){
        
        $transaksidata = Transaksi::with(['barang'])->get()->find($id);
       // $kandangdata = Kandang::with('keeperKandang')->get()->find($id);
        //dd($keeperdata);
        return view('barang.add_barang',['data' =>$barangdata]);

    }

    

   public function store(Request $request): RedirectResponse
{   
   /* $validator = Validator::make($request->all(), [
        'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validator->fails()) {
        Session::flash('status', 'error');
        Session::flash('message', $validator->messages()->first());
        return redirect()->back()->withInput();
    }*/ /*else {*/
        if ($request->id == NULL || $request->id == "") {
            $barang = Barang::create([
                'id' => Str::uuid(),
                'id_category' => $request->category,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
            ]);

            /*if ($request->file('foto')) {
                $extension = $request->file('foto')->getClientOriginalExtension();
                $namefile = $request->nama . '-' . now()->timestamp . '.' . $extension;
                $request->file('foto')->move('foto', $namefile);

                Keeper_foto::create([
                    'id' => Str::uuid(),
                    'id_keeper' => $menu->id, // Assuming $menu object is available and has the necessary id
                    'nama' => $namefile,
                    'url' => urlimage($namefile),
                ]);

                Session::flash('status', 'success');
                Session::flash('message', 'Tambah Data Menu Berhasil');
            }*/
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Menu Berhasil');
        }
    
     else{
        //dd($namefile);
         Barang::updateOrCreate(
             ['id' => $request->id],
             [
                'id_category' => $request->category,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
             ]
             );
 
           /*  $namefile='';
             if ($request->file('foto')){
             $extension = $request->file('foto')->getClientOriginalExtension();
             $namefile = $request->nama.'-'.now()->timestamp.'.'.$extension;
             $request->file('foto')->move('foto', $namefile);
             Keeper_foto::create([
                'id' => Str::uuid(),
                'id_keeper' => $request->id,
                'nama' => $namefile,
                'url' => urlimage($namefile) 

            ]);
            }
     
             else{ 
                 $namefile=$request->fotolabel;
             }
 
             if($request->fotolabel != NULL){
                 $flight = Keeper_foto::find($request->id_foto);
             
                 $flight->nama = $namefile;
                 $flight->url = urlimage($namefile); 
                 $flight->save();
             }*/
 
     
 
             /*Keeper_foto::updateOrCreate(
                 ['id' => $request->id_foto],
                 ['nama' => $namefile]);*/
             
 
             Session::flash('status', 'success');
             Session::flash('message', 'Edit Data Barang Berhasil');
             
         }
            
        /*  }*/



      

          

        return redirect('/transaksi');
    }

    public function delete($id){

        // $deleteKeeper = Keeper::findorFail($id);
        // $deleteKeeper->delete();

        // /*$deleteKeeperfoto = Keeper_foto::findorFail($id);
        // $deleteKeeperfoto->delete();*/
        // Session::flash('status', 'success');
        // Session::flash('message', 'Delete Data Keeper Berhasil');

        // return redirect('/keeper');

    $transaksi = Transaksi::findOrFail($id);
    $transaksi->delete();

    Session::flash('status', 'success');
    Session::flash('message', 'Delete Data Transaksi Berhasil');

    return redirect('/transaksi');
}
    
}
