<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\Transaksi_detail;
use App\Models\Suply;
use App\Models\Suply_detail;
use Illuminate\Http\RedirectResponse;


use Carbon\Carbon;
use Illuminate\Support\Str;
use DataTables;
use Session;
use Validator;

class SuplyController extends Controller
{
    //

    
    public function index(Request $request){

      // var_dump(Barang::with('category')->get()->find('f997b850-662e-4f19-b0b6-4dc33a8b9c5b'));
   
    //exit();
        if ($request->ajax()) {
           // $kurir = Kurir::with('');
           //$barang = Barang::query();
            $suply = Suply::with(['barang']);
            return  DataTables::of($suply)
                    ->addIndexColumn()
                 /* ->editColumn('category.nama', function($data){
                        return $data->category[0]->nama;
                    })*/
                    /*->editColumn('tgl_lahir', function($data){ 
                        return dateformat($data->tgl_lahir);
                    })*/
                    ->addColumn('detail', function($row){
                        $btn = '<a class="btn bg-blue" href="/suply-detail/'.(isset($row->id)?$row->id:"").'" style="color:#ffff;display:inline-block;" ><i class="fa-solid fa-eye"></i> </a>';
                         return $btn;
                 })
                    ->addColumn('action', function($row){
                           $btn ='<a class="btn btn-danger" href="/suply-delete/'.(isset($row->id)?$row->id:"").'" style="color:#ffff;display:inline-block;" ><i class="fa-solid fa-trash"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action','detail'])
                    ->make(true);
        }
        return view('suply.suply');
    }



    public function choose(){
        
        //$transaksidata = Transaksi::with(['barang'])->get()->find($id);
        $barang = Barang::all();
       // $kandangdata = Kandang::with('keeperKandang')->get()->find($id);
        //dd($keeperdata);

        //var_dump($barang);
        //exit();
        return view('suply.barang_cart',['data' =>$barang ]);

    }


    public function add(){

        return view('suply.add_menus');

    }


    public function edit($id){
        
        $suplydata = Suply::with(['barang'])->get()->find($id);
       // $kandangdata = Kandang::with('keeperKandang')->get()->find($id);
        //dd($keeperdata);
        return view('suply.add_barang',['data' =>$barangdata]);

    }

    public function addToCart($id)
    {
        $barangall = Barang::all();
        $barang = Barang::find($id);

        $userId = auth()->user()->id; // or any string represents user identifier
        //var_dump($userId);
        //exit();

        //DELETE TOTAL
       /* $items = \Cart::getContent();

        foreach($items as $row) {

           // echo $row->id;
            \Cart::remove($row->id); 
        }*/

       // Cart::remove(456);
        \Cart::add(array(
            'id' => $barang->id, // inique row ID
            'name' => $barang->nama,
            'price' =>  $barang->hargabeli,
            'quantity' =>  1
        ));

        return view('suply.barang_cart',['data' =>$barangall ]);

        
    }


    public function cart()
    {
        $items = \Cart::getContent();
       // var_dump($items);
        //dexit();

        
        return view('suply.cart',['data' => $items]);
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

        $items = \Cart::getContent();
        if ($request->id == NULL || $request->id == "") {
            $suply = Suply::create([
                'id' => Str::uuid(),
                'tgl' =>date("Y-m-d", strtotime($request->tgl_transaksi)),
                'total' => \Cart::getTotal(),
                'keterangan' => '',
            ]);

        foreach ($items as $row) {
            Suply_detail::create([ 
                'id' => Str::uuid(),
                'id_suply' => $transaksi->id,
                'id_barang' => $row->id,
                'qty' => $row->quantity,
                'harga' => $row->price,
                'subtotal' => $row->price * $row->quantity,
            ]);
        }
        foreach($items as $row) {

           // echo $row->id;
            \Cart::remove($row->id); 
        }





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
            Session::flash('message', 'Data Transaksi Supply Berhasil');
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



      

          

        return redirect('/suply');
    }

    public function delete($id){

        // $deleteKeeper = Keeper::findorFail($id);
        // $deleteKeeper->delete();

        // /*$deleteKeeperfoto = Keeper_foto::findorFail($id);
        // $deleteKeeperfoto->delete();*/
        // Session::flash('status', 'success');
        // Session::flash('message', 'Delete Data Keeper Berhasil');

        // return redirect('/keeper');

    $suply = Suply::findOrFail($id);
    $suply->delete();

    Session::flash('status', 'success');
    Session::flash('message', 'Delete Data Transaksi Suply Berhasil');

    return redirect('/suply');
}
    
}
