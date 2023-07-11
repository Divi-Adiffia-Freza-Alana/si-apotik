<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Keeper;
use App\Models\Keeper_foto;
use Illuminate\Http\RedirectResponse;


use Carbon\Carbon;
use Illuminate\Support\Str;
use DataTables;
use Session;
use Validator;

class MenuController extends Controller
{
    //

    
    public function index(Request $request){

        //dd(Keeper::with(['keeperfoto']));

        if ($request->ajax()) {
           // $kurir = Kurir::with('');
           $menu = Menu::query();
            return  DataTables::of($menu)
                    ->addIndexColumn()
                  /*->editColumn('keeperfoto.nama', function($data){
                        return $data->keeperfoto->nama;
                    })*/
                    /*->editColumn('tgl_lahir', function($data){ 
                        return dateformat($data->tgl_lahir);
                    })*/
                    ->addColumn('action', function($row){
                           $btn = '<a class="btn btn-primary" href="/menu-edit/'.(isset($row->id)?$row->id:"").'" style="color:#ffff;display:inline-block;" ><i class="fa-solid fa-pen-to-square"></i> </a>
                                   <a class="btn btn-danger" href="/menu-delete/'.(isset($row->id)?$row->id:"").'" style="color:#ffff;display:inline-block;" ><i class="fa-solid fa-trash"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('menu.menu');

    }

    public function add(){

        return view('menu.add_menus');

    }


    public function edit($id){
        
        $menudata = Menu::query()->get()->find($id);
       // $kandangdata = Kandang::with('keeperKandang')->get()->find($id);
        //dd($keeperdata);
        return view('menu.add_menu',['data' =>$menudata]);

    }

    

   public function store(Request $request): RedirectResponse
{   
    $validator = Validator::make($request->all(), [
        'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validator->fails()) {
        Session::flash('status', 'error');
        Session::flash('message', $validator->messages()->first());
        return redirect()->back()->withInput();
    } else {
        if ($request->id == NULL || $request->id == "") {
            $menu = Menu::create([
                'id' => Str::uuid(),
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'komposisi' => $request->komposisi,
                'deskripsi' => $request->deskripsi,
            ]);

            if ($request->file('foto')) {
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
            }
        }
    
     else{
        //dd($namefile);
         Menu::updateOrCreate(
             ['id' => $request->id],
             [
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'komposisi' => $request->komposisi,
                'deskripsi' => $request->deskripsi,
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
             Session::flash('message', 'Edit Data Menu Berhasil');
             
         }
            
        }



      

          

        return redirect('/menu');
    }

    public function delete($id){

        // $deleteKeeper = Keeper::findorFail($id);
        // $deleteKeeper->delete();

        // /*$deleteKeeperfoto = Keeper_foto::findorFail($id);
        // $deleteKeeperfoto->delete();*/
        // Session::flash('status', 'success');
        // Session::flash('message', 'Delete Data Keeper Berhasil');

        // return redirect('/keeper');

    $menu = Menu::findOrFail($id);
    $menu->delete();

    Session::flash('status', 'success');
    Session::flash('message', 'Delete Data Menu Berhasil');

    return redirect('/menu');
}
    
}
