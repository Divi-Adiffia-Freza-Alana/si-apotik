<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(){
        //$countbahanbaku = BahanBaku::all()->count();
        //$countmenu = Menu::all()->count();
        //$countkurir = Kurir::all()->count();

      //  return view('dashboard',["bahanbaku"=>$countbahanbaku,"menu"=>$countmenu,"kurir"=>$countkurir]);
      return view('dashboard');

    }

    //
}
