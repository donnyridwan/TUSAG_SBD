<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
        public function index() {
            $datas = DB::select('select * from users');
            return view('petugas.index')->with('datas', $datas);
            }        
}
