<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suplier;
use Illuminate\Http\RedirectResponse;


use Carbon\Carbon;
use Illuminate\Support\Str;
use DataTables;
use Session;
use Validator;

class SuplierController extends Controller
{
    //

    
    public function index(Request $request){

      // var_dump(Barang::with('category')->get()->find('f997b850-662e-4f19-b0b6-4dc33a8b9c5b'));
   
    //exit();
        if ($request->ajax()) {
           // $kurir = Kurir::with('');
           $suplier = Suplier::query();
            //$suplier = Suplier::with('category');
            return  DataTables::of($suplier)
                    ->addIndexColumn()
                 /* ->editColumn('category.nama', function($data){
                        return $data->category[0]->nama;
                    })*/
                    /*->editColumn('tgl_lahir', function($data){ 
                        return dateformat($data->tgl_lahir);
                    })*/
                    ->addColumn('action', function($row){
                           $btn = '<a class="btn btn-primary" href="/suplier-edit/'.(isset($row->id)?$row->id:"").'" style="color:#ffff;display:inline-block;" ><i class="fa-solid fa-pen-to-square"></i> </a>
                                   <a class="btn btn-danger" href="/suplier-delete/'.(isset($row->id)?$row->id:"").'" style="color:#ffff;display:inline-block;" ><i class="fa-solid fa-trash"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('suplier.suplier');

    }

    public function add(){

        return view('suplier.add_suplier');

    }


    public function edit($id){
        
        $suplierdata = Suplier::query()->get()->find($id);
       // $kandangdata = Kandang::with('keeperKandang')->get()->find($id);
        //dd($keeperdata);
        return view('suplier.add_suplier',['data' =>$suplierdata]);

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
            /*$namefile = '';
            if($request->file('foto')) {
                $extension = $request->file('foto')->getClientOriginalExtension();
                $namefile = $request->nama . '-' . now()->timestamp . '.' . $extension;
                $request->file('foto')->move('foto', $namefile);
            }*/
            $suplier = Suplier::create([
                'id' => Str::uuid(),
                //'id_category' => $request->category,
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                //'foto' => $namefile,
                //'foto_url' => urlimage($namefile),
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
            Session::flash('message', 'Tambah Data Suplier Berhasil');
        }
    
     else{
        //dd($request->all());

      
      /*  if($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $namefile = $request->nama . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->move('foto', $namefile);
        }
        else{
            $namefile=$request->fotolabel;
        }*/

        Suplier::updateOrCreate(
             ['id' => $request->id],
             [
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
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
             Session::flash('message', 'Edit Data Suplier Berhasil');
             
         }
            
        /*  }*/



      

          

        return redirect('/suplier');
    }

    public function delete($id){

        // $deleteKeeper = Keeper::findorFail($id);
        // $deleteKeeper->delete();

        // /*$deleteKeeperfoto = Keeper_foto::findorFail($id);
        // $deleteKeeperfoto->delete();*/
        // Session::flash('status', 'success');
        // Session::flash('message', 'Delete Data Keeper Berhasil');

        // return redirect('/keeper');

    $suplier = Suplier::findOrFail($id);
    $suplier->delete();

    Session::flash('status', 'success');
    Session::flash('message', 'Delete Data Suplier Berhasil');

    return redirect('/suplier');
}
    

//Select 

public function selectSuplier (Request $request)
{
    $suplier = [];
    if($request->has('q')){
        $search = $request->q;
        $suplier =Suplier::select("id", "nama")
                ->where('nama', 'LIKE', "%$search%")
                ->get();
    }else{ 
        $suplier =Suplier::select("id", "nama")->orderBy('id')->get(10);
    }
    return response()->json($suplier);
}
}
