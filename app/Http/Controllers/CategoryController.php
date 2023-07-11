<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;


use Carbon\Carbon;
use Illuminate\Support\Str;
use DataTables;
use Session;
use Validator;

class CategoryController extends Controller
{
    //

    
    public function index(Request $request){

        //dd(Keeper::with(['keeperfoto']));

        if ($request->ajax()) {
           // $kurir = Kurir::with('');
           $category = Category::query();
            return  DataTables::of($category)
                    ->addIndexColumn()
                  /*->editColumn('keeperfoto.nama', function($data){
                        return $data->keeperfoto->nama;
                    })*/
                    /*->editColumn('tgl_lahir', function($data){ 
                        return dateformat($data->tgl_lahir);
                    })*/
                    ->addColumn('action', function($row){
                           $btn = '<a class="btn btn-primary" href="/category-edit/'.(isset($row->id)?$row->id:"").'" style="color:#ffff;display:inline-block;" ><i class="fa-solid fa-pen-to-square"></i> </a>
                                   <a class="btn btn-danger" href="/category-delete/'.(isset($row->id)?$row->id:"").'" style="color:#ffff;display:inline-block;" ><i class="fa-solid fa-trash"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('category.category');

    }

    public function add(){

        return view('category.add_category');

    }


    public function edit($id){
        
        $categorydata = Category::query()->get()->find($id);
       // $kandangdata = Kandang::with('keeperKandang')->get()->find($id);
        //dd($keeperdata);
        return view('category.add_category',['data' =>$categorydata]);

    }

    

   public function store(Request $request): RedirectResponse
{   
    /*$validator = Validator::make($request->all(), [
        'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validator->fails()) {
        Session::flash('status', 'error');
        Session::flash('message', $validator->messages()->first());
        return redirect()->back()->withInput();
    } else {*/
        if ($request->id == NULL || $request->id == "") {
            $category = Category::create([
                'id' => Str::uuid(),
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
            ]);

         /*   if ($request->file('foto')) {
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
            Session::flash('message', 'Tambah Data Category Berhasil');
        }
    
     else{
        //dd($namefile);
         Category::updateOrCreate(
             ['id' => $request->id],
             [
                'nama' => $request->nama,
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
             Session::flash('message', 'Edit Data Category Berhasil');
             
         }
            
       // }



      

          

        return redirect('/category');
    }

    public function delete($id){

        // $deleteKeeper = Keeper::findorFail($id);
        // $deleteKeeper->delete();

        // /*$deleteKeeperfoto = Keeper_foto::findorFail($id);
        // $deleteKeeperfoto->delete();*/
        // Session::flash('status', 'success');
        // Session::flash('message', 'Delete Data Keeper Berhasil');

        // return redirect('/keeper');

    $category = Category::findOrFail($id);
    $category->delete();

    Session::flash('status', 'success');
    Session::flash('message', 'Delete Data Category Berhasil');

    return redirect('/category');
}

//Select 

public function selectCategory (Request $request)
{
    $category = [];
    if($request->has('q')){
        $search = $request->q;
        $category =Category::select("id", "nama")
                ->where('nama', 'LIKE', "%$search%")
                ->get();
    }else{ 
        $category =Category::select("id", "nama")->orderBy('id')->get(10);
    }
    return response()->json($category);
}
    
}
